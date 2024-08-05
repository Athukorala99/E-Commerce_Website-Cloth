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
                        <h2>All Users</h2>
                    </div>
                    <table>
                        
                        <?php

                                $query = mysqli_query($conn, "SELECT * FROM `users` ORDER BY `id` DESC");

                                while($row = mysqli_fetch_array($query)){

                                    echo "
                                    <thead class='address'>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Password</td>
                                <td>Remove</td>
                            </tr>
                        </thead>
                        <tbody>
                                    <tr>
                                        <td>$row[name]</td>
                                        <td>$row[email]</td>
                                        <td>$row[password]</td>
                                        <form action='?id=$row[id]' method='POST'>
                                        <td><input value='$row[email]' name='email' type='hidden'>
                                        <input value='Remove' name='remove' type='submit' class='btn-remove'></td>
                                        </form>
                                    </tr>
                                    </tbody>";    
                                }
                                if(isset($_POST['remove'])){
                                    $id = $_GET['id'];
                                    $email = $_POST['email'];
                                    $deleting = mysqli_query($conn, "DELETE FROM `users` WHERE id = $id");
                                    if($deleting){
                                        // header("location:users.php");
                                        echo "<script>window.location.href='users.php'; alert('Account has been deleted of email: $email');</script>";
                                    }
                                    else{
                                        header("location:users.php");
                                    }
                                }
                        ?>
                    </table>
                </div>
            </div>
      