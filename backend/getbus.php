<?php

    require_once("./db.php");

    $query = "SELECT * FROM bus_details";
    $result = mysqli_query($con, $query) or die("error =>".$query);
    $data = mysqli_fetch_all($result);
    $json_data = json_encode($data);
    echo $json_data;
?>