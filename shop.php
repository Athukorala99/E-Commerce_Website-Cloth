<?php
    session_start();
    include 'includes/connection.php';
    include 'includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <br><br><br><br>
    <br><br><br><br>
    <div class="shop-container">
        <h2>Our Products</h2>
        
        <!-- Category Filter Buttons -->
        <div class="category-buttons">
            <button class="category-btn active" data-category="All">All</button>
            <button class="category-btn" data-category="T-shirts">T-shirts</button>
            <button class="category-btn" data-category="Jeans">Jeans</button>
            <button class="category-btn" data-category="Leggings">Leggings</button>
            <button class="category-btn" data-category="Skirts">Skirts</button>
        </div>

        <div class="pro-container">
            <?php
            $query = "SELECT * FROM `add_product`";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='product-card' data-category='{$row['category']}'>
                        <img src='admin/{$row['image']}' alt='{$row['name']}'>
                        <div class='product-info'>
                            <p class='category'>{$row['category']}</p>
                            <h3>{$row['name']}</h3>
                            <div class='rating'>
                                " . str_repeat('<i class="fa fa-star"></i>', 5) . "<i class='fa fa-star-half-o'></i>
                            </div>
                            <div class='price-details'>
                                <p class='price'>Rs. {$row['price']}</p>
                                <a href='prodetails.php?id={$row['id']}' class='btn'><i class='fa fa-shopping-cart'></i></a>
                            </div>
                        </div>
                    </div>
                    ";
                }
            } else {
                echo "<p>No products available.</p>";
            }
            ?>
        </div>
    </div>

    <script>
        // JavaScript for Filtering
        const buttons = document.querySelectorAll('.category-btn');
        const products = document.querySelectorAll('.product-card');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                buttons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                const category = button.getAttribute('data-category');
                products.forEach(product => {
                    if (category === 'all' || product.getAttribute('data-category').toLowerCase() === category.toLowerCase()) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            });
        });
    </script>

    <?php
        include 'includes/footer.php';
    ?>
</body>
</html>
