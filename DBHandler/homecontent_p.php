<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 11/02/2017
 * Time: 15:48
 */
include "config.php";
if(isset($_POST['submit'])){
    $content = htmlspecialchars($_POST['comment']);

    $query = mysqli_query($dbconfig,"update policy set description='$content' where name='home'");

    if($query){
        header('location:../setup.php');
    }else{
        echo 'Try again';
    }
}
?>