<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f5f7fa 25%, #c3cfe2 100%);
        }
    </style>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="contact-container">
        <div class="contact-text">
            <h2>Get in Touch</h2>
            <p>We'd love to hear from you! Whether you have a question about our products, pricing, or anything else, our team is ready to answer all your questions. Reach out to us through the contact details below or visit our store at the location shown on the map.</p>
            <p><strong>Address:</strong> 123 Fashion Street, Kegalle </p>
            <p><strong>Email:</strong> GlowVibe@fashionstore.com</p>
            <p><strong>Phone:</strong> +94700002077</p>
            <a href="mailto:contact@fashionstore.com" class="btn">Email Us</a>
        </div>
        <div class="contact-image">
            <img src="img/contactus.jpg" alt="Our Location">
        </div>
    </div>

    <?php
        include 'includes/footer.php';
    ?>
</body>
</html>
