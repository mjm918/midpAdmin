<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 00:39
 */
include "DBHandler/config.php";
session_start();
if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $_SESSION['theory_id'] = $id;

    $query = mysqli_query($dbconfig,"select * from theoryquestion where id='$id'");
    $row = $query->fetch_assoc();
    $ques = $row['question'];
}
if(isset($_POST['submit'])){
    $question = htmlspecialchars($_POST['question']);

    $newID = $_SESSION['theory_id'];
    $sql = mysqli_query($dbconfig,"update theoryquestion set question='$question' WHERE id='$newID'");

    if($sql){
        header('location:manageQuestion.php');
    }else{
        echo '<p style="color: red">Please try again</p>';
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="CSS/style.css">
    <link href="Assets/midp.ico" rel="shortcut icon" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Edit Subjective</title>
</head>
<?php include "headerProfile.php";?>
<body>
<div id="main">
    <div class="container">
        <h1 style="color: #326eaf">Edit Subjective Question,Answer and Choices</h1>
        <hr>
        <div class="row">
            <div class="col-sm-6" style="margin-left: 10px;margin-bottom: 100px">
                <form action="editTheory.php" method="post">
                    <label for="question"><h4 style="color: coral">New Question</h4></label>
                    <textarea placeholder="Write your question here" style="resize: none;height: 350px" class="form-control" rows="5" id="question" name="question"></textarea>
                    <br><br><input class="btn btn-primary" value="Modify" name="submit" id="submit" type="submit"/>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "sideNav.php";?>
</body>
<?php include "footer.php";?>
</html>


