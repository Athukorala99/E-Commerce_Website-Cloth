

    <?php

    $server = "localhost";

    $username = "root";

    $password = "";

    $database = "glowvibe";



    $conn = mysqli_connect($server,$username,$password,$database);



    if($conn){

        // echo "Connection successful";

        // echo "<script>alert('Successfully Connected!');</script>";

    }

    else{

        // echo "Connection failed".mysqli_connect_error();

        echo "<script>alert('Connection Failed!');</script>";

    }

    ?>