
<?php 
    session_start();
    session_unset();
    session_cache_expire();
    session_destroy();
    if (!isset($_SESSION["auth"])) {
        header("location: ../home.php");
    }

?>