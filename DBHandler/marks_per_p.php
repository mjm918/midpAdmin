<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 11/02/2017
 * Time: 16:01
 */
include "config.php";
if(isset($_POST['submit'])){
    $content = $_POST['comment'];

    $query = mysqli_query($dbconfig,"update policy set description='$content' where name='marks'");

    if($query){
        header('location:../setup.php');
    }else{
        echo 'Try again';
    }
}
?>