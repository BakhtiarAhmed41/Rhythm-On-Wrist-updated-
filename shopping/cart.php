<?php
require_once("./PHP/createdb.php");
require_once("PHP/component.php");
require_once("PHP/alert.php");
session_start();

function cartelement($productimg, $productname, $productprice, $productid, $cart_item_index)
{
    $element = "
        <hr>
        <form action='cart.php?action=remove&id=$productid&index=$cart_item_index' method='post' class='cart-items'>
            <div class='border rounded'>
                <div class='row bg-white'>
                    <div class='col-md-3 pl-0'>
                        <img src='$productimg' alt='img' class='img-fluid'>
                    </div>
                    <div class='col-md-6'>
                        <h5 class='pt-2'>$productname</h5>
                        <small class='text-secondary'>Vintage Watch</small>
                        <h5 class='pt-2'>$$productprice</h5>
                        <button type='submit' class='btn btn-danger mx-2' name='remove'>remove from cart</button>
                    </div>
                    <div class='col-md-3 py-5'></div>
                </div>
            </div>
        </form>
    ";
    echo $element;
}

$db = new createdb('rhythm_on_wrist', 'producttb');

if (isset($_SESSION['cart']) && isset($_GET['action']) && $_GET['action'] === 'remove') {
    if (isset($_GET['id']) && isset($_GET['index'])) {
        $cart_index = $_GET['index'];
        
        if (isset($_SESSION['cart'][$cart_index])) {
            unset($_SESSION['cart'][$cart_index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset array keys
            echo "<script>display_alert('Product has been removed!')</script>";
            echo "<script>window.location = 'cart.php'</script>";
        }
    }
}

$total = 0;
$count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../icon.png">
    <style>
        body {
            background-color: rgb(28, 27, 39);
        }

        .custom-width {
            width: 50%;
            margin-left: 90px;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <?php require_once('PHP/header.php'); ?>
    
    <div class="container-fluid">
        <div class="row p-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6 style = "color: white">MY CART</h6>
                    <hr>
                    <?php
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        $result = $db->getdata();
                        $products = [];
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            $products[$row['id']] = $row;
                        }
                        
                        foreach ($_SESSION['cart'] as $index => $item) {
                            if (isset($products[$item['product_id']])) {
                                $product = $products[$item['product_id']];
                                cartelement(
                                    $product['product_image'],
                                    $product['product_name'],
                                    $product['product_price'],
                                    $product['id'],
                                    $index
                                );
                                $total += (float)$product['product_price'];
                            }
                        }
                    } else {
                        echo "<p>Your cart is empty.</p>";
                    }
                    ?>
                </div>
            </div>
            
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white">
                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <h6>Price (<?php echo $count; ?> items)</h6>
                            <h6>DELIVERY CHARGES</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php echo $total; ?></h6>
                        </div>
                        <a class="checkout" href="checkout.php">
                            <button type="submit" class="btn btn-danger btn custom-width" name="checkout">
                                Proceed to Checkout
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
    <?php include "footer.php"; ?>
</body>
</html>
