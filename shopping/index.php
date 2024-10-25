<?php
session_start();
require_once('./PHP/createdb.php');
require_once('./PHP/component.php');
require_once('./PHP/header.php');
require_once("PHP/alert.php");

$database = new createdb('rhythm_on_wrist', 'producttb');

function updateCartCount() {
    $count = 0;
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']); // Count actual items, not quantities
    }
    echo "<script>
        if (document.getElementById('cart_count')) {
            document.getElementById('cart_count').textContent = $count;
        }
    </script>";
}

// Handling product add to cart request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        
        // Initialize cart if not exists
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Add new item entry regardless of existing items
        $_SESSION['cart'][] = array(
            'product_id' => $product_id
        );
        
        updateCartCount();
        
        // Optional: Add a success message
        echo "<script>display_alert('Product added to cart!')</script>";
    }
}

updateCartCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../icon.png">

    <style>
           body{ background-color: rgb(28, 27, 39);}
    </style>
</head>
<body>
    <div class="container">
        <div class="row text-center py-5">
           <?php
           $result = $database->getdata();
           while ($row = mysqli_fetch_assoc($result)) {
               component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
           }
           ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></script>
</body>

<?php include "footer.php"; ?>
</html>