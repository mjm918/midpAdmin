<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 09/02/2017
 * Time: 21:33
 */
include "config.php";
if(isset($_GET['delete'])){
    $delete = $_GET['delete'];

    $query = mysqli_query($dbconfig,"delete from mcq where id = '$delete'");

    if($query){
        header('location:../manageQuestion.php');
    }else{
        echo 'Go back and Try again';
    }
}
?>