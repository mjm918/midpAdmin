<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 14:59
 */
include "DBHandler/config.php";
session_start();
if(isset($_GET['email'])){
    $email = $_GET['email'];
}
if(isset($_POST['submit'])){
    $comment = htmlspecialchars($_POST['comment']);
    $id = $_POST['id'];
    $mark = $_POST['marks'];
    $sql = mysqli_query($dbconfig,"update theoryanswer set comment='$comment',marks='$mark' where id='$id'");
    if($sql){
        $valid = mysqli_query($dbconfig,"update theoryanswer set validate='1' where id='$id'");
    }
}
$check = mysqli_query($dbconfig,"select * from theoryanswer where email='$email' and validate='0'");
$hide_c = "";
$show_btn = "display:none";
if(mysqli_num_rows($check) == 0){
    $show_btn = "";
    $hide_c = "display:none";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href="Assets/midp.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Admin | Check Subjective Answers</title>
</head>
<?php include "headerProfile.php";?>
<body>
<div style="margin-bottom: 100px" id="main">
    <div class="container">
        <div style="<?php echo $hide_c;?>">
            <?php
            $query = mysqli_query($dbconfig,"select * from theoryanswer where email='$email' and validate='0'");
            while($row = mysqli_fetch_array($query)):?>
                <h3 style="color: #326eaf"><?php echo "Question : ";?></h3>
                <h3 style="color: coral"><?php echo $row['question']?></h3>
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 style="color: #326eaf">Answer:</h4></div>
                    <div class="panel-body"><p style="text-align: justify"><mark><?php echo $row['answer'];?></mark></p></div>
                    <div class="panel-body">
                        <h4 style="color: #326eaf">Comment:</h4>
                        <form action="checkSubjective.php" method="post">
                            <textarea placeholder="Write your comment here" style="resize: none;height: 150px" class="form-control" rows="5" id="comment" name="comment"></textarea>
                            <input type="hidden" value="<?php echo $row['id']?>" id="id" name="id"/>
                            <!---marks need to be added ..also in test panel-->
                            <div style="width: 150px;margin-top: 10px" class="form-group">
                                <input type="number" name="marks" id="marks" class="form-control" required="required" placeholder="Marks">
                            </div>
                            <input type="submit" name="submit" id="submit" class="btn btn-primary"/>
                        </form>
                    </div>
                </div>
                <?php
            endwhile;?>
        </div>
        <div style="text-align: center;<?php echo $show_btn;?>">
            <a href="Util/generateResult.php?email=<?php echo $email?>" style="margin: 0 auto; text-decoration: none">
                <input class="btn btn-warning" type="submit" value="Generate Result">
            </a>
        </div>
    </div>
</div>
<?php include "sideNav.php";?>
</body>
<?php include "footer.php";?>
</html>
