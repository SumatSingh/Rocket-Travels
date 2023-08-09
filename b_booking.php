<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header(" location: ./signin.php?error=0&user=");
}

$b_name = $_GET['b_name'];
$b_num = $_GET['b_num'];
$b_day = $_GET['b_day'];
$b_class = $_GET['b_class'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['b_name']; ?> - Book Tour Ticket</title>
    <link rel="stylesheet" href="./statics/home.css" type="text/CSS" />
    <link rel="stylesheet" href="./statics/b_box.css" type="text/CSS" />
    <link rel="shortcut icon" href="./statics/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body onload="setdate();empty_sheet()">

    <nav>
        <div class="container">
            <div class="menu-par">
                <div class="logo-par">
                    <a href="#">
                        <h2>Rocket Travels</h2>
                    </a>
                </div>
                <div class="nav">
                    <ul>
                        <li><a class="menu-hover" href="index.php">Home</a>
                        </li>
                        <li><a class="menu-hover" href="./booking_details.php">Bookings</a>
                        </li>
                        <li><a class="menu-hover" href="./photos.php">Gallery</a>
                        </li>
                        <li><a class="menu-hover" href="./backend/logout.php">Logout</a>
                        </li>
                        <li><a class="menu-hover" href="#">Mr. <?php echo $_SESSION["user_name"] ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="bus-box">
        <div class="bus-detail-view">
            <input type="text" value="<?php echo $_GET['city_from'] ?>" id="city_from" readonly=true>
            <i class="fas fa-exchange-alt"></i>
            <input type="text" value="<?php echo $_GET['city_to'] ?>" id="city_to" readonly=true>
            <input type="date" name="travel-date" id="b_date" value="<?php echo $_GET['b_day'] ?>" readonly=true>
        </div>
    </div>
    <div class="b-details">
        <h3><?php echo $_GET['b_name'] ?></h3>
        <h5><?php $num = $_GET['b_num']; echo "($num)" ?></h5>
    </div>
    <div class="bus-view">
        <div class="driver-side">
            <img src="./statics/steering.png" alt="Steering Image">
        </div>
        <div class="sheet-view">
            <div class="sheet-row">
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="1"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="2"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="3"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="4"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="5"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="6"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="7"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="8"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="9"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="10"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="11"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="12"></i>
            </div>
            <div class="sheet-row">
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="13"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="14"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="15"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="16"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="17"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="18"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="19"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="20"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="21"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="22"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="23"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="24"></i>
            </div>
            <div class="sheet-col">
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="25"></i>
            </div>
            <div class="sheet-row">
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="26"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="27"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="28"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="29"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="30"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="31"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="32"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="33"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="34"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="35"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="36"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="37"></i>
            </div>
            <div class="sheet-row">
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="38"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="39"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="40"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="41"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="42"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="43"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="44"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="45"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="46"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="47"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="48"></i>
                <i class="fas fa-couch sheet-fill" onclick="select_sheet(this.id); add_sheet(this.id)" id="49"></i>
            </div>
            <div class="btn">
                <button>Done</button>
            </div>
        </div>
    </div>
</body>

<script>
    function setdate() {
        var b_date = "<?php echo $_GET['b_day'] ?>";
        var today = new Date();
        if (b_date === "Today") {
            document.getElementById('b_date').value = today.getFullYear().toString() + "-" + (today.getMonth() + 1).toString() + "-" + today.getDate().toString();
        } else if (b_date === "Tomorrow") {
            document.getElementById('b_date').value = today.getFullYear().toString() + "-" + (today.getMonth() + 1).toString() + "-" + (today.getDate() + 1).toString();

        }
    }

    function empty_sheet(){
        for (var i = 0; i <= 49; i++){
            document.getElementById(Math.floor(Math.random() * 49).toString()).className = "fas fa-couch sheet-empty";
        }
    }

    function select_sheet(str){
        var class_name = document.getElementById(str).className;
        class_name = class_name.split(" ");
        if(class_name[2] === "sheet-empty"){
            document.getElementById(str).className = "fas fa-couch sheet-selected";
        }else{
            document.getElementById(str).className = "fas fa-couch sheet-empty";
        }
    }

    var sheetList = [];
    function add_sheet(str){
        var add = false, count, item;
        if (sheetList.length === 0){
            sheetList.push(str);
        }else{
            sheetList.forEach((value, index, array) => {
                if (value !== str){
                    add = true
                }else{
                    add = false;
                    count = index;
                    item = value;
                }
            });
        }
        console.log(count, add);
        if(add)
            sheetList.push(str);
        else
            sheetList.slice(count, item);    ;    

        sheetList = sheetList.filter((value, index) => {
            return sheetList.indexOf(value) == index;   
        });
        console.log(sheetList);
    }
</script>

</html>