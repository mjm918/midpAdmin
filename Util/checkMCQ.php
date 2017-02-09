<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 09/02/2017
 * Time: 01:09
 */
include "../DBHandler/config.php";
session_start();
if(isset($_POST["submit"])){
    $email = $_POST['email'];

    $wrong = array();
    $correct = array();

    $query = mysqli_query($dbconfig,"select * from mcq_answers where email='$email'");
    while ($row=mysqli_fetch_array($query)){
        $ques = $row['question'];
        $ans = $row['answer'];
        $sql = mysqli_query($dbconfig,"select * from mcq where question='$ques' and ans='$ans'");
        if(mysqli_num_rows($sql) == 0){
            $getCorrect = mysqli_query($dbconfig,"select ans from mcq where question='$ques'");
            $res = $getCorrect->fetch_assoc();
            $newAns = $res['ans'];
            $wr_sql = mysqli_query($dbconfig,"update mcq_answers set correct='$newAns', validate='1', marks='0' where email='$email' and answer='$ans' and question='$ques'");
            array_push($wrong,$ques);
        }else{
            $cr_sql =  mysqli_query($dbconfig,"update mcq_answers set validate='1', marks='2' where email='$email' and answer='$ans' and question='$ques'");
            array_push($correct,$ques);
        }
    }
    header('location:../viewUser.php?email='.$email);
}
?>