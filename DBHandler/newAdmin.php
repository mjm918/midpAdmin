<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 11:56
 */
include "config.php";
if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $pass = $_POST['pass'];

    $hash = hash('sha256',$pass);

    $query = mysqli_query($dbconfig,"insert into admin (id,username,pass) VALUES (NULL,'$name','$hash')");

    if($query){
        $msg = "Successfully assigned new admin";
        header('location:../manageUsers.php?msg='.$msg);
    }else{
        echo 'try again';
    }
}
?>