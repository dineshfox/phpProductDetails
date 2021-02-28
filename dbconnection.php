<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "productdb";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }else {
            // echo ("db connected");
        }

?>