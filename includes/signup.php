<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if ($password != $cpassword) {
            $_SESSION['passError'] = "Passwords not matched!";
            header("Location: register.php");
            exit();
        } else {
            $dupEmail = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");

            if (mysqli_num_rows($dupEmail) > 0) {
                $_SESSION['dupEmail'] = "You cannot create more than one account with the same email";
                header("Location: signup.php");
                exit();
            } else {
                $query = "INSERT INTO `users`(`name`, `email`, `password`, `confirm`) VALUES ('$name', '$email', '$password', '$cpassword')";
                $run = mysqli_query($conn, $query);

                if ($run) {
                    $_SESSION['signup'] = "Account Created Successfully!";
                    header("Location: login.php");
                    exit();
                } else {
                    echo "<script>alert('Sorry! We are facing some issues, please sign up later');</script>";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #141e30, #243b55);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        } 
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="" method="POST">
            <?php if(isset($_SESSION['passError'])) { ?>
                <p style="color: red;"><?php echo $_SESSION['passError']; ?></p>
                <?php unset($_SESSION['passError']); ?>
            <?php } ?>
            <?php if(isset($_SESSION['dupEmail'])) { ?>
                <p style="color: red;"><?php echo $_SESSION['dupEmail']; ?></p>
                <?php unset($_SESSION['dupEmail']); ?>
            <?php } ?>
            <label for="name">Username:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="cpassword">Confirm Password:</label>
            <input type="password" id="cpassword" name="cpassword" required>
            <button type="submit" name="signup">Register</button>
        </form>
    </div>
</body>
</html>
