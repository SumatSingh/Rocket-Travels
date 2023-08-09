
<?php
    ini_set( "session.gc_maxlifetime", 300 );
    ini_set( "session.cookie_lifetime", 300 );
    session_start();
    if (isset($_SESSION["auth"])) {
        header("location: ../home.php?error=0");
    }
    require_once("./db.php");

    $email = $_POST['email'];
    $pass = $_POST['passwd'];
    $pass5 = md5($pass);
    $query = "SELECT * FROM users WHERE mail LIKE '$email' && passwd LIKE '$pass5'";
    $result = mysqli_query($con, $query) or die("error: $query");
    $data = mysqli_fetch_array($result);
    if ($data[4] === $pass5 && $data[2]= $email){
        $_SESSION["auth"] = TRUE;
        $_SESSION['user_id'] = $data[0];
        $_SESSION['user_name'] = $data[1];
        $_SESSION['email'] = $data[2];
        $_SESSION['number'] = $data[3];
        $_SESSION['pass'] = $data[4];
        $_SESSION['table_name'] = $data[5];
        
        if ($_GET['b_name'] != null || $_GET['b_name'] != ""){
            header("location: ../b_booking.php?b_name=".$_GET['b_name']."&b_num=".$_GET["b_num"]."&b_class=".$_GET['b_class']."&b_day=".$_GET['b_day']."&city_from=".$_GET['city_from']."&city_to=".$_GET['city_to']);
        }else{
            header("location: ../main.php");
        }
    }else{
        header("location: ../signin.php?error=1&user=$email");
    }
?>