<?php
include 'connection.php';
                if(isset($_POST['status'])){
                    $status = $_POST['status'];
                    $id = $_GET['id'];

                    $query = mysqli_query($conn,"UPDATE `orders` SET `status`='$status' WHERE `order_id` = '$id'");

                    if($query){
                        echo "<script>window.location.href= '../orders.php'; alert('Status has been changed of Order ID $id');</script>";
                    }
                    else{
                        echo "<script>window.location.href= '../orders.php'; alert('Something went wrong');</script>";
                    }
                }

                if(isset($_POST['remove'])){
                    $orderId = $_GET['id'];
                    $deleting = mysqli_query($conn, "DELETE FROM `orders` WHERE `order_id` = '$orderId'");
                    if($deleting){
                        // header("location:users.php");
                        echo "<script>window.location.href='../orders.php'; alert('Order has been Removed of order Id: $orderId');</script>";
                    }
                    else{
                        header("location:../orders.php");
                    }
                }
            ?>