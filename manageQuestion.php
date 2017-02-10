<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 09/02/2017
 * Time: 20:45
 */
include "DBHandler/config.php";

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
    <title>Admin | Manage Question</title>
</head>
<?php include'headerProfile.php';?>
<body>
<div style="margin-bottom: 100px" id="main">
    <div class="container">
        <h2 style="color: #326eaf">MCQ Questions</h2>
        <table class="table table-hover">
            <thead>
            <tr style="color: coral">
                <th>Question</th>
                <th>Option <span style="color: #326eaf"> A</span></th>
                <th>Option <span style="color: #326eaf"> B</span></th>
                <th>Option <span style="color: #326eaf"> C</span></th>
                <th>Option <span style="color: #326eaf"> D</span></th>
                <th>Correct Answer</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $mcq = mysqli_query($dbconfig,"select * from mcq");
                while ($row = mysqli_fetch_array($mcq)):
            ?>
            <tr>
                <td><?php echo $row['question']?></td>
                <td><?php echo $row['q_a']?></td>
                <td><?php echo $row['q_b']?></td>
                <td><?php echo $row['q_c']?></td>
                <td><?php echo $row['q_d']?></td>
                <td><?php echo $row['ans']?></td>
                <td><a style="text-decoration: none" href="editMcq.php?edit=<?php echo $row['id'];?>"><input type="button" class="btn btn-warning" value="Edit"></a></td>
                <td><a style="text-decoration: none" href="./DBHandler/deleteMcq.php?delete=<?php echo $row['id'];?>"><input type="button" class="btn btn-danger" value="Delete"></a></td>
            </tr>
            <?php endwhile;?>
            </tbody>
        </table>
        <hr>
        <a style="text-decoration: none" href="addMcq.php"><input style="float: right" type="button" class="btn btn-primary" value="Add question"></a>
        <h2 style="color: #326eaf">Theory Questions</h2>
        <table class="table table-hover">
            <thead>
            <tr style="color: coral">
                <th>Question</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $mcq = mysqli_query($dbconfig,"select * from theoryquestion");
            while ($r = mysqli_fetch_array($mcq)):
                ?>
                <tr>
                    <td><?php echo $r['question']?></td>
                    <td><a style="text-decoration: none" href="editTheory.php?edit=<?php echo $r['id'];?>"><input type="button" class="btn btn-warning" value="Edit"></a></td>
                    <td><a style="text-decoration: none" href="./DBHandler/deleteTheory.php?delete=<?php echo $r['id'];?>"><input type="button" class="btn btn-danger" value="Delete"></a></td>
                </tr>
            <?php endwhile;?>
            </tbody>
        </table>
        <hr>
        <a style="text-decoration: none" href="addTheory.php"><input style="float: right" type="button" class="btn btn-primary" value="Add question"></a>
    </div>
</div>
<?php include 'sideNav.php';?>
</body>
<?php include "footer.php";?>
</html>
