<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 12:06
 */
include "config.php";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $status = $_POST['optradio'];

    if($status == "Premium"){
        $res = "1";
    }else{
        $res = "0";
    }
    $query = mysqli_query($dbconfig,"update premium set status_p='$res' where email = '$email'");

    if($query){
        $notify = "Successfully changed";
        header('location:../manageUsers.php?notify='.$notify);
    }else{
        echo 'Try again';
    }
}
?>