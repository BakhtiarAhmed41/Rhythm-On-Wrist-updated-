# How to run the project?

1. Clone the github repo to your computer.
2. Download xaampp for allowing the project to run on local host
3. Start Apache and MySQL servers on xampp
4. Click on admin button of MySQL Server on Xampp and import the rhytm_on_wrist.sql file present in the database folder in the github repo above
5. If any error occurs, first create a database named rhytm_on_wrist on phpmyadmin and then import the rhytm_on_wrist.sql file.
6. After succesfully completing above steps, copy and paste http://localhost/Rhythm-On-Wrist-updated-/watch_store.php in the web browser (Xampp servers must be running), the website will open.
7. To access the chatbot, you must create an .env file and put below variables in it:

       GEMINI_API_KEY = AIzaSyCMHUPlN8j_8JD_0Yjlr9--GHWdL-vBZPg
       DATABASE_URL = mysql+pymysql://root@localhost:3306/rhythm_on_wrist

9. Then you must move to the chatbot directory using command 'cd chatbot' (for windows)
10. After that, u just need to run 'chainlit run chatbot.py'. A new window will open with chatbot interface

#Note

The chatbot is still in the process of training and experimentation and may cause some errors as it is very less trained yet.  

