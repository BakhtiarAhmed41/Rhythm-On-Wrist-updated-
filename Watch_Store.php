<?php
session_start();
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
 }
 else {
    $loggedin = false;
 }
 ?>




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


#testimonials{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  width:100%;
}
.testimonial-heading{
  letter-spacing: 1px;
  margin: 30px 0px;
  padding: 10px 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.testimonial-heading h2{
    font-size: 2.5rem;
    color: blue;
  margin-bottom: 10px;
  letter-spacing: 2px;
  text-transform: uppercase;
}

.testimonial-heading h4{
    font-size: 2rem;
  color: red;
  
  margin-bottom: 10px;
  letter-spacing: 2px;
  text-transform: uppercase;
}

.testimonial-box-container{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  width:100%;
}
.testimonial-box{
  width:500px;
  box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
  background-color: #ffffff;
  padding: 20px;
  margin: 15px;
  cursor: pointer;
}
.profile-img{
  width:50px;
  height: 50px;
  border-radius: 50%;
  overflow: hidden;
  margin-right: 10px;
}
.profile-img img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}
.profile{
  display: flex;
  align-items: center;
}
.name-user{
  display: flex;
  flex-direction: column;
}
.name-user strong{
  color: #3d3d3d;
  font-size: 1.1rem;
  letter-spacing: 0.5px;
}
.name-user span{
  color: #979797;
  font-size: 0.8rem;
}
.reviews{
  color: #f9d71c;
}
.box-top{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}
.client-comment p{
  font-size: 0.9rem;
  color: #4b4b4b;
}
.testimonial-box:hover{
  transform: translateY(-10px);
  transition: all ease 0.3s;
}

@media(max-width:1060px){
  .testimonial-box{
      width:45%;
      padding: 10px;
  }
}
@media(max-width:790px){
  .testimonial-box{
      width:100%;
  }
  .testimonial-heading h1{
      font-size: 1.4rem;
  }
}
@media(max-width:340px){
  .box-top{
      flex-wrap: wrap;
      margin-bottom: 10px;
  }
  .reviews{
      margin-top: 10px;
  }
}
::selection{
  color: #ffffff;
  background-color: black;
}


.faq {
  margin: 0 auto;
  padding: 4rem;
  width: 48rem;
}

