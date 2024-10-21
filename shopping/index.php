<?php
//start session
session_start();
require_once('./PHP/createdb.php');
require_once('./PHP/component.php');
require_once('./PHP/header.php');
//create instance of createdb class
$database= new createdb('rhythm_on_wrist','producttb');

function updateCartCount() {
    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    echo "<script>
        if (document.getElementById('cart_count')) {
            document.getElementById('cart_count').textContent = $count;
        }
    </script>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        
        if (isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'], 'product_id');
            if (in_array($product_id, $item_array_id)) {
                echo "<script>alert('Product is already added in the cart..!')</script>";
                echo "<script>window.location = 'index.php'</script>";
            } else {
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $product_id
                );
                $_SESSION['cart'][$count] = $item_array;
                updateCartCount();
            }
        } else {
            $item_array = array(
                'product_id' => $product_id
            );
            $_SESSION['cart'][0] = $item_array;
            updateCartCount();
        }
    }
}

// Update cart count on page load
updateCartCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

<?php
        include "footer.php";
     ?>


</html>