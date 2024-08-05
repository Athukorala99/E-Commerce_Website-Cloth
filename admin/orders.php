<?php

    include 'includes/navbar.php';

    session_start();



    if(!$_SESSION['admin']){

        header("location: form/login.php");

    }
    include ("includes/connection.php");

?>

            <div class="details orders">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>All Orders</h2>
                    </div>
                    <table>
                        
                        <?php

                                $uniqueRecord = mysqli_query($conn, "SELECT * FROM `orders` GROUP BY `order_id` ORDER BY `id` DESC");

                                while($row = mysqli_fetch_array($uniqueRecord)){

                                    echo "
                                    <thead class='address'>
                            <tr>
                                <td>Order ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Address</td>
                                <td>City</td>
                                <td>Postal</td>
                                <td>Total</td>
                                <td>Status</td>
                                <td>Remove</td>
                            </tr>
                        </thead>
                        <tbody>
                                    <tr>
                                        <td>$row[order_id]</td>
                                        <td>$row[name]</td>
                                        <td>$row[email]</td>
                                        <td>$row[address]</td>
                                        <td>$row[city]</td>
                                        <td>$row[postal]</td>
                                        <td>$row[pro_gtotal]</td>
                                        <td>
                                            <form action='includes/change_status.php?id=$row[order_id]' method='POST'>    
                                                <select name='status' class='status' onchange='this.form.submit()'>
                                                    <option value=''>$row[status]</option>
                                                    <option value='Pending'>Pending</option>
                                                    <option value='Delivered'>Delivered</option>
                                                    <option value='Inprogress'>Inprogress</option>
                                                    <option value='Return'>Return</option>
                                                </select>
                                            </form>
                                        </td>
                                        <form action='includes/change_status.php?id=$row[order_id]' method='POST'>
                                            <td>
                                                <input value='Remove' name='remove' type='submit' class='btn-remove'>
                                            </td>
                                        </form>
                                    </tr>";
                                    
                                    
                                    echo "
                                    <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Size</th>
                                        <th>Product Quantity</th>
                                        <th>Product Subtotal</th>
                                    </tr>
                                    </thead>";
                                    $allRecord = mysqli_query($conn, "SELECT * FROM `orders` WHERE `order_id` = '$row[order_id]' ORDER BY `id` DESC");
                                    while($row2 = mysqli_fetch_array($allRecord)){
                                        echo "
                                        <tr>
                                            <td><img src='$row2[pro_image]' width='70px'></td>
                                            <td>$row2[pro_name]</td>
                                            <td>$row2[pro_price]</td>
                                            <td>$row2[pro_size]</td>
                                            <td>$row2[pro_quantity]</td>
                                            <td>$row2[pro_subtotal]</td>
                                        </tr>
                                        </tbody>
                                        ";
                                    }
                                }
                        ?>
                        
                    </table>

                </div>

            </div> 
      