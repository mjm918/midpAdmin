<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 07/02/2017
 * Time: 04:08
 */
include ('DBHandler/config.php');
session_start();
$user = $_SESSION['username'];
if($_SESSION['username'] == ""){
    header('location:index.php');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="Assets/midp.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">

    </script>

</head>
<body>
<nav style="background-color: #161719" class="navbar navbar-inverse">
    <div class="container-fluid">
        <div id="header" class="navbar-header">
            <div class="headerProfile-font">
                <img src="./Assets/midp.png" width="40px" height="50px" alt="">
                Midp Admin Panel
            </div>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li style=""><a href="#"><span class="glyphicon glyphicon-knight"></span>Welcome <b style="color: white"><?php echo $user;?></b></a></li>
            <li style=""><a href="home.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
            <li><a href="./DBHandler/logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
        </ul>
    </div>
</nav>
</body>
</html>

