    <?php
    session_start();
    include 'includes/navbar.php';
    include 'includes/connection.php';
    ?>
    
    
    <section id="hero">
    <h4>Discover the Essence of Style!</h4>
<h2>Why blend in with the crowd <br> when you can <span style="color: #088178;">GlowVibe</span>?</h2>
<p>GlowVibe: Women's style destination. Shop now!</p>

        <button onclick="window.location.href='shop.php';">Shop Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>24/7 Support</h6>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
    <?php
    $query = "SELECT * FROM `add_product`";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='product-card'>
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


    </section>

    <?php
        include 'includes/footer.php';
    ?>
</div>