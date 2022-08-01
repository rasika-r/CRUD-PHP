<?php

    $conn = mysqli_connect("localhost", "root", "", "database");

    if(!$conn){
        die("Can't connect to database" . mysqli_connect_error());
    }

?>