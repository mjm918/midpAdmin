<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 07/02/2017
 * Time: 09:47
 */
?>
<!DOCTYPE html>
<html>
<head>
    <style>

        body {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #326eaf;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: white;
            display: block;
            transition: 0.3s
        }

        .sidenav a:hover, .offcanvas a:focus{
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

        .kc_fab_main_btn{
            position: fixed; bottom: 0px; right: 0px;
            margin-bottom: 80px;
            margin-right: 30px;
            background-color: #326eaf;
            width:60px;
            height:60px;
            border-radius:100%;
            background:#326eaf;
            border:none;
            outline:none;
            color:#FFF;
            font-size:36px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
            transition:.3s;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
        }
        .kc_fab_main_btn:focus {
            transform:scale(1.1);
            transform:rotate(45deg);
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);

        }
    </style>
</head>
<body>

<div id="mySidenav" class="sidenav">
    <a style="text-decoration: none" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="allUsers.php">All users</a>
    <a href="#">Manage users and Admin</a>
    <a href="#">Check paper</a>
    <a href="manageQuestion.php">Manage question</a>
    <a href="#">Upload videos</a>
    <a href="#">Setup site</a>
</div>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()"><button id="btn_hide" class="kc_fab_main_btn">+</button></span>
</div>

<script>
    function openNav() {
        document.getElementById("btn_hide").style.display = "none";
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("btn_hide").style.display="";
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
    }
</script>

</body>
</html>

