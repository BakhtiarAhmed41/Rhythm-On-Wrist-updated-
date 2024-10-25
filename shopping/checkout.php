<?php
require_once("PHP/alert.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script async crossorigin="anonymous" data-clerk-publishable-key="pk_test_YXdhcmUtbW9vc2UtNTIuY2xlcmsuYWNjb3VudHMuZGV2JA"
        src="https://aware-moose-52.clerk.accounts.dev/npm/@clerk/clerk-js@latest/dist/clerk.browser.js" type="text/javascript">
    </script>
</head>
<body>
    <script>
        window.addEventListener('load', async function () {
            await Clerk.load();
            if (!Clerk.user) {
                
                window.location.href = "../auth/login.html";
            }
        });
    </script>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Checkout</h2>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once('./PHP/header.php');
                                require_once('./PHP/createdb.php');

                                // Create an instance of the createdb class
                                $db = new createdb('rhythm_on_wrist', 'producttb');

                                // Check if the user is logged in
                                if (!isset($_SESSION['cart'])) {
                                    echo '<script>display_alert("Please Select any item first!"); window.location.href = "index.php";</script>';
                                }

                                $total = 0;
                                foreach ($_SESSION['cart'] as $item) {
                                    $product = $db->getProductById($item['product_id']);
                                    $total += $product['product_price'];
                                    echo '<tr>';
                                    echo '<td>'.$product['product_name'].'</td>';
                                    echo '<td>'.$product['product_price'].'</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><strong>$<?php echo $total; ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                        <form action="" method="post" onsubmit="return validateForm()">
                            <h5 class="card-title">Payment Details</h5>
                            <div class="mb-3">
                                <label for="card_number" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Card Number" required>
                            </div>
                            <div class="mb-3">
                                <label for="expiration_date" class="form-label">Expiration Date</label>
                                <input type="text" class="form-control" id="expiration_date" name="expiration_date" placeholder="Expiration Date" required>
                            </div>
                            <div class="mb-3">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Pay Now</button>
                        </form>

                        <script>
                            function validateForm() {
                                var cardNumber = document.getElementById("card_number").value;
                                var expirationDate = document.getElementById("expiration_date").value;
                                var cvv = document.getElementById("cvv").value;

                                // Perform custom validation here
                                if (cardNumber.length < 8 || cardNumber.length > 16) {
                                    alert("Invalid card number!");
                                    return false;
                                }
                                if (cvv.length != 3) {
                                    alert("Invalid CVV number!");
                                    return false;
                                }

                                // Perform other validation checks as needed

                                return true; // Submit the form if all validations pass
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // Get the order details from the cart
        $product_ids = array_column($_SESSION['cart'], 'product_id');
        $result = $db->getdata();

        // Save the order details in the database
        while ($row = mysqli_fetch_assoc($result)) {
            if (in_array($row['id'], $product_ids)) {
                $sql = "INSERT INTO order_details (username, product_name, product_price, product_image) VALUES ('".$_SESSION['username']."','".$row['product_name']."', '".$row['product_price']."', '".$row['product_image']."')";
                mysqli_query($db->con, $sql);
            }
        }

        // Redirect the user to the order confirmation page
        echo '<script>alert("Order Placed Successfully!"); window.location.href = "../watch_store.php";</script>';
    }

    echo '<br>';
    echo '<br>';
    
    include 'footer.php';
    ?>
</body>
</html>
