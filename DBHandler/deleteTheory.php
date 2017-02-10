<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 00:40
 */
include "config.php";
if(isset($_GET['delete'])){
    $delete = $_GET['delete'];

    $query = mysqli_query($dbconfig,"delete from theoryquestion where id = '$delete'");

    if($query){
        header('location:../manageQuestion.php');
    }else{
        echo 'Go back and Try again';
    }
}
?>