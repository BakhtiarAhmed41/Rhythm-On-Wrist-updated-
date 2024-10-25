<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR UNIVERSE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="icon.png">

    <style>
        *{
   padding: 0px;
   margin: 0px;
   box-sizing: border-box;
   font-family: 'Times New Roman', Times, serif;
   /* background-color: rgb(28, 27, 39); */
   
}
body{
    background-color: rgb(28, 27, 39);
    /* background-color: black; */
    background-blend-mode:hue;
}
.heading{
    width: 90%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: center;
    margin: 20px auto;

}
.heading h1{
    font-size:  50px;
    color : #9393c2;
    margin-bottom: 15px;
    position: relative;


}
.heading h1::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 4px;
    display: block;
    margin: 0 auto;
    background-color: rgb(42, 42, 82);
   
}
@keyframes slidein2 {
    from {margin-right: 20%;}
    to{ margin-right: 0%;}
}
@keyframes slidein {
    from {margin-top: 20%;}
    to{ margin-top: 0%;}
}
.heading p {
    width: 90%;
    margin: 0 auto;
    padding: 10px 20px;
    color: rgb(207, 214, 235);;
}
.container{
    width: 90%;
    margin: 0 auto;
    padding: 10px 20px;

}
.about{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;

}
.aboutimage{
    flex: 1;
    margin-right: 20px;
    overflow: hidden; 
    animation-duration: 1s;
    animation-name: slidein2;
}
.aboutimage img{
    width: 500px;
    height: 300px;
    display: block;
    transition: 0.5s ease;

}
.aboutimage:hover img{
    transform : scale(1,0.8);
} 
.aboutcontent{
    flex: 1;
}
.aboutcontent h2{
    font-size: 23px;
    margin-bottom: 15p;
    color: rgb(69, 80, 112);
    animation-duration: 1s;
    animation-name: slidein;
}

.aboutcontent h2:hover{
    color: whitesmoke;

}
.aboutcontent p {
    font-size: 15px;
    line-height: 1.5;
    color: rgb(207, 214, 235);;
    animation-duration: 2s;
    animation-name: slidein;
    

}
.aboutcontent .readmore {
    display: inline-block;
    padding: 10px 20px;
    background-color: rgb(2, 2, 99);
    color: rgb(185, 172, 127);
    font-size: 19px;
    text-decoration: none;
    border-radius:25px;
    margin-top: 15px;
    transition: 0.3s ease;
} 
.aboutcontent .readmore:hover { 
    background-color: rgb(236, 224, 224);
}
@media  screen and (max-width: 768px) {
    .heading{
        padding: 0px 20px;

    }
.heading h1 {
    font-size:  36px;
}
.heading p{
    font-size: 17px;
    margin-bottom: 0px;
    
}   
.container{
    padding: 0px;

}
.about{
    padding: 20px;
    flex-direction: column;

}
.aboutimage{
    margin-right: 0px;
    margin-bottom: 20px;

}
.aboutcontent p{
    padding: 0px;
    font-size: 16px;

}
.aboutcontent .readmore {
    font-size: 16px;

}
}
    </style>
</head>

<body>

<?php
session_start();
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
 }
 else {
    $loggedin = false;
 }

  include 'header.php'; 

 
?>
    <div class="heading">
    
        <h1> OUR UNIVERSE </h1>
        <P>Welcome to Vintage & New Watch Selling Platform! We are your go-to destination for exquisite timepieces, both classic
            vintage watches and cutting-edge new models. With our passion for horology and commitment to quality, we
            offer an exceptional selection of watches to cater to every collector and enthusiast.</P>
           

    </div>
    <div class="container">
        <section class="about">
            <div class="aboutimage">
                <img src="watch image.jpeg" alt="watch1">

            </div>
            <div class="aboutcontent">
                <h2>VINTAGE TIMEPIECES</h2>
                <P> With a keen eye for exceptional quality and design, we strive to offer our discerning clientele a
                    diverse range of vintage watches that span various eras, styles, and brands. From classic dress
                    watches to rugged sports timepieces, our collection showcases iconic models from renowned Swiss,
                    German, and other prestigious watchmakers, each with its own story to tell.</P>
                    <a href="" class="readmore"> READ MORE</a> 
                </div>
                    
        </section>
    </div>
    <br>
    <br>
    <br>
</body>

<?php
        include "footer.php";
?>

</html>