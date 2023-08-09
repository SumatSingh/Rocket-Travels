
<?php
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $number = $_POST['number'];

    if ($email === "rbmorena42@gmail.com" && $pass === "Ravindra@810" && $number === "8109832799"){
        ini_set( "session.gc_maxlifetime", 300 );
        ini_set( "session.cookie_lifetime", 300 );
        session_start();
        $_SESSION["auth"] = TRUE;
        header("location: ../main/Timeline/admin_home.php");
    }
    else{
        header("location: ../admin_login.php?error=1");
    }
?>

