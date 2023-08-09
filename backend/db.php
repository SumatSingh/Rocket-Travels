
<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Methods: POST, OPTIONS");
 $db_host = "localhost";
 $db_uname = "root";
 $db_pass = "7180";
 $db_name = "travelsystem";
 $con = mysqli_connect("$db_host", "$db_uname", "$db_pass", "$db_name");
 

?>