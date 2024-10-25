<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Rhythm on Wrist</title>
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
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

.header_vid{
    width: 100%;
    height: 600px;
    object-fit: cover;
    
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

/* For tablets and larger screens */
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


<?php include 'header.php'; 

include 'watch_component.php';
?>
<!-- Initialize Clerk -->
<script 
    async 
    crossorigin="anonymous" 
    data-clerk-publishable-key="pk_test_YXdhcmUtbW9vc2UtNTIuY2xlcmsuYWNjb3VudHMuZGV2JA" 
    src="https://aware-moose-52.clerk.accounts.dev/npm/@clerk/clerk-js@latest/dist/clerk.browser.js"
    type="text/javascript">
</script>

<script type="text/javascript">
window.addEventListener('load', async function() {
    try {
        await window.Clerk.load();
        updateAuthButton();
        
        // Listen for auth state changes
        window.Clerk.addListener(({ user }) => {
            updateAuthButton();
        });
    } catch (error) {
        console.error('Error loading Clerk:', error);
    }
});

function updateAuthButton() {
    const button = document.getElementById('auth-button');
    const container = document.getElementById('auth-button-container');
    
    if (window.Clerk.user) {
        // User is signed in
        button.textContent = 'Logout';
        button.onclick = async () => {
            try {
                await window.Clerk.signOut();
                // Redirect to home page after sign out
                window.location.href = '/Web Engineering Project (Rhythm on Wrist)/watch_store.php';
            } catch (error) {
                console.error('Error signing out:', error);
            }
        };
    } else {
        // User is not signed in
        button.textContent = 'Login';
        button.onclick = () => {
            window.location.href = '/Web Engineering Project (Rhythm on Wrist)/auth/login.html';
        };
    }
}
</script>



    <div class="header-image">
        <!-- <video  class="header_img" src="Main page/Front photo/PXL_20230616_110219519.PORTRAIT.jpg" alt="header image"> -->
            <video class="header_vid" src="Display watch.mp4" autoplay muted loop alt="header video"></video>
    </div>

    <div class="watch_display1">
        <span class="display_name">
            <h2>Featured Vintage Watches</h2>
        </span>

        <div class="display1">
    <?php
    // Call the function for each vintage watch
    displayWatch("Main page/Vintage watches/PXL_20230412_133616568.PORTRAIT (1).jpg", "Vintage Watch 1");
    displayWatch("Main page/Vintage watches/PXL_20230513_134242964.PORTRAIT.jpg", "Vintage Watch 2");
    displayWatch("Main page/Vintage watches/PXL_20230513_134718791.PORTRAIT.jpg", "Vintage Watch 3");
    displayWatch("Main page/Vintage watches/PXL_20230612_140859559.PORTRAIT.jpg", "Vintage Watch 4");
    ?>
</div>


    </div>
    
    <div class="watch_display1">
        <span class="display_name">
            <h2>Featured New Arrivals</h2>
        </span>

        <div class="display1">
    <?php
    // Call the function for each new stock watch
    displayWatch("Main page/New stock/PXL_20230402_105630173.jpg", "New Stock Watch 1");
    displayWatch("Main page/New stock/PXL_20230604_062154819.jpg", "New Stock Watch 2");
    displayWatch("Main page/New stock/PXL_20230430_131708144.PORTRAIT.jpg", "New Stock Watch 3");
    displayWatch("Main page/New stock/PXL_20230503_134551841.PORTRAIT (1).jpg", "New Stock Watch 4");
    ?>
</div>

    </div>


    <?php include 'testimonials.html'; ?>
    <?php include 'faq.html'; ?>
    
</body>

     <?php
        include "footer.php";
     ?>

</html>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
</script>