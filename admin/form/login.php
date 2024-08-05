<?php

session_start();

include '../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminName = $_POST['name'];
    $adminPassword = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE name='$adminName' AND password='$adminPassword'");

    if(mysqli_num_rows($result)){
        $_SESSION['admin'] = $adminName;
        echo "<script>alert('Login Successfully'); window.location.href= '../index.php'</script> ";
    } else {
        echo "<script>alert('Username or Password Incorrect');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/jpg" href="../images/favicon.jpg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        ::selection {
            background-color: #088178;
            color: #C0E4E3;
        }

        body {
            overflow: hidden;
            background-image: radial-gradient(white, rgb(160, 160, 160));
            background-repeat: no-repeat;
            height: 100vh;
        }

        h2 {
            text-align: center;
            font-size: 40px;
            font-weight: 800;
            color: #088178;
        }

        form {
            display: flex;
            flex-direction: column;
            background-color: #C0E4E3;
            width: 500px;
            max-width: 90vw;
            margin: 10vh auto;
            box-shadow: 3px 3px 10px rgb(73, 73, 73);
        }

        form .fields {
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        form .fields label {
            font-size: 20px;
            font-weight: 600;
            color: #088178;
            margin-bottom: 5px;
        }

        form .fields input {
            border: none;
            outline: none;
            font-size: 18px;
            padding: 5px;
            margin-bottom: 20px;
        }

        .modal-btns {
            margin: auto;
            margin-bottom: 15px;
        }

        .modal-btns input {
            font-size: 20px;
            padding: 3px 10px;
            max-width: 60vw;
            letter-spacing: 1px;
            width: 20rem;
            color: #c0e4e3;
            background-color: #088178;
            border-radius: 3px;
            border: 2px solid transparent;
            transition: 0.3s ease;
        }

        .modal-btns input:hover {
            color: #088178;
            background-color: transparent;
            border: 2px solid #088178;
        }

        p {
            text-align: center;
            color: #088178;
            margin-bottom: 10px;
        }

        p a {
            text-decoration: none;
            color: #088178;
            font-weight: 700;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h2>Login</h2>
        <div class="fields">
            <label>Username:</label>
            <input type="text" name="name" placeholder="Enter Your Username" autocomplete="off" required>
            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter Your Password" required>
        </div>
        <div class="modal-btns">
            <input type="submit" name="signup" value="Login">
        </div>
        <p>Login to Admin panel or go to website: <a href="../../index.php">GlowVibe</a></p>
    </form>

</body>

</html>
