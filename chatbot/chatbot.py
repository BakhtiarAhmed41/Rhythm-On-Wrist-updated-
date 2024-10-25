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

# Website context and information
WEBSITE_CONTEXT = """
Rhythm on Wrist is a premier online watch selling platform established in 2020, dedicated to providing luxury and quality timepieces to watch enthusiasts worldwide. Our platform offers:

1. Product Range:
   - We offer two product categories, Vintage Watches and New Arrivals
   - Both classic and contemporary timepieces
   - Watches for all occasions: formal, casual, sports, and special events
   - Price ranges to suit different budgets while maintaining quality

2. Customer Experience:
   - User-friendly interface for easy browsing and purchasing
   - Detailed product descriptions and specifications
   - High-quality product images from multiple angles
   - Secure payment gateway
   - Fast and insured shipping worldwide

3. Special Features:
   - Authentication certificates for luxury timepieces
   - 24/7 customer support
   - Watch care guides and maintenance tips
   - Special discounts and promotions for members

4. Services:
   - Free shipping on orders above certain value
   - 30-day return policy
   - Watch servicing and maintenance
   - Gift wrapping options
   - Personal shopping assistance

5. Quality Assurance:
   - All watches are 100% authentic
   - Quality check before shipping
   - Warranty coverage
   - After-sales support

Our mission is to make luxury timepieces accessible while ensuring authenticity and customer satisfaction. We pride ourselves on our extensive collection, competitive prices, and exceptional customer service.
"""

# Set your Gemini API key
os.environ['GOOGLE_API_KEY'] = os.getenv('GEMINI_API_KEY')

# Connection string for MySQL with no password
cs = os.getenv('DATABASE_URL')
db_engine = create_engine(cs)
db = SQLDatabase(db_engine)

# Initialize the Gemini model with context
llm = ChatGoogleGenerativeAI(
    model="gemini-pro",
    temperature=0.0,
    convert_system_message_to_human=True,
    max_output_tokens=2048
)

def get_context_enhanced_response(query: str) -> str:
    """Combine database results with website context"""
    # Create a prompt that includes website context
    enhanced_prompt = f"""
    Using the following context about Rhythm on Wrist, along with the database information, please answer the query:

    {WEBSITE_CONTEXT}

    Query: {query}
    """
    return enhanced_prompt

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
        'good evening', 'thanks', 'thank you', 'bye', 'goodbye', 'tell me about',
        'what is', 'who are you', 'what do you do', 'how do you'
    ]
    return any(phrase in message.lower() for phrase in general_phrases)

def get_chat_response(message: str) -> str:
    """Handle general chat messages with context-aware responses"""
    message = message.lower()
    
    if 'tell me about' in message or 'what is' in message:
        return f"Rhythm on Wrist is a premier online watch selling platform established in 2024. We offer an extensive collection of luxury watches from renowned brands, with options for all occasions and budgets. Our platform provides detailed product information, secure shopping, and exceptional customer service. How can I help you find the perfect timepiece?"
    
    if 'how are you' in message:
        return "I'm doing well, thank you! How can I help you explore our collection of premium timepieces today?"
    elif any(x in message for x in ['hello', 'hi', 'hey']):
        return "Hello! Welcome to Rhythm on Wrist. I'm here to help you discover our extensive collection of luxury timepieces. What are you looking for today?"
    elif 'thank' in message:
        return "You're welcome! Remember, we're here 24/7 to assist you with all your watch-related needs. Is there anything else you'd like to know?"
    elif any(x in message for x in ['bye', 'goodbye']):
        return "Goodbye! Thank you for your interest in Rhythm on Wrist. Feel free to return anytime to explore our collection of premium timepieces. Have a great day!"
    else:
        return "I'm here to help you discover the perfect timepiece from our extensive collection. What would you like to know about our watches?"

@cl.on_chat_start
async def on_chat_start():
    # Initialize the database chain with custom prompt
    db_chain = SQLDatabaseChain.from_llm(
        llm=llm,
        db=db,
        verbose=False,
        return_direct=True,
        use_query_checker=True
    )
    cl.user_session.set("runnable", db_chain)
    
    welcome_msg = cl.Message(content="👋 Welcome to Rhythm on Wrist! I'm your personal watch consultant, ready to help you discover our exceptional collection of timepieces. How can I assist you today?")
    await welcome_msg.send()

@cl.on_message
async def on_message(message: cl.Message):
    if is_general_chat(message.content):
        response = get_chat_response(message.content)
        await cl.Message(content=response).send()
        return

    runnable = cl.user_session.get("runnable")
    
    try:
        thinking_msg = cl.Message(content="Let me check that for you...")
        await thinking_msg.send()
        
        # Enhance the query with context
        enhanced_query = get_context_enhanced_response(message.content)
        
        # Get the raw response
        response = runnable.run(
            enhanced_query,
            callbacks=[cl.LangchainCallbackHandler()]
        )
        
        # Clean and format the response
        cleaned_response = clean_response(response)
        
        if "SELECT" in cleaned_response or "FROM" in cleaned_response:
            cleaned_response = "I apologize, but I'm having trouble understanding that question. Could you please rephrase it in a simpler way?"
        
        if cleaned_response and cleaned_response[0].isdigit():
            cleaned_response = f"Here's what I found: {cleaned_response}"
        
        await cl.Message(content=cleaned_response).send()
        
    except Exception as e:
        error_message = "I apologize, but I'm having trouble accessing that information right now. Could you please try asking about our watches in a different way?"
        await cl.Message(content=error_message).send()

if __name__ == "__main__":
    cl.run()