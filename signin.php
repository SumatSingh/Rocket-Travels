<?php

session_start();
if (isset($_SESSION["auth"])) {
    header("location: ./main.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="statics/home.css" type="text/CSS">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="shortcut icon" href="./statics/logo.jpg" type="image/x-icon">
    <title>Rocket Travels - Login</title>
</head>

<body>

    <center>
        <div class="form">
            <form method="POST" 
            action='<?php if (isset($_GET['b_name'])) {
                                            $b_name = $_GET['b_name']; $b_num = $_GET["b_num"]; $b_class = $_GET["b_class"]; $b_day = $_GET["b_day"]; $city_from =
                                            $_GET["city_from"]; $city_to = $_GET["city_to"];
                                            echo "./backend/login_be.php?b_name=$b_name&b_num=$b_num&b_class=$b_class&b_day=$b_day&city_from=$city_from&city_to=$city_to";
                                        } else {
                                            echo "./backend/login_be.php?b_name=";
                                        } ?>'>
                <?php
                if (isset($_GET)) {
                    $error = intval($_GET['error']);
                } else {
                    $error = 0;
                }
                if ($error === 1) {
                    echo "<div ><h4 style='color: #ee3333; font-size: 18px; width: auto; height: auto; background-color: burlywood;'>Email or Password is incorrect.</h4></div>";
                }
                ?>
                <table>
                    <th colspan="2">Sign In</th>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" class="input_field" placeholder="Email" required value="
                        <?php if (isset($_GET)) {echo $_GET["user"];} ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="passwd">Password</label></td>
                        <td><input type="password" name="passwd" class="input_field" placeholder="Password" minlength="6" required></td>
                    </tr>
                </table>
                <input type="submit" value="Sign In">
            </form>
            <br>
            <p style="color: rgb(45, 45, 45); font-weight: 600;">OR</p>
            <br>
            <a href="./signup.php?error=0" style="color: red;">
                <h3 style="margin-top: 5px; color: white;">Don't have an account.</h3>
            </a>
        </div>
    </center>

</body>

</html>