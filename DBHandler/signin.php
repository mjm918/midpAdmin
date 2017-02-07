<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 07/02/2017
 * Time: 04:00
 */
include ("config.php");
session_start();

$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST['in_lemail'];
    $pass = $_POST['in_lpass'];
    $stripusername = stripslashes($user);
    $strippassword = stripslashes($pass);

    $username = mysqli_real_escape_string($dbconfig,$stripusername);
    $password = mysqli_real_escape_string($dbconfig,$strippassword);

    $hash = hash('sha256',$password);

    try{
        $query = mysqli_query($dbconfig,"select * from admin where username='$username' and pass='$hash'");
        if(mysqli_num_rows($query)>0){
            header('location:../home.php');
        }
    }catch (mysqli_sql_exception $e){
        throw $e;
    }
}
?>