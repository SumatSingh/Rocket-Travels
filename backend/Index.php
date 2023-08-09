
<?php
if (!isset($_SESSION["auth"])) {
        header("location: ../home.php");
    }
else{
    header("location: ../main.php");
}

?>