<?php

    include 'includes/navbar.php';

    session_start();



    if(!$_SESSION['admin']){

        header("location: form/login.php");

    }

        include 'includes/connection.php';
        // for the count of total products
        $products = mysqli_query($conn, "SELECT * FROM `add_product`");
        $productsCount = mysqli_num_rows($products);

        // for the count of total orders
        $orders = mysqli_query($conn, "SELECT * FROM `orders` GROUP BY `order_id`");
        $ordersCount = mysqli_num_rows($orders); 

     

        // for the count of total users
        $users = mysqli_query($conn, "SELECT * FROM `users`");
        $usersCount = mysqli_num_rows($users); 


?>



            <div class="cardBox">
                <div class="card">
                    <div>
                       
                        <div class="cardName">Total Products <h1> <?php echo $productsCount; ?></h1></div>
                    </div>
                
                </div>
                <div class="card">
                    <div>
                       
                        <div class="cardName">Orders<h1><?php echo $ordersCount; ?></h1></div>
                    </div>
                    
                </div>
               
                <div class="card">
                    <div>
                       
                        <div class="cardName">Users<h1><?php echo $usersCount; ?></h1></div>
                    </div>
                   
                </div>
            </div>


            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="orders.php" class="btn">View all</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Order ID</td>
                                <td>Email</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                include ("includes/connection.php");
                                $Record = mysqli_query($conn, "SELECT * FROM `orders` GROUP BY `order_id` ORDER BY `id` DESC");
                                while($row = mysqli_fetch_array($Record)){
                                    echo "<tr>
                                        <td>$row[order_id]</td>
                                        <td>$row[email]</td>
                                        <td><span class='status'>$row[status]</span></td>
                                    </tr>";
                                }


                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>
                    <table>
                        <tbody>
                            <?php
                                include ("includes/connection.php");
                                $Record = mysqli_query($conn, "SELECT * FROM `users`");
                                while($row = mysqli_fetch_array($Record)){
                                    echo "<tr>
                                            <td width='60px'><div class='imgBx'><img src='images/profile.png'></div></td>
                                            <td><h4>$row[name]<br><span>$row[email]</span></h4></td>
                                        </tr>";
                                }


                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    