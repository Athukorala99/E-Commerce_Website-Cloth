<?php
session_start();
include 'includes/connection.php';

if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantities'] as $id => $quantity) {
        if ($quantity == 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
    }
    header("location: cart.php");
    exit();
}

if (isset($_POST['checkout'])) {
    $order_id = uniqid();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $status = "Pending";

    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
        $query = "INSERT INTO `orders` (`order_id`, `name`, `email`, `address`, `city`, `postal`, `pro_image`, `pro_name`, `pro_price`, `pro_size`, `pro_quantity`, `pro_subtotal`, `pro_gtotal`, `status`) 
                  VALUES ('$order_id', '$name', '$email', '$address', '$city', '$postal', '{$item['image']}', '{$item['name']}', '{$item['price']}', '{$item['size']}', '{$item['quantity']}', '$subtotal', '$total', '$status')";
        mysqli_query($conn, $query);
    }

    $_SESSION['orderSuccess'] = "Order placed successfully!";
    unset($_SESSION['cart']);
    header("location: cart.php");
    exit();
}

include 'includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <br><br><br><br>
    <br><br><br><br>
    <div class="cart-container">
        <h2>Shopping Cart</h2>
        <?php
        if (isset($_SESSION['cartSuccess'])) {
            echo "<div class='success-msg'>" . $_SESSION['cartSuccess'] . "</div>";
            unset($_SESSION['cartSuccess']);
        }
        if (isset($_SESSION['orderSuccess'])) {
            echo "<div class='success-msg'>" . $_SESSION['orderSuccess'] . "</div>";
            unset($_SESSION['orderSuccess']);
        }
        ?>
        <form action="" method="POST">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $id => $item) {
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                        echo "
                        <tr>
                            <td><img src='admin/{$item['image']}' style='width:70px;'></td>
                            <td>{$item['name']}</td>
                            <td>{$item['size']}</td>
                            <td>\${$item['price']}</td>
                            <td><input type='number' name='quantities[$id]' value='{$item['quantity']}' min='0'></td>
                            <td>\${$subtotal}</td>
                        </tr>
                        ";
                    }
                } else {
                    echo "<tr><td colspan='6'>Your cart is empty.</td></tr>";
                }
                ?>
                </tbody>
            </table>
            <div class="cart-total">
                <h3>Total: $<?php echo $total; ?></h3>
            </div>
            <div class="cart-buttons">
                <button type="submit" name="update_cart">Update Cart</button>
            </div>
        </form>

        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <h2>Checkout</h2>
            <form action="" method="POST">
                <div class="checkout-fields">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" required>
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" required>
                    <label for="postal">Postal Code:</label>
                    <input type="text" name="postal" id="postal" required>
                </div>
                <div class="cart-buttons">
                    <button type="submit" name="checkout">Proceed to Checkout</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
<?php
    include 'includes/footer.php';
?>
</body>
</html>
