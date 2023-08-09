<?php
    require_once("../main/db.php");

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass5 = md5($pass);
    $number = $_POST['number'];
    $name = $_POST['name'];
    $pattern = "/[-\s:\@]/";
    $name_a = preg_split($pattern, $email);
    $query = "INSERT INTO user_detail (Name, Number, Password, Email, Table_name) VALUES ('$name', '$number', '$pass5', '$email', '$name_a[0]')";
    $result = mysqli_query($con, $query);
    if ($result){
        $create_table = "CREATE TABLE IF NOT EXISTS doc_user.$name_a[0](ID INT NOT NULL AUTO_INCREMENT,
        Photos VARCHAR(100) NULL , 
        PDF VARCHAR(100) NULL,
        PRIMARY KEY(ID))" or die("error");
        $check = mysqli_query($con, $create_table) or die("error: $create_table");
        header("location: ../login.php?error=0");
    }else{
        header("locaton: ../sign_up.php?error=1");
    }
?>