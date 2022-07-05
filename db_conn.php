<?php 
    $sname = "localhost";
    $unmae = "root";
    $password = "kdais@123";

    $db_name = "agri";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);

    if (!$conn) {
        echo "Connectin Failed!";
        exit();
    }
?>