.accordion {
  .accordion-item {
    border-bottom: 1px solid white;
    button[aria-expanded='true'] {
      border-bottom: 1px solid white;
    }
  }
  .faqbutton {
    position: relative;
    display: block;
    text-align: left;
    width: 100%;
    padding: 1em 0;
    color: white;
    font-size: 1.15rem;
    font-weight: 400;
    border: none;
    background: none;
    outline: none;
    &:hover, &:focus {
      cursor: pointer;
      color: white;
      &::after {
        cursor: pointer;
        color: white;
        border: 1px solid white;
      }
    }
    .accordion-title {
      padding: 1em 1.5em 1em 0;
    }
    .icon {
      display: inline-block;
      position: absolute;
      top: 18px;
      right: 0;
      width: 22px;
      height: 22px;
      border: 1px solid white;
      border-radius: 22px;
      &::before {
        display: block;
        position: absolute;
        content: '';
        top: 9px;
        left: 5px;
        width: 10px;
        height: 2px;
        background: currentColor;
      }
      &::after {
        display: block;
        position: absolute;
        content: '';
        top: 5px;
        left: 9px;
        width: 2px;
        height: 10px;
        background: currentColor;
      }
    }
  }
  .faqbutton[aria-expanded='true'] {
    color: white;
    .icon {
      &::after {
        width: 0;
      }
    }
    + .accordion-content {
      opacity: 1;
      max-height: 9em;
      transition: all 200ms linear;
      will-change: opacity, max-height;
    }
  }
  .accordion-content {
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    transition: opacity 200ms linear, max-height 200ms linear;
    will-change: opacity, max-height;
    p {
      font-size: 1rem;
      font-weight: 300;
      margin: 2em 0;
      color: white;
    }
  }
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


    <div id="testimonials">
    <div class="testimonial-heading">
        <h4>Let's take a look what our</h2>
        <h2>Clients Say</h4>
    </div>
    <div class="testimonial-box-container">
        <div class="testimonial-box">
            <div class="box-top">
                <div class="profile">
                    <div class="profile-img">
                        <img src="https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Ninja-2-512.png" />
                    </div>
                    <div class="name-user">
                        <strong>Liam mendes</strong>
                        <span>@liammendes</span>
                    </div>
                </div>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
            <div class="client-comment">
                <p>I love the variety of watches available on RhythmOnWrist! The quality is exceptional, and the customer service is top-notch. I will definitely be shopping here again!</p>
            </div>
        </div>
        <div class="testimonial-box">
            <div class="box-top">
                <div class="profile">
                    <div class="profile-img">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABNVBMVEXL4v////++2Ps2Xn3/3c5KgKr/y75AcJMrTWb0+//igIbk9v/dY27K4f+71vvO5f/S6f9Pc5IxWnpkhKElSWJbdo/k+v9AeqXa4fL/4dH1///C2/z/28vie4H1+f/X6f/00c7r8/7z3tq30fCqx+nv9v//0MEAQV/s/v8wZ43d7P8fVHhAcZQ8aIo7eKXYw77twrh5hpbcV2M3V3JNaoTRvbm5rq+mo6eYmqKEgYrm4Ofo197T3/b63dN5l7T48e+LsNOOo7RjkrmRtNbJ3uviiY/il57jvMOuwM6sdIPGeoTh6O6FYHeOqcZJaYOjvNe4oaDPr6pLYHKhkJN3eYN+iZfRx8r66uRzjqSmuMZ/lql4ocfryM3msbjdbnni09yVsMTioKZ5aoCYcIGudYNkZn/QY28qmTvyAAARvElEQVR4nM3d+18axxYA8EWCiIqrC0oiiqX4BvJ+WFNpNCSlNZomvbk1SZPY9Lb//59wZ3dZmMeZx5mdhZzP/eF+xLh8e86cmVmWXS+XeZR2moeHW365Xp+pz4RRr5fLnr912Gw2Stkf3svyjzeaROaVia0e2+hYimKm7B82G40M30RWQoILbSRZSYRQgTmUzpS3mlkpsxA2mlsebaOjDCoj54x3mIXSuXDnUKrTIEPmzFbT9dB0KoyTp9Jple5T6VBozBsOS1kmZ8iwbLp7W66EjUNNbaLKlaTS33H0ztwImz6ap0MuLdUPnQxJB8IG6S1WPG0iZ7YcjMjUwsaWZfqMjEte6mJNKUzvi0JunFlK23VSCR35PGUeiTFVHlMIS858WqOXYjzaCw9d+jTGpaWtiQubafqn1KhI48zhRIUNPwNfGKpSrdsNRyuh8wIdh3I4WpWqhXAniwKljKpSbU5CeJipz9Ok0Uev5LDCjBM4NKpGYzNbYeYJ1BLRoxElzKyFiqFsqqj5HyOcSIUmoUojquEghBOqUBPiEmL6NxduTRboqSvV/H2b/mZpckPQjGg8GA2FjUkOwXEoB6PhIs5MuDMNnpbYdCdsTiWBWqJZvzERThHogGggtAT6/rJx+Ko/lJKoF9pMg77v119f9CorungQxmXvtcqYcgmnFVoAfb91sdIOwshrYo5EtVrde/DalqjNok6IB/r+dkVPo4SRcu8qK6JGiB+Dyy1z31hIjKvLir+agqgWWgAvED5aOFftKYgpsqgU7mCBfrnSRvgY4Vy1ZVuoTVthAw2sr2ASyAsrqjq1XsAphCWkjwAvkUBGODdXV/11xTJ8RrUMVwjxuwk0kBXuqaYMDdFGiN4P+hU0kBVWL5RCy/2i9BX0REi6KBrICVXd1LNtqDIhvo22LICc8EottGuoEmED6SMptKhRvtNUWxqiaijOSM4VS4ToLuO3cBMhLHzwuqzeaVh0G1iIX43apZATkkU42WmsXpTlqVTVKbzPAIXoQeh5VqNQEEZIstXolWV5xA9FUKhu2lD4No0UFA7LVbqCQ9cpJLTYEi5jl2tq4Vx1TkpUJdE3E1rUqFe38smFc9W8qzoFhHif57+2S6FcqJj+VXW6ZCK0Oi9jOQwVwrkH0vehEor9VBCit0xhLPfcC+XrcFydCkJ8H81IqFjDofopL7Q7OWo536uF8g0xagnOCy3P/mYhXJWXk7LZlJRCy09BJy3ENBtWaNVmpiFUJrGhENp+zgsKg3Zbe2Yxouzt7VWrOKEyiZ5caJtCSNjOHz1+/ORe0FYiCe/BD7+9efP72z2cUNlsdqRC64/qBWEQPL5xK4wbj44uw1yKTvKzdvvt729md3fJ/3bfzFUxQmWdejKhdQoFYZA/uXUjDqI8eXR072FctMMg/zf/8N7RoxOiG8bu3QdVjNA4ibTQ/moLQXgnASbKGyd3Hj1+cnT07t27o6Mnjx/dOYl+OjuO3buoHKpG4kwZFtqnkBcGRwxwxKQj/uEsTfx9DyNUJrEBClNcMMPn8AQQgkELZ++icmi6UfRcpJATBqumQFa4+7aKERrOiWNhmou6OOE9S+F/UELDhc1YaO9zJvwBJzQ7ezoSprqkZDpCs0+GR0KrfeGUhUb7xESYps9MTWg06yfCdNdWcsJ3ExIaTRiJMN2FXZzwiaXwtz2k0OS0m+egz/DC9h074exdrNDknJTnokhZIWLC54TMhGgiVC5OPVqI/7hQLgwC4zUbLyTrtipOqJwSG5Qw7fWVlLB9aV6jgnD27tu9KkZoUKaeiyIlwvYwLo8QGRSFs7Nktz+MhyZTtL5MvdQrtij+eycOsutD+CDh7uzdYdwx+c+uX7l5LorUK3/P7PrSCMfxndGRtWXqpd1WDIVYmonQ6F2phFsjYUrfVIXKMk2E6dakUWQiNDqy9mSG52IYfrPCw6HQwTeapifUzheei2E4VaFuIHpOhuE0hbqB6Ln5Ssy3KmxGQhffnJyiUDcjeinP0HwDQtVALEdCB8BvVlgvEaGLRuMdZyB8anhsTavx3Hz37scMhD+6EDaJ0M1XtI83XAtNU6hb1XiuvqN9fMPG6ACoO6foOWmlYfg3j/H9RtJjnn4xLdEw1M3Uc9JKk0ATYSDyqOp1m5fyXDAb6JaatkC1wqWc52SySOKmE+GxS2HDs7kiWC7EdhtQeBN5VPV04Tn9Kjp6WgSFmC4TxQSF3okD4S76qCrhoef2nizYZuqilWp2F46FyGa64aKV6oRbLoHYZgoKsY1Gc6rGsdBzIMQfVLmo8Vwt2oaBG4i7TobhZIU/omZESIgvUvUe2K3PQ84XTuaKSQsxyxpoGH5xLJxxLsQkEShSmxROWojY7TtK4aSF5kkEitQqhRMXGo9EoEgtGqk3eaHpnAik8Du7A6p7qeP5MAqzOgVSaHm8yQuNtolACu1qVLemcbwujcNkKIopxJ69GMUUhAZThgjE75qSUDUa3/H+cBQ6olij39uPFwXQ+Q54HJq9sJBC+wzqhJndFFGZRadAzXma7G77qNjvC0DbLhqF5myi0/OlbPiyqZ8fhN+hzx8yoRE6PefNBzwYeWCqCvV0H5G6/dyCD7BQOeDuRqoS9TRCx5898QEJdznfjRtphbrPnrJYtiUBCHd5X7bCsrvPgMEQhBsCz4FQVaS+s8/x4eCFSQJ3d+nJMqVQ+zl+lvdBNjsFnqWw6ep6GklMX9hwdU2UJCYi1F4TlWUznbqw7OzaRElMRKgq0i1n15dKYurCprNrhCUxCaHBNcLZtRrf6NTpxs1UncDgOu+sVjXL9d7gRE/cOBn06pq7eqpCBfTdfd9CDOLLr5ZK+lOnt0ql1by90ej7FhkMROILgvZgvVTSftmrUVoftANro/beEW6+98RF5MvnL0skGhrgT+EvXQb5oN1rqZ8CgRfOuPvuGutr9fLhV0qD01z47n9SDcWNCJg7jX4/6OnusguEKoXj7665PFcTjr/4K7Pt/npJQ9z4I/qV9X58i15Sq9g8Gn7/0FmZ+n6rN7olVBADFcSNP4a/sT76NySPPsaoLVJH3wMe+pYpXz64yg3ff+kPCfEk+YXc1fifBag86m+I5ea73KKPFOn7JIcy4q3R6+vv6e/zBxVjo/F3udN+Hz/ycU/uSIZhFNDMvzF+ORmIaKPBLWrc3FMhfDIJf+u59k6JCnFajNvoMHa4u4EH7YpRX1UBmXsqpLz/jt96nhdvOUcDSw2eyABLJeFfB/nnpOdoEom4L4b1eWGflOfzs8KB+A5XS2xI2ugwVsX/QgeFs2ekWFVIxL1N7CZ9cvTWs0KtVih0ReHVOmtg5oyNE/bVdeDWkt1C+KeftTw5UgXk70+DX5v6fnn7WeE24ZEoisIPnJAhnnCvrX8QhcXoLxPkx+0yjETdYwh5tsZfLm9/jLIXR00UnuY4BTVn3OJfitdtbIz+eCFE1oHmirpPFKbXDHkFOoQyDU75HI6JXJeBhV3m79cKZ9tlDml2O2H0/dp8v/78rMbywjARrsdEEVhaF4XCEWq3z54zV8cg79dm1GvCeQHiAUmEhPHMP1xua4Rd6CC12tnz0brV8IlzmPsm+v62hAckERaSmZ+fJyRVKjsMQW7HRsObXyLufblMfLLjFoR2CnSamMi30VjI99Ki4ki1wna43lHVKMUyvn+pXz+7rTiqkERxtojL8fufoJ8Ls4X6ULWzlm9x/1JlEpe31ccUkijM+LHkz8XPx8AL/IyvSmEc2yqh5B60qq3+8jNVgUJJFFZtEeTT/cXFxacAkVu16Q9W+6hIoew+wvIk+h8NgGw7DS5F3/rLELh4/0+R2GWEYCNlo9M9MxmFhvfz9k0yyJdpWwA2XkRAQvwkENndk75Ia8XiwUfJhKi4n7ckicvPjYDclNjuc8DjzSGQEF+us0Z2B2yQw06xWOw+A4mqe7LDSfS3zYBcM20PWODTRSruz5do4v6A2wHrDkVSGBK3QaHqvvrgwqZs5it02DcZXK/RwJ/vLzJBt9SdtWtusujojhUJi50lAKh8NgK0EzbrMuL2IviwvzDylf7igExLXdgXNk/qY8YpJEkEhiL/MB3tM0r8llWNEuHK/kJCHPUYplIT4sLC/gr/r9V1WkxCrFPtM0qEfaL/0Q5IiEQ4JD4FgIufh6+S39oHHqCgOFZnJCye8UnUPmdGmPYNUyi+Q9JMF5JY40dhGMdro9f70IP3pMeqjYHFAy6JS8JDV3XPezKcCsXzNGEzHRPWhHF4/2fqVb6VRiGdMqgUFovsSDR53hO3FfaNMiiexAir9Hp/YRybHPDlGLiwD5zDkCeRARY7bA4Bjvgjuk4N+0wHeoNBhRKunQuDkBIC5xLz0imDAbK9xvC5a/TKxjdbzsDCLq1Y+0LX6X1qEJKAilwm7HBCagVu+uw8up8um3VSsErzQZ8hfhoT6UEoazSSOZEDMt3U+PmHVJ2Wz4yEUCslwveMY+3lZhIv2Rf4Fc0wwCPxwOKKska1zyGtmwGBM8Kh8IpuNQsLL+aTeMH8fP8KFIIbDCGFxU5LNterhKNnybYMhXCZsgPxeHMk3OSGISiEilQEFotJqynDFM3zgE2XbOCESM/54axPCZlxCA9DaDqsAcBRM8U9DzgZisZCyYxIQdb+ooR/0S/AwxA6MgBMVjXYZzonS3BjIZjEoEKnap4OOrngQ9ugFEI1Oswh/rncw1nRXAi20zY8DLmBCBapKTAW2jxbPe42CCHUTqmlKT0MmYEIL0qBRgoDY6HkidUaYQmXQyiJ4S44gbxkqnQ8I4q7XziFUJcZCRtyhkIYNlSMEFy6jYtxkxFujosU+mfigk0GjITClslQSBoqRgg1m3Z/DRqG1EBcg+YKoM3IgEQobaN6Ya6JEkL7/KRM2WFIDUSwSBFAIlQCNcLcTc2nMWwAdboCD0NqIIqnaIAalQOLB301QSPMvUYRxTpNljXNeT6a0gWNWKOSNhoBrzUCnRBJFMv0dB8ahqOBCG3vnQL1QhxRXLytgMNwPBDFtAtDX1WiWqCBEEcU5v24mwrDcD7eIwKdVJjrVRl8r3/7BsLcAEMUrliIuqk4DOOBKHZSYRCqgAODd28izPUxRCGJRLj2lC9SksSnJIn7QgqFokgJNBPm+phpkReStak4DOOBKK5Jub8lXcmEoZkmUMLcecHcyHWb8FyGOAzjGXGf3zhxR1EBO+dmb91QmGvorsSggu82fX5ROkwimQy53+S6jGoIrigW21bCXO7CnMh9GHy9/wUUftnndvdcl1EBe8bv21yImTXYaxZW1z6Bwk9rq6rrE1LOEhbCXN98MLJJ7EPDkAxEbjJk/oKDHoMXYgYjk8QPIHB+np0MjRNYMewxFkJEpbINVSJkfoepj1Qr0VRCUqmGRnonFfwCAn8JJEBFhR50MBVqI8w1THsqTfwH7DQPqd+gt4SqBH6QnPd1KAzXcGYNh5oWg18B4a9UCumJUOHT7XYdCXO5azMjRfwKrNq+gkBVAk9t3qyVMHdu1lSpafGFIHwxfnE8EapGYMUigdZCsqOSXw4NEYO/hR3w34EIlCfwwGwj4VCYKxmV6oj4UD5VjIDKAjVdhroTklK9MMhjQgz+J5sqEqByFYqa450JSVft6YdjQnzInS99yAJrigK9SuFLKSTGM22tdsEJI5kqYqCywaTypRaSWu3parULzPqb/1BAVX9JU5+OhMR4rVnJdcUkDlPYVfs616l9ToRkJTdQF2tM/EoJvyZAqe/goDKw7p90OBHmwsZ6W4GMieMk/jpcjCp8pw7SF4UrYS7srAUpMiQG4yR+jYpUyite2U7vQDgU5nI7AymySy/d4gWbJHnF3sBV+qJwKiRR6l8QJKDshkmM2unm51cBDDw46Jz20dsjTbgWhnFOUlkTchkS5zc3Py8u/huNQR530HGcvGFkIQzjvH9xVrjNZJMQX0WXJ74iXbTD4iqnmejCyEoYRum8/zpy3r4dgQjx38Uohd0YFtk+XPfPnUwLkshSOIxGfzB4f9qrrHS6+VdRClcqld7p9WCQLW0Y/wc/mDa0n02PDAAAAABJRU5ErkJggg==" />
                    </div>
                    <div class="name-user">
                        <strong>Noah Wood</strong>
                        <span>@noahwood</span>
                    </div>
                </div>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="client-comment">
                <p>I was impressed by the fast shipping and quality packaging of my watch. RhythmOnWrist truly cares about their customers. I'm definitely coming back!</p>
            </div>
        </div>
        <div class="testimonial-box">
            <div class="box-top">
                <div class="profile">
                    <div class="profile-img">
                        <img src="data:image/png;base64,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" />
                    </div>
                    <div class="name-user">
                        <strong>Oliver Queen</strong>
                        <span>@oliverqueen</span>
                    </div>
                </div>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="client-comment">
                <p>The experience I had with RhythmOnWrist was amazing! From browsing to purchasing, everything was seamless. I'm thrilled with my new watch!</p>
            </div>
        </div>
        <div class="testimonial-box">
            <div class="box-top">
                <div class="profile">
                    <div class="profile-img">
                        <img src="data:image/png;base64,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" />
                    </div>
                    <div class="name-user">
                        <strong>Barry Allen</strong>
                        <span>@barryallen</span>
                    </div>
                </div>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
            <div class="client-comment">
                <p>RhythmOnWrist has completely transformed my watch collection experience! The interface is sleek and easy to navigate, and I found exactly what I was looking for in no time. Highly recommend!</p>
            </div>
        </div>
    </div>
        </div>
  




    <div class="faq">
  <h2 style="color: red; text-align: center; font-size: 40px; margin-bottom: 20px;">Frequently Asked Questions</h2>
  <div class="accordion">
    <div class="accordion-item">
      <button class="faqbutton" id="accordion-button-1" aria-expanded="false"><span class="accordion-title">What types of watches do you offer?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>We offer a diverse collection of luxury, designer, and vintage watches to suit every style and occasion. Explore our categories to find the perfect watch for you!</p>
      </div>
    </div>
    <div class="accordion-item">
      <button class="faqbutton" id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Do you provide warranty for your watches?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Yes, all of our watches come with a warranty to ensure your satisfaction and confidence in your purchase. Please refer to the warranty information specific to each watch for details.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button class="faqbutton" id="accordion-button-3" aria-expanded="false"><span class="accordion-title">How can I track my order?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Once your order is shipped, you will receive a confirmation email with a tracking link. You can use this link to monitor the status of your delivery.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button class="faqbutton" id="accordion-button-4" aria-expanded="false"><span class="accordion-title">What is your return policy?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>If you are not satisfied with your purchase, you can return it within 30 days of receiving it, provided it is in original condition. Please check our return policy for more details.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button class="faqbutton" id="accordion-button-5" aria-expanded="false"><span class="accordion-title">How can I contact customer support?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>You can reach our customer support team through the contact form on our website or by emailing support@rhythmonwrist.com. We're here to help!</p>
      </div>
    </div>
  </div>
</div>


</body>
<script>

src='https://kit.fontawesome.com/c8e4d183c2.js';


    const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>
     <?php
        include "footer.php";
     ?>

</html>