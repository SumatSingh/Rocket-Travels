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
  <title>Rocket Travels</title>
</head>

<body id="body" class="down">

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
            <li><a class="menu-hover" href="./signin.php?error=0&user=">Sign In</a>
            </li>
            <li><a class="menu-hover" href="./signup.php?error=0">Sign Up</a>
            </li>
            <li><a class="menu-hover" href="./photos.php">Gallery</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <center>
    <div class="search-container">
      <div class="search-box">
        <input class="search-input" type="search" id="city_from" name="s-from" placeholder="From" onkeyup="showHint1(this.value)" onkeydown="showHint1(this.value)">
        <i class="fas fa-exchange-alt" onclick="swapvalue()"></i>
        <input class="search-input" type="search" id="city_to" name="s-to" placeholder="To" onkeyup="showHint2(this.value)" onkeydown="showHint2(this.value)"><br>
        <button class="search-btn" onclick="getbus()">Search</button>
      </div>
      <div id="city_list">
      </div>
    </div>
  </center>
</body>
<script>
  function showHint1(str) {
    if (str.length == 0) {
      document.getElementById("").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var data = this.responseText;
          var data_arr = JSON.parse(data);
          var html_data = "";
          data_arr.forEach((city, index, array) => {
            html_data += "<h4 class='csc' onclick='go_from(this.id)' id='" + index + "' style='cursor: pointer;'>" + city + "</h4>";
          })
          document.getElementById("city_list").innerHTML = html_data;
        }
      };
      xmlhttp.open("GET", "./backend/city_list.php?q=" + str, true);
      xmlhttp.send();
    }
  }

  function go_from(str) {
    window.scrollTo({
      top: 10,
      behavior: 'smooth'
    });
    city_name = document.getElementById(str).innerHTML;
    document.getElementById("city_from").value = city_name;
  }


  function sendBusData(str) {
    var bus_Class = document.getElementById(str).innerHTML;
    bus_Class = bus_Class.split(">");
    bus_Class = bus_Class[1].split("<");
    str = str.split("_");
    var html_data = document.getElementById(str[0]).innerHTML;
    var row_data = html_data.split(">");
    row_data[2] = row_data[2].split("<");
    row_data[7] = row_data[7].split("<");
    var bus_num = row_data[4].split(")");
    bus_num = bus_num[0].split("(");
    var city_from = document.getElementById("city_from").value;
    var city_to = document.getElementById("city_to").value;

    window.location.assign("./signin.php?b_name=" + row_data[2][0] + "&b_num=" + bus_num[1] + "&b_class=" + bus_Class[0] + "&b_day=" + row_data[7][0] + "&city_from="+ city_from + "&city_to=" + city_to + "&error=0&user=");
  }


  function getbus() {
    if (document.getElementById("city_from").value.length >= 5 && document.getElementById("city_to").value.length >= 5 || document.getElementById("city_from").value != document.getElementById("city_to").value) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          alpha = "ABCDEFGHIJKLMNOPQRSTUVXYZ";
          day = ["Today", "Tomorrow"];
          var data = this.responseText;
          var data_arr = JSON.parse(data);
          var html_data = "";
          data_arr.forEach((value, index, array) => {
            var bus_numbers = "MP" + String(Math.floor((Math.random() * 50) + 04)) + "-" + alpha[Math.floor((Math.random() * 25))] + alpha[Math.floor((Math.random() * 25))] + "-" + String(Math.floor((Math.random() * 9999) + 1000));
            var rand = Math.floor((Math.random() * data_arr.length));
            html_data += "<div class='bus-tile'><div class='bus-name-time' id='" + index + "'><div class='bus-name'><h3>" + data_arr[rand][1] + "</h3><h5>&nbsp;(" + bus_numbers + ")</h5></div><h4>" + day[Math.floor((Math.random() * 2))] + "</h4></div><div class='fair-div'><div class='fair' onclick='sendBusData(this.id)' id='" + index + "_e'><p>Economy Class</p></div><div class='fair' onclick='sendBusData(this.id)' id='" + index + "_s'><p>Sleeper Class</p></div><div class='fair' onclick='sendBusData(this.id)' id='" + index + "_sa'><p>Second AC Class</p></div><div class='fair' onclick='sendBusData(this.id)' id='" + index + "_fa'><p>First AC Class</p></div></div></div><br>";
          });
          document.getElementById("city_list").innerHTML = html_data;
        }
      };
      xmlhttp.open("GET", "./backend/getbus.php", true);
      xmlhttp.send();
    } else {
      document.getElementById("city_list").innerHTML = "";
    }
  }


  function showHint2(str) {
    if (str.length == 0) {
      document.getElementById("").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var data = this.responseText;
          var data_arr = JSON.parse(data);
          var html_data = "";
          data_arr.forEach((value, index, array) => {
            html_data += "<h4 class='csc' onclick='go_to(this.id)' id='" + index + "' style='cursor: pointer;'>" + value + "</h4>";
          })
          document.getElementById("city_list").innerHTML = html_data;
        }
      };
      xmlhttp.open("GET", "./backend/city_list.php?q=" + str, true);
      xmlhttp.send();
    }
  }

  function go_to(str) {
    window.scrollTo({
      top: 10,
      behavior: 'smooth'
    });
    var city_name = document.getElementById(str).innerHTML;
    document.getElementById("city_to").value = city_name;
  }

  var scrollPos = 0;
  // adding scroll event
  window.addEventListener('scroll', function() {
    if ((document.body.getBoundingClientRect()).top > scrollPos)
      document.getElementById("body").className = "up";
    else
      document.getElementById('body').className = "down";
    scrollPos = (document.body.getBoundingClientRect()).top;
  });

  function swapvalue() {
    var strvalue = document.getElementById("city_from").value;
    document.getElementById("city_from").value = document.getElementById("city_to").value;
    document.getElementById("city_to").value = strvalue;
  }
</script>


</html>