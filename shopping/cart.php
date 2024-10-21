<?php

function cartelement($productimg, $productname, $productprice, $productid, $product_ids)
 {
    $element = "
        <hr>
        <form action='cart.php?action=remove&id=$productid' method='post' class='cart-items'>
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
                    <div class='col-md-3 py-5'>
                        
                    </div>
                </div>
            </div>
        </form>
    ";

    echo $element;
}

require_once("./PHP/createdb.php");

require_once("PHP/component.php");

session_start();

$db = new createdb('rhythm_on_wrist', 'producttb');
 {
    if (isset($_SESSION['cart'])) {
        if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
            $product_id = $_GET['id'];
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['product_id'] == $product_id) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset array keys
                    echo "<script>alert('Product has been removed...!')</script>";
                    echo "<script>window.location = 'cart.php'</script>";
                }
            }
        }
    
        // Rest of the code for displaying the cart items...
    }
     
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
<style>
.custom-width {
  width: 50%;
  margin-left: 90px;
  margin-top: 50px;
}
</style>

</head>
<body class="bg-light">

<?php require_once('PHP/header.php'); ?>
    
<div class="container-fluid">
    <div class="row p-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>MY CART</h6>
                <hr>
                <?php
                $total=0;
              // Previous code...

              if (isset($_SESSION['cart'])) {
                $product_ids = array_column($_SESSION['cart'], 'product_id');
                $result = $db->getdata();
                while ($row = mysqli_fetch_assoc($result)) {
                    if (in_array($row['id'], $product_ids)) {
                        $product_id = $row['id'];  // Get the individual product ID
                        cartelement($row['product_image'], $row['product_name'], $row['product_price'], $product_id, $product_ids);
                        $total = $total + (float)$row['product_price'];
                    }
                }
            }
            

// Rest of the code...

                 else {
                    echo "<p>Your cart is empty.</p>";
                }
                ?>
            </div>
        </div>
    <div class= "col-md-4 offset-md-1 border rounded mt-5 bg-white">
    <div class="pt-4">
        <h6>PRICE DETAILS</h6>
        <hr>
        <div class="row price-details">
            <div class="col-md-6">
                <?php
                if(isset($_SESSION['CART'])){
                    $count = count($_SESSION['CART']);

                     echo"<h6>price($count items) </h6>";


                }else{
                    if($count>0){
                        echo "<h6>price( $count items) </h6>";}
                        else{
                            echo "<h6>price( 0 items) </h6>";}
                        }
                

                ?>
                <h6>DELIVERY CHARGES</h6>
                <hr>
                <h6>amount payable</h6>

            </div>
            <div class="col-md-6">
                <h6><?php echo "$$total"; ?></h6>
                <h6 class ="text-success">FREE</h6>
                <hr>  
             <h6>$<?php
             echo $total; ?> </h6>         </div>
             <a class="checkout" href="checkout.php"><button href="/shopping\checkout.php" type='submit' class='btn btn-danger btn custom-width' name='checkout'>proceed to checkout</button>
                </a>
        </div>
    </div>
    </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

<?php
include "footer.php";
?>
</html>
