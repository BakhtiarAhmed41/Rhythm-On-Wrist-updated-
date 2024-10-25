<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rhythm on Wrist</title>
    <link rel="icon" href="icon.png">
</head>

<style>
/* General Styles */
header {
    height: auto; /* Allow height to adjust based on content */
    width: 100%;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #182236;
    padding: 10px 20px; /* Add padding for better spacing */
}

.logo {
    flex: 1; /* Allow logo to take available space */
}

.logo img {
    width: 150px; /* Default logo size */
    height: auto; /* Maintain aspect ratio */
}

.navbar {
    flex: 2; /* Navbar takes more space */
    display: flex;
    justify-content: center; /* Center the navbar items */
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
}

.navbar a {
    padding: 0 10px; /* Horizontal padding for links */
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: color 0.3s; /* Smooth transition for hover effect */
}

.navbar a:hover {
    color: red; /* Change color on hover */
}

.contactbtn {
    flex: 1; /* Allow contact button to take available space */
    display: flex;
    justify-content: flex-end; /* Align button to the right */
}

.contactbtn button {
    width: 100px; /* Default button width */
    height: 40px; /* Default button height */
    background-color: red;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s; /* Smooth transition for hover effect */
}

.contactbtn button:hover {
    background-color: darkred; /* Darker color on hover */
}

/* Media Queries */

/* For tablets and small laptops */
@media (max-width: 1024px) {
    .header {
        flex-direction: column; /* Stack items vertically */
        align-items: flex-start; /* Align items to the start */
    }

    .logo {
        margin-bottom: 10px; /* Space below logo */
    }

    .navbar {
        justify-content: flex-start; /* Align navbar items to the start */
        width: 100%; /* Full width for navbar */
    }

    .navbar a {
        padding: 5px; /* Less padding for links */
        font-size: 14px; /* Slightly smaller font size */
    }

    .contactbtn {
        margin-top: 10px; /* Space above button */
    }

    .contactbtn button {
        width: 80px; /* Smaller button width */
        height: 35px; /* Smaller button height */
    }
}

/* For mobile devices */
@media (max-width: 768px) {
    .header {
        padding: 10px; /* Less padding */
    }

    .logo img {
        width: 120px; /* Smaller logo size */
    }

    .navbar {
        flex-direction: column; /* Stack navbar items */
        align-items: flex-start; /* Align items to the start */
        width: 100%; /* Full width for navbar */
    }

    .navbar a {
        padding: 5px 0; /* Vertical padding for links */
        font-size: 12px; /* Smaller font size */
    }

    .contactbtn {
        margin-top: 10px; /* Space above button */
    }

    .contactbtn button {
        width: 60px; /* Even smaller button width */
        height: 30px; /* Smaller button height */
        font-size: 12px; /* Smaller font size */
    }
}

/* For very small mobile devices */
@media (max-width: 480px) {
    .header {
        padding: 5px; /* Minimal padding */
    }

    .logo img {
        width: 80px; /* Small logo size */
    }

    .navbar {
        width: 100%; /* Full width for navbar */
    }

    .navbar a {
        padding: 3px 0; /* Minimal vertical padding */
        font-size: 10px; /* Smaller font size */
    }

    .contactbtn {
        margin-top: 5px; /* Space above button */
    }

    .contactbtn button {
        width: 50px; /* Smallest button width */
        height: 25px; /* Smallest button height */
        font-size: 10px; /* Smaller font size */
    }
}
  
</style>
<header>
    <div class="header">
        <div class="logo">
            <a href="watch_store.php">
                <img src="logo.png" alt="logo">
            </a>
        </div>
        <div class="navbar">
            <nav>
                <a href="/Web Engineering Project (Rhythm on Wrist)/watch_store.php">Home</a>
                <a href="/Web Engineering Project (Rhythm on Wrist)/about.php">Our Universe</a>
                <a href="/Web Engineering Project (Rhythm on Wrist)/shopping/index.php">Watch Collection</a>
                <a href="/Web Engineering Project (Rhythm on Wrist)/shopping/checkout.php">Checkout</a>
                <a href="/Web Engineering Project (Rhythm on Wrist)/contact.php">Contact Us</a>
                <a href="/Web Engineering Project (Rhythm on Wrist)/start_chatbot.php">AI Assistant</a>
            </nav>
        </div>
        <div class="contactbtn" id="auth-button-container">
            <button id="auth-button" style="width: 100px; font-size: 17px; font-weight: bold; cursor: pointer;">
                Loading...
            </button>
        </div>
    </div>
</header>