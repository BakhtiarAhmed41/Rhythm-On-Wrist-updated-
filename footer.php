<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,500,300,700);

        * {
            font-family: Open Sans;
        }


        .footer-distributed {
            background: black;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
            box-sizing: border-box;
            width: 100%;
            text-align: left;
            font: bold 16px sans-serif;
            padding: 55px 50px;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right {
            display: inline-block;
            vertical-align: top;
        }

        /* Footer left */

        .footer-distributed .footer-left {
            width: 40%;
        }

        /* The company logo */

        .footer-distributed h3 {
            color: #ffffff;
            font: normal 36px 'Open Sans', cursive;
            margin: 0;
        }

        .footer-distributed h3 span {
            color: lightseagreen;
        }

        /* Footer links */

        .footer-distributed .footer-links {
            color: #ffffff;
            margin: 20px 0 12px;
            padding: 0;
        }

        .footer-distributed .footer-links a {
            display: inline-block;
            line-height: 1.8;
            font-weight: 400;
            text-decoration: none;
            color: inherit;
        }

        .footer-distributed .footer-company-name {
            color: #222;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
        }

        /* Footer Center */

        .footer-distributed .footer-center {
            width: 35%;
        }

        .footer-distributed .footer-center i {
            background-color: #33383b;
            color: #ffffff;
            font-size: 25px;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            text-align: center;
            line-height: 42px;
            margin: 10px 15px;
            vertical-align: middle;
        }

        .footer-distributed .footer-center i.fa-envelope {
            font-size: 17px;
            line-height: 38px;
        }

        .footer-distributed .footer-center p {
            display: inline-block;
            color: #ffffff;
            font-weight: 400;
            vertical-align: middle;
            margin: 0;
        }

        .footer-distributed .footer-center p span {
            display: block;
            font-weight: normal;
            font-size: 14px;
            line-height: 2;
        }

        .footer-distributed .footer-center p a {
            color: lightseagreen;
            text-decoration: none;
            ;
        }

        .footer-distributed .footer-links a:before {
            content: "|";
            font-weight: 300;
            font-size: 20px;
            left: 0;
            color: #fff;
            display: inline-block;
            padding-right: 5px;
        }

        .footer-distributed .footer-links .link-1:before {
            content: none;
        }

        /* Footer Right */

        .footer-distributed .footer-right {
            width: 20%;
        }

        .footer-distributed .footer-company-about {
            line-height: 20px;
            color: #92999f;
            font-size: 13px;
            font-weight: normal;
            margin: 0;
        }

        .footer-distributed .footer-company-about span {
            display: block;
            color: #ffffff;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-distributed .footer-icons {
            margin-top: 25px;
        }

        .footer-distributed .footer-icons a {
            display: inline-block;
            width: 35px;
            height: 35px;
            cursor: pointer;
            background-color: #33383b;
            border-radius: 2px;

            font-size: 20px;
            color: #ffffff;
            text-align: center;
            line-height: 35px;

            margin-right: 3px;
            margin-bottom: 5px;
        }

        footer-icons a.fab.fa-instagram:hover{
            background-color: blue;
        } 

        .contactbtn{
            margin-right: 60px;
        }
        .contactbtn a{
            /* padding-right: 15px; */
            text-decoration: none;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 14px;
        }

        .contactbtn :hover{
            background-color: blue;
            color: white;
            cursor: pointer;    
        }

        .contactbtn button{
            width: 150px;
            height: 40px;
            align-items: center;
            background-color: red;
            color: white;
            font-weight: bold;
            border-radius: 8px;
        }

        @media (max-width: 880px) {

            .footer-distributed {
                font: bold 14px sans-serif;
            }

            .footer-distributed .footer-left,
            .footer-distributed .footer-center,
            .footer-distributed .footer-right {
                display: block;
                width: 100%;
                margin-bottom: 40px;
                text-align: center;
            }

            .footer-distributed .footer-center i {
                margin-left: 0;
            }
            

        }
    </style>

</head>

<body>

    <footer class="footer-distributed">

        <div class="footer-left">

            <a href="watch_store.php" style="text-decoration: none;"><h3>RhythmOn<span>Wrist</span></h3> </a>

            <p class="footer-links">
                <a href="watch_store.php">Home</a>

                <a href="about.php">About</a>

                <a href="shopping/checkout.php">Checkout</a>

                <a href="contact.php">Contact</a>
            </p>


            <div class="contactbtn" style="margin-top: 20px; margin-left: 10px;">
            <a href="watch_store.php"><button href="watch_store.php"> 
                        Explore Watches  </button> </a>
            </div>

        </div>

        <div class="footer-center" >

            <div>
            <a href="tel:+923341817197"><i class="fa fa-phone"></i>
                 <p>+92 334 1817197</p> </a>
            </div>

            <div>
            <a href="mailto:fawadtariq@gmail.com"> <i class="fa fa-envelope"></i>
                <p>fawadtariq@gmail.com</p> </a>
            </div>

            <div class="contactbtn" style="margin-top: 13px; margin-left: 30px;">
            <a href="contact.php"><button href="contact.php"> 
                        Send us a message  </button> </a>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the company</span>
                Welcome to Vintage & New Watch Selling Platform! We are your go-to destination for exquisite timepieces, both
                classic vintage watches and cutting-edge new models.
            </p>


            <div class="footer-icons">
                <a href="https://instagram.com/rhythm_on_wrist?igshid=YmM0MjE2YWMzOA=="><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/+923341817197"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:fawadtariq@gmail.com"><i class="fa fa-envelope"></i></a>
            </div>

        </div>

    </footer>
</body>

</html>