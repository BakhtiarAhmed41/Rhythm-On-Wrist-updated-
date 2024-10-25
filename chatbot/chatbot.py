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

WEBSITE_CONTEXT = """
Rhythm on Wrist: Celebrating Time with Luxury Watches

Welcome to Rhythm on Wrist, your premier online destination for luxury and vintage watches. Established in 2020, we cater to watch enthusiasts worldwide, ensuring a unique shopping experience with a focus on authenticity and quality.

1. Product Range
Categories: We specialize in two main categories—Vintage Watches and New Arrivals—featuring exquisite timepieces for every taste.
Diverse Selection: Our collection includes classic styles and contemporary designs suitable for any occasion, from formal events to everyday wear.
Affordable Luxury: With a range of price points, we make luxury timepieces accessible to all watch lovers.
2. Customer Experience
User-Friendly Interface: Enjoy seamless browsing and purchasing with our intuitive platform.
Detailed Listings: Each product features comprehensive descriptions and high-quality images to assist in your decision-making.
Secure Transactions: Our secure payment gateway ensures peace of mind during every purchase.
Global Shipping: We offer worldwide shipping, delivering authentic watches straight to your doorstep.
3. Special Features
Authenticity Assurance: Each watch comes with a certificate of authenticity, guaranteeing its quality.
Dedicated Support: Our customer support team is available 24/7 to assist you with any inquiries.
Educational Resources: Access watch care guides and maintenance tips to keep your timepiece in pristine condition.
Exclusive Promotions: Join our membership program for special discounts and offers.
4. Services
Free Shipping: Enjoy free shipping on orders over a specified value.
Flexible Returns: Our 30-day return policy allows you to shop with confidence.
Servicing Options: We offer watch servicing and maintenance to keep your collection in top shape.
Gift Wrapping: Personalized gift-wrapping services are available for special occasions.
Personal Shopping: Our team is ready to assist you in finding the perfect watch tailored to your needs.
5. Quality Assurance
100% Authenticity: All watches sold are guaranteed authentic, passing rigorous quality checks.
Warranty Coverage: Each timepiece is covered by a warranty for your peace of mind.
After-Sales Support: We are committed to providing exceptional after-sales service to enhance your shopping experience.
Our Mission
At Rhythm on Wrist, our mission is to make luxury watches accessible while ensuring authenticity and unparalleled customer satisfaction. We pride ourselves on our extensive collection, competitive pricing, and exceptional service, committed to enriching your watch-buying journey.
"""


os.environ['GOOGLE_API_KEY'] = os.getenv('GEMINI_API_KEY')


cs = os.getenv('DATABASE_URL')
db_engine = create_engine(cs)
db = SQLDatabase(db_engine)


llm = ChatGoogleGenerativeAI(
    model="gemini-pro",
    temperature=0.0,
    convert_system_message_to_human=True,
    max_output_tokens=2048
)

def get_context_enhanced_response(query: str) -> str:
    """Combine database results with website context"""
 
    enhanced_prompt = f"""
    Using the following context about Rhythm on Wrist, along with the database information, please answer the query:

    {WEBSITE_CONTEXT}

    Query: {query}
    """
    return enhanced_prompt

def clean_response(response: str) -> str:
    """Clean the response to remove SQL artifacts and brackets"""
  
    response = response.replace("SQLQuery:", "").replace("SQLResult:", "").strip()
    
   
    response = re.sub(r'[\[\](){}]', '', response)
    

    response = re.sub(r'\'(\w+)\',\s*', r'\1, ', response)
    

    response = response.replace("'", "")
    

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
        
    
        enhanced_query = get_context_enhanced_response(message.content)
        

        response = runnable.run(
            enhanced_query,
            callbacks=[cl.LangchainCallbackHandler()]
        )
        

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