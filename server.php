<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kawinlogin";
    
    // Create Connection and Check
    $link = mysqli_connect($servername, $username, $password, $dbname) or die('Unable To connect' . mysqli_connect_error()); 
?>