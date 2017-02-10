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

    $check = mysqli_query($dbconfig,"select * from admin where username='$name'");

    if(mysqli_num_rows($check) > 0){
        $msg = "Username already exist";
        header('location:../manageUsers.php?msg='.$msg);
    }else{
        $hash = hash('sha256',$pass);

        $query = mysqli_query($dbconfig,"insert into admin (id,username,pass) VALUES (NULL,'$name','$hash')");

        if($query){
            $msg = "Successfully assigned new admin";
            header('location:../manageUsers.php?msg='.$msg);
        }else{
            echo 'try again';
        }
    }
}
?>