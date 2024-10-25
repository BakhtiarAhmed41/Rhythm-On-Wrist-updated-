from langchain_google_genai import ChatGoogleGenerativeAI
from langchain.schema import StrOutputParser
from langchain.schema.runnable import Runnable
from langchain.agents import create_sql_agent
from langchain_community.agent_toolkits import SQLDatabaseToolkit
from langchain.sql_database import SQLDatabase
from langchain_experimental.sql import SQLDatabaseChain
from sqlalchemy import create_engine
import chainlit as cl
import os
import re
from sqlalchemy.exc import SQLAlchemyError

# Set your Gemini API key
os.environ['GOOGLE_API_KEY'] = os.getenv('GEMINI_API_KEY')

# Connection string for MySQL with no password
cs = os.getenv('DATABASE_URL')
db_engine = create_engine(cs)
db = SQLDatabase(db_engine)

# Initialize the Gemini model
llm = ChatGoogleGenerativeAI(
    model="gemini-pro",
    temperature=0.0,
    convert_system_message_to_human=True,
    max_output_tokens=2048  # Increased token limit for more natural responses
)

def clean_response(response: str) -> str:
    """Clean the response to remove SQL artifacts and brackets"""
    # Remove SQL-related prefixes
    response = response.replace("SQLQuery:", "").replace("SQLResult:", "").strip()
    
    # Remove brackets and extra whitespace
    response = re.sub(r'[\[\](){}]', '', response)
    
    # Convert tuple-like strings to natural language
    response = re.sub(r'\'(\w+)\',\s*', r'\1, ', response)
    
    # Clean up any remaining artifacts
    response = response.replace("'", "").replace('"', "")
    
    # Remove multiple spaces
    response = ' '.join(response.split())
    
    return response

def is_general_chat(message: str) -> bool:
    """Check if the message is general chat rather than a database query"""
    general_phrases = [
        'how are you', 'hello', 'hi', 'hey', 'good morning', 'good afternoon',
        'good evening', 'thanks', 'thank you', 'bye', 'goodbye'
    ]
    return any(phrase in message.lower() for phrase in general_phrases)

def get_chat_response(message: str) -> str:
    """Handle general chat messages with more natural responses"""
    message = message.lower()
    
    if 'how are you' in message:
        return "I'm doing well, thank you! How can I help you with information about our watches today?"
    elif any(x in message for x in ['hello', 'hi', 'hey']):
        return "Hello! I'm here to help you with information about Rhythm on Wrist. What would you like to know?"
    elif 'thank' in message:
        return "You're welcome! Feel free to ask if you need anything else about our watches."
    elif any(x in message for x in ['bye', 'goodbye']):
        return "Goodbye! Thank you for your interest in Rhythm on Wrist. Have a great day!"
    else:
        return "I'm here to help you with information about our watch store. What would you like to know?"

@cl.on_chat_start
async def on_chat_start():
    # Initialize the database chain with custom prompt
    db_chain = SQLDatabaseChain.from_llm(
        llm=llm,
        db=db,
        verbose=False,
        return_direct=True,
        use_query_checker=True  # Add query checking for better safety
    )
    cl.user_session.set("runnable", db_chain)
    
    welcome_msg = cl.Message(content="👋 Welcome to Rhythm on Wrist! An online watch selling platform. How can I assist you today?")
    await welcome_msg.send()

@cl.on_message
async def on_message(message: cl.Message):
    # Check if it's a general chat message
    if is_general_chat(message.content):
        response = get_chat_response(message.content)
        await cl.Message(content=response).send()
        return

    # If it's a database query
    runnable = cl.user_session.get("runnable")
    
    try:
        thinking_msg = cl.Message(content="Let me check that for you...")
        await thinking_msg.send()
        
        # Get the raw response
        response = runnable.run(
            message.content,
            callbacks=[cl.LangchainCallbackHandler()]
        )
        
        # Clean and format the response
        cleaned_response = clean_response(response)
        
        # Check if the response still contains SQL keywords
        if "SELECT" in cleaned_response or "FROM" in cleaned_response:
            cleaned_response = "I apologize, but I'm having trouble understanding that question. Could you please rephrase it in a simpler way?"
        
        # Add natural language wrapping if the response is just data
        if cleaned_response and cleaned_response[0].isdigit():
            cleaned_response = f"Here's what I found: {cleaned_response}"
        
        await cl.Message(content=cleaned_response).send()
        
    except Exception as e:
        error_message = "I apologize, but I'm having trouble accessing that information right now. Could you please try asking about our watches in a different way?"
        await cl.Message(content=error_message).send()

if __name__ == "__main__":
    cl.run()