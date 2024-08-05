<?php

    include 'includes/navbar.php';

    session_start();


    if(!$_SESSION['admin']){

        header("location: form/login.php");

    }
    include ("includes/connection.php");

    $details = mysqli_query($conn,"SELECT * FROM `admin`");
    $row = mysqli_fetch_array($details);

    if(isset($_POST['adminUpdate'])){
        $id = $_POST['id'];
        $name = $_POST['userName'];
        $password = $_POST['password'];

        $query = mysqli_query($conn,"UPDATE `admin` SET `name`='$name',`password`='$password' WHERE `id`='$id'");

        if($query){
            echo "<script>window.location.href='account.php'; alert('Admin account updated!');</script>";
        }
        else{
            echo "<script>window.location.href='account.php'; alert('cant update right now');</script>";
        }
    }
?>

            <div class="details orders">
                <div class="recentOrders">
                    <h2 style="text-align: center;">Admin account settings</h2>
                    <form action="" method="POST" class="accountSettings">
                        <label for="">User Name:</label>
                        <input type="text" name="userName" value="<?php echo $row['name'] ?>">
                        <label for="">Password:</label>
                        <input type="text" name="password" autocomplete="off" value="<?php echo $row['password'] ?>">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <input type="submit" name="adminUpdate" value="Update">
                    </form>
                </div>
            </div>
       