<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="statics/home.css" type="text/CSS">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Rocket Travels - Register</title>
    <link rel="shortcut icon" href="./statics/logo.jpg" type="image/x-icon">
</head>

<body>

    <center>

        <div class="form">
            <form method="POST" action="./backend/register.php">
                <table>
                    <?php
                    if (isset($_GET)) {
                        $error = intval($_GET['error']);
                    } else {
                        $error = 0;
                    }
                    if ($error === 1) {
                        echo "<div><h4 style='color: #ee3333; font-size: 18px; width: auto; height: auto; background-color: burlywood;'><i class='fas fa-error'></i>Email or Mobile Number is already registered with another account</h4>
                        </div>";
                    }
                    ?>
                    <th colspan="2">Sign Up</th>
                    <tr>
                        <td><label for="name">Name</label></td>
                        <td><input type="text" name="name" class="input_field" placeholder="Name" minlength="6" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" class="input_field" placeholder="Email" required></td>
                    </tr>
                    <tr>
                        <td><label for="number">Number</label></td>
                        <td><input type="text" name="number" class="input_field" placeholder="Number" minlength="10" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td><label for="passwd">Password</label></td>
                        <td><input type="password" name="passwd" class="input_field" placeholder="Password" minlength="6" required></td>
                    </tr>
                </table>
                <input type="submit" value="Sign Up">
            </form>
            <br>
            <p style="color: rgb(45, 45, 45); font-weight: 600;">OR</p>
            <br>
            <a href="./signin.php?error=0&user=" style="color: red;">
                <h3 style="margin-top: 5px; color: white;">Already have an account.</h3>
            </a>
        </div>
    </center>

</body>

</html>