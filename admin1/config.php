<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "webbanhang1";
    $conn = mysqli_connect($server, $user, $pass, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>