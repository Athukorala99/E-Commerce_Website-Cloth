

    <?php

    $server = "localhost";

    $username = "root";

    $password = "";

    $database = "glowvibe";


    $conn = mysqli_connect($server,$username,$password,$database);



    if($conn){

        

    }

    else{


        echo "<script>alert('Connection Failed!');</script>";

    }

    ?>