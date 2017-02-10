<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 12:14
 */
include "config.php";
if(isset($_POST['submit'])){
    $email = $_POST['email'];

    $check = mysqli_query($dbconfig,"select * from premium where email='$email'");

    if(mysqli_num_rows($check) == 0){
        $query = mysqli_query($dbconfig,"delete from admin where username = '$email'");

        if($query){
            header('location:../manageUsers.php');
        }else{
            echo 'try again';
        }
    }else{
        $query = mysqli_query($dbconfig,"delete from premium where email = '$email'");

        if($query){
            header('location:../manageUsers.php');
        }else{
            echo 'try again';
        }
    }
}
?>