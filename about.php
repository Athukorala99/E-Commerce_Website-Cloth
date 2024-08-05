<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .about-container {
            
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            padding: 50px;
            background-color: #f9f9f9;
        }
        .about-text {
            flex: 1;
            padding: 20px;
        }
        .about-text h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .about-text p {
            margin-bottom: 20px;
            color: #555;
        }
        .about-text .btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .about-text .btn:hover {
            background-color: #555;
        }
        .about-image {
            flex: 1;
            padding: 20px;
        }
        .about-image img {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br><br><br>
    <div class="about-container">
        <div class="about-text">
            <h2>So, who are we?</h2>
            <p>We're your new fashion besties. Our mission is to help you look and feel amazing with our curated collection of stylish and trendy clothing. We believe that fashion should be accessible to everyone, and our goal is to bring you the latest trends at affordable prices.</p>
            <p>Our team is dedicated to finding unique pieces that you won't find anywhere else. We're here to help you express your individuality and stand out from the crowd. Join us on our fashion journey and discover your new favorite outfit!</p>
            <a href="contact.php" class="btn">Contact Us</a>
        </div>
        <div class="about-image">
            <img src="img/about/a6.jpg" alt="About Us Image">
        </div>
    </div>
    <?php
        include 'includes/footer.php';
    ?>
</body>
</html>
