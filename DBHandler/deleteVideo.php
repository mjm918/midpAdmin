<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 11/02/2017
 * Time: 11:52
 */
include "config.php";
if(isset($_POST['submit'])){
    $id = $_POST['id'];

    $query = mysqli_query($dbconfig,"delete from video where id='$id'");
    if($query){
        header('location:../upload.php');
    }else{
        echo 'try again';
    }
}
?>