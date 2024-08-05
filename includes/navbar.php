<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlowVibe</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="glass-header">
        <a href="index.php"><img src="img/logo.png" class="logo" alt="logo"></a>
        <nav>
            <a href="index.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="feedback.php">Feedback</a>
            
            <?php
     
            if(isset($_SESSION["profile"]["name"])) {
                echo '<span style="color:red;">Welcome <br> ' . $_SESSION["profile"]["name"] . '</span>';
                echo '<a href="includes/logout.php">Logout</a>';
            } else {
                echo '<a href="includes/login.php">Login</a>';
                echo '<a href="includes/signup.php">Register</a>';
            }
            ?>
            
            <a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
        </nav>
    </header>
</body>
</html>
