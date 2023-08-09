
<?php

    require_once("./db.php");

    $user_query = $_GET['q'];
    $query = "SELECT city_ascii, country FROM cities WHERE city_ascii LIKE '".$user_query."%'";;
    $result = mysqli_query($con, $query) or die("error =>".$query);
    $data = mysqli_fetch_all($result);
    $json_data = json_encode($data);
    echo $json_data;

?>