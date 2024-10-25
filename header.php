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

header {
    height: auto; 
    width: 100%;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #182236;
    padding: 10px 20px; 
}

.logo {
    flex: 1; 
}

.logo img {
    width: 150px;
    height: auto; 
}

.navbar {
    flex: 2; 
    justify-content: center; 
    flex-wrap: wrap; 
}

.navbar a {
    padding: 0 10px; 
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: color 0.3s;
}

.navbar a:hover {
    color: red; 
}

.contactbtn {
    flex: 1; 
    display: flex;
    justify-content: flex-end; 
}

.contactbtn button {
    width: 100px;
    height: 40px; 
    background-color: red;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s; 
}

.contactbtn button:hover {
    background-color: darkred; 
}


@media (max-width: 1024px) {
    .header {
        flex-direction: column; 
        align-items: flex-start; 
    }

    .logo {
        margin-bottom: 10px; 
    }

    .navbar {
        justify-content: flex-start; 
        width: 100%; 
    }

    .navbar a {
        padding: 5px; 
        font-size: 14px;
    }

    .contactbtn {
        margin-top: 10px; 
    }

    .contactbtn button {
        width: 80px; 
        height: 35px; 
    }
}

@media (max-width: 768px) {
    .header {
        padding: 10px; 
    }

    .logo img {
        width: 120px; 
    }

    .navbar {
        flex-direction: column; 
        align-items: flex-start; 
        width: 100%; 
    }

    .navbar a {
        padding: 5px 0; 
        font-size: 12px; 
    }

    .contactbtn {
        margin-top: 10px; 
    }

    .contactbtn button {
        width: 60px; 
        height: 30px; 
        font-size: 12px; 
    }
}


@media (max-width: 480px) {
    .header {
        padding: 5px; 
    }

    .logo img {
        width: 80px; 
    }

    .navbar {
        width: 100%; 
    }

    .navbar a {
        padding: 3px 0; 
        font-size: 10px;
    }

    .contactbtn {
        margin-top: 5px; 
    }

    .contactbtn button {
        width: 50px; 
        height: 25px; 
        font-size: 10px; 
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
            </nav>
        </div>
        <div class="contactbtn" id="auth-button-container">
            <button id="auth-button" style="width: 100px; font-size: 17px; font-weight: bold; cursor: pointer;">
                Loading...
            </button>
        </div>
    </div>
</header>