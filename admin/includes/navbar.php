<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlowVibe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/jpg" href="../images/logo.png">

</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li><a href="index.php"><h2>GlowVibe</h2></a></li>
                <li><a href="index.php"><i class="">🏠</i> Dashboard</a></li>
                <li><a href="product.php"><i class="">🛒</i> Add Product</a></li>
                <li><a href="orders.php"><i class="">✅</i> Orders</a></li>
                <li><a href="users.php"><i class="">👥</i> Users</a></li>
                <li><a href="account.php"><i class="">⚙️</i> My Account</a></li>
                <li><a href="form/logout.php"><i class="">➡️</i> Logout</a></li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle" onclick="toggleMenu()"></div>
                <div class="user">
                    <a href="account.php">
                        <img src="images/logo.png" alt="">
                    </a>
                </div>
            </div>
