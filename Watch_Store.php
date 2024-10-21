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

    body {
    display: flex;
    flex-direction: column;
    margin: 0px;
    padding: 0px;
    background-color: rgb(28, 27, 39);
    /* width: 1200px; */
    height: 400px;
}

.header_img{
    width: 100%;
    height: 560px;
    object-fit: fill;
    
}

.watch_display1{
    width: 100%;
    height: auto;
    background-color: rgb(28, 27, 39);
}

.display1{
    
    width: 100%;
    height: auto;
    display: grid;
    grid-template-columns: 300px 300px 300px 300px;
    gap: 40px;
    padding: 50px 20px 100px 30px;
    justify-content: space-evenly;
    justify-items: center;
    align-content: space-evenly;
    align-items: center;
}

.display_name h2{
    text-align: center;
    margin-top: 20px;
    margin-left: 450px;
    margin-right: 450px;
    font-size: 34px;
    color: white;
    font-weight: bold;
    border: 2px dotted red;
}

.display_name{
    border: 1px solid;
}

.vin_img img{
        width: 260px;
        height: 320px;
        border: 1px groove;
}

/* Media Queries */

/* For mobile devices */
@media (max-width: 767px) {
    .display1 {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        padding: 30px 10px 60px 15px;
    }

    .display_name h2 {
        margin-left: 10px;
        margin-right: 10px;
    }
}

For tablets and larger screens
@media (min-width: 768px && max-width: 1000px) {
    .header_img {
        height: 360px;
    }

    .display_name h2 {
        margin-left: 100px;
        margin-right: 100px;
    }
}

</style>


<body>
<?php
session_start();
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
 }
 else {
    $loggedin = false;
 }

    echo '<header>
        <div class="header">
            <div class="logo" >
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
            </div>';

            if($loggedin){
            echo'<div class="contactbtn">
                <a href="\Web Engineering Project (Rhythm on Wrist)\logout.php" style="cursor: pointer;"> <button href="\Web Engineering Project (Rhythm on Wrist)\contact.php" event="Onclick" style="width: 100px; font-size: 17px; font-weight: bold; cursor: pointer;">  Logout  </button> </a>
            </div>';
            }
            
            if(!$loggedin){
            echo'<div class="contactbtn">
                <a href="\Web Engineering Project (Rhythm on Wrist)\login.php" style="cursor: pointer;"> <button href="\Web Engineering Project (Rhythm on Wrist)\contact.php" event="Onclick" style="width: 100px; font-size: 17px; font-weight: bold; cursor: pointer;">  Login  </button> </a>
            </div>';
            }
       echo' </div>
    </header>';
 
?>





    <div class="header-image">
        <img  class="header_img" src="Main page/Front photo/PXL_20230616_110219519.PORTRAIT.jpg" alt="header image">
    </div>

    <div class="watch_display1">
        <span class="display_name">
            <h2>Featured Vintage Watches</h2>
        </span>

        <div class="display1">
            <div class="vin_img">
                <img src="Main page/Vintage watches/PXL_20230412_133616568.PORTRAIT (1).jpg" alt="">
            </div>
            <div class="vin_img">
                <img src="Main page/Vintage watches/PXL_20230513_134242964.PORTRAIT.jpg" alt="">
            </div>
            <div class="vin_img">
                <img src="Main page/Vintage watches/PXL_20230513_134718791.PORTRAIT.jpg" alt="">
            </div>
            <div class="vin_img">
                <img src="Main page\Vintage watches\PXL_20230612_140859559.PORTRAIT.jpg" alt="">
            </div>
            
        </div>

    </div>
    
    <div class="watch_display1">
        <span class="display_name">
            <h2>Featured New Arrivals</h2>
        </span>

        <div class="display1">
            <div class="vin_img">
                <img src="Main page/New stock/PXL_20230402_105630173.jpg" alt="">
            </div>
            <div class="vin_img">
                <img src="Main page/New stock/PXL_20230604_062154819.jpg" alt="">
            </div>
            <div class="vin_img">
                <img src="Main page/New stock/PXL_20230430_131708144.PORTRAIT.jpg" alt="">
            </div>
            <div class="vin_img">
                <img src="Main page/New stock/PXL_20230503_134551841.PORTRAIT (1).jpg" alt="">
            </div>
            
        </div>

    </div>
</body>

     <?php
        include "footer.php";
     ?>

</html>