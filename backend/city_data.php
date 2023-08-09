<?php 

    session_start();
    $s_from = $_POST['s-from'];
    $s_to = $_POST['s-to'];
    $_SESSION['s_city'] = $s_from;
    $_SESSION['e_city'] = $s_to;
    header('location: ../signin.php?error=0&user=');

?>