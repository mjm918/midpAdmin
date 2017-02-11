<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 09/02/2017
 * Time: 21:33
 */
include "DBHandler/config.php";
session_start();
if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $_SESSION['mcq_id'] = $id;

    $query = mysqli_query($dbconfig,"select * from mcq where id='$id'");
    $row = $query->fetch_assoc();
    $ques = $row['question'];
    $a = $row['q_a'];
    $b = $row['q_b'];
    $c = $row['q_c'];
    $d = $row['q_d'];
    $ans = $row['ans'];
}
if(isset($_POST['submit'])){
    $question = htmlspecialchars($_POST['question']);
    $q_a = $_POST['q_a'];
    $q_b = $_POST['q_b'];
    $q_c = $_POST['q_c'];
    $q_d = $_POST['q_d'];
    $q_ans = $_POST['q_ans'];

    $newID = $_SESSION['mcq_id'];
    $sql = mysqli_query($dbconfig,"update mcq set question='$question', q_a='$q_a',q_b='$q_b',q_c='$q_c',q_d='$q_d',ans='$q_ans' WHERE id='$newID'");

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
    <title>Admin | Edit MCQ</title>
</head>
<?php include "headerProfile.php";?>
<body>
<div id="main">
<div class="container">
    <h1 style="color: #326eaf">Edit MCQ Question,Answer and Choices</h1>
    <hr>
    <div class="row">
        <div class="col-sm-6" style="margin-left: 10px;margin-bottom: 100px">
            <form action="editMcq.php" method="post">
                <label for="question"><h4 style="color: coral">New Question</h4></label>
                <textarea placeholder="Write your question here" style="resize: none;height: 350px" class="form-control" rows="5" id="question" name="question"><?php echo $ques;?></textarea>
                <label for="q_a"><h4 style="color: coral">New Option A</h4></label>
                <input type="text" id="q_a" name="q_a" class="form-control" value="<?php echo $a;?>"/>
                <label for="q_b"><h4 style="color: coral">New Option B</h4></label>
                <input type="text" id="q_b" name="q_b" class="form-control" value="<?php echo $b;?>"/>
                <label for="q_c"><h4 style="color: coral">New Option C</h4></label>
                <input type="text" id="q_c" name="q_c" class="form-control" value="<?php echo $c;?>"/>
                <label for="q_d"><h4 style="color: coral">New Option D</h4></label>
                <input type="text" id="q_d" name="q_d" class="form-control" value="<?php echo $d;?>"/>
                <label for="q_ans"><h4 style="color: coral">New Answer</h4></label>
                <input type="text" id="q_ans" name="q_ans" class="form-control" value="<?php echo $ans;?>"/>
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

