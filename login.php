<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
<head>
  <title>Contact Page</title>
  <link rel="icon" href="/icon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="icon" href="icon.png">  
  <style>

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: rgb(28, 27, 39);
      background-image: url(./contactimage.PNG);
      background-repeat: no-repeat;
      background-position: center;
      /* background-attachment: scroll; */
    }

    .container {
      width: 700px;
      margin: 20px auto;
      margin-top: 50px;
      /* margin-bottom: 100px; */
      background-color: #fff;
      padding: 60px;
      /* padding-bottom: 20px; */
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
      margin-top: 40px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input[type="username"],
    .form-group input[type="password"],
    .form-group textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid black;
    }

    .form-group textarea {
      height: 120px;
    }

    .form-group input[type="submit"] {
      background-color: black;
      color: #fff;
      padding: 10px 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      align-items: center;
      align-self: center;
      align-content: center;
      margin-left: 2px;
    }

    .form-group input[type="submit"]:hover {
      background-color: red;
      color: white;
    }

    h1{
      text-align: center;
      font-size: 40px;
      color: red;
    }
  </style>
</head>
<body>

  <header>
    <div class="header">
        <div class="logo">
          <a href="watch_store.php">
            <img src="logo.png" alt="logo">
          </a>
        </div>
        <div class="navbar">
        <nav>
        <a href="\Web Engineering Project (Rhythm on Wrist)\watch_store.php">Home</a>
        <a href="\Web Engineering Project (Rhythm on Wrist)\about.php">Our Universe</a>
        <a href="\Web Engineering Project (Rhythm on Wrist)\shopping\index.php">Watch Collection</a>
        <a href="\Web Engineering Project (Rhythm on Wrist)\shopping\checkout.php">Checkout</a>
        <a href="\Web Engineering Project (Rhythm on Wrist)\contact.php">Contact Us</a>
                </nav>
        </div>
        <div class="contactbtn">
            <button href="\Web Engineering Project (Rhythm on Wrist)\watch_store.php"> <a href="\Web Engineering Project (Rhythm on Wrist)\watch_store.php" style="font-size: 13px;"> Checkout Watches </a> </button>
        </div>
    </div>
</header>
<?php

  $server = "localhost";
  $username = "root";
  $password = "";
  $database= "rhythm_on_wrist";

  $conn = mysqli_connect($server, $username, $password, $database);


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $sql = "Select * from customers where username='$username' ";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  
  if ($num == 1) {
    while($row = mysqli_fetch_assoc($result)){
        
        if(password_verify($password , $row['password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo '<script>alert("Login successful!"); window.location.href = "shopping/checkout.php";</script>';
        }
        else{    
            echo '<div class="alert alert-danger" role="alert"> <strong> Error!</strong> Invalid credentials entered<strong>.</strong> </div>';    
        }
    }
}
else{    
    echo '<div class="alert alert-danger" role="alert"> <strong> Error!</strong> Invalid credentials entered<strong>.</strong> </div>';    
}

}

  ?>

<div class="container">
  <h1 style="font-size: 60px; font-weight: bold;">Login</h1>
  <form action="/Web Engineering Project (Rhythm on Wrist)/login.php" method="POST">
    <div class="form-group">
      <label for="name">Username</label>
      <input type="username" id="username" name="username" placeholder="Enter your username"  required>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password"  required>
    </div>

    A new customer? <a href="\Web Engineering Project (Rhythm on Wrist)\signup.php" style=" text-decoration: none;"> Register </a> here.
    <div class="form-group">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
<br>
<br>
<br>
<?php
     include "footer.php";
?>

</html>

