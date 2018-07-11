<?php

    $servername = "localhost:8889";
    $username = "root";
    $password = "root";
    $dbname = "studentDB";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        //display a message to explain why failed to connect
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully!";
?>

