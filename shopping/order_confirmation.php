
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Order Confirmation</h2>
                <hr>
                <?php if (!empty($orderDetails)) : ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Thank you for your order!</h4>
                        <p>We have received your order and it is being processed.</p>
                        <hr>
                        <h5>Order Details:</h5>
                        <ul>
                            <?php foreach ($orderDetails as $item) : ?>
                                <li><?php echo $item['product_name']; ?> - <?php echo $item['product_price']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php else : ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Thank you for your order!</h4>
                        <p>We have received your order and it is being processed.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
<?php
include 'footer.php';
?>
</html>
