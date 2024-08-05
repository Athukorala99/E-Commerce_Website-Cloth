<?php
session_start();
include 'includes/connection.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $query = "SELECT * FROM `add_product` WHERE id = $product_id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Invalid product ID.";
    exit();
}

// Handle form submission
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $pro_size = $_POST['size'];
    $pro_quantity = $_POST['quantity'];
    
    $cart_item = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'image' => $product_image,
        'size' => $pro_size,
        'quantity' => $pro_quantity,
    ];

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $pro_quantity;
    } else {
        $_SESSION['cart'][$product_id] = $cart_item;
    }
    
    $_SESSION['cartSuccess'] = "Product added to cart!";
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
    <title>Product Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="product-details-container">
        <div class="product-image">
            <img src="admin/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        </div>
        <div class="product-info">
            <h2><?php echo $product['name']; ?></h2>
            <p>Price: $<?php echo $product['price']; ?></p>
            <form action="" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">
                <label for="size">Select Size:</label>
                <select name="size" id="size" required>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
                <label for="quantity">Select Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
    </div>
<?php
    include 'includes/footer.php';
?>
</body>
</html>
