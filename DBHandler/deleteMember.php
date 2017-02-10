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

    $query = mysqli_query($dbconfig,"delete from premium where email = '$email'");

    if($query){
        header('location:../manageUsers.php');
    }else{
        echo 'try again';
    }
}
?>