<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 16:30
 */
include "../DBHandler/config.php";
if(isset($_GET['email'])){
    $email = $_GET['email'];
    $theory = mysqli_query($dbconfig,"select email, sum(marks) as total_marks from theoryanswer where email= '$email'");
    if($theory){
        $r = $theory->fetch_assoc();
        $t_theory = $r['total_marks'];
        $mcq = mysqli_query($dbconfig,"select email, sum(marks) as tot_marks from mcq_answers where email= '$email'");
        if($mcq){
            $m = $mcq->fetch_assoc();
            $m_mcq = $m['tot_marks'];

            $success = mysqli_query($dbconfig,"update record set mcq='$m_mcq', theory='$t_theory',validate='1' where email='$email'");
            if($success){
                echo 'working';
                header('location:../viewUser.php?email='.$email);
            }else{
                echo 'not working';
                echo 'try again';
            }
        }
    }
}