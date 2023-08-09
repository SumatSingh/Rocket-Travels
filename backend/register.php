
<?php

    require_once("./db.php");

    $email = $_POST['email'];
    $pass = $_POST['passwd'];
    $pass5 = md5($pass);
    $number = $_POST['number'];
    $name = $_POST['name'];
    $pattern = "/[-\s:\@]/";
    $name_a = preg_split($pattern, $email);
    $query = "SELECT mail FROM users WHERE mail LIKE '$email' OR number LIKE '$number'";
    $result = mysqli_query($con, $query) or die("error: $query");
    $data = mysqli_fetch_array($result);
    if ($data[0] != null){
        header("location: ../signup.php?error=1");
    }
    else{
        $query = "INSERT INTO users (name, number, passwd, mail, usertable) VALUES ('$name', '$number', '$pass5', '$email', '$name_a[0]')";
        $result = mysqli_query($con, $query) or die("error");
        if ($result){
            $create_table = "CREATE TABLE IF NOT EXISTS `travelsystem`.`$name_a[0]` ( 
                `start_from` VARCHAR(200) NOT NULL , 
                `end_to` VARCHAR(200) NOT NULL , 
                `booking_date` DATE NOT NULL , 
                `journey_date` DATE NOT NULL
                )";
            $check = mysqli_query($con, $create_table);
            echo $check;
            header("location: ../signin.php?error=0&user=");
        }else{
            header("locaton: ../signup.php?error=1");
        }
    }
?>