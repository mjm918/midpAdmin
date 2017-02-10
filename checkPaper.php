<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 14:30
 */
include "DBHandler/config.php";
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
    <title>Admin | Check Paper</title>
</head>
<?php include "headerProfile.php";?>
<body>
<div id="main">
    <div class="container">
        <h2 style="color: #326eaf">Check MCQ & Subjective Answers</h2>
       <!----> <div class="table-responsive">
            <div class="panel-group">
                <div class="panel panel-default">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Exam date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query  = mysqli_query($dbconfig,"select * from record where validate=0");
                        while($row = mysqli_fetch_array($query)){
                            echo '<tr>
                                    <td><a href="viewUser.php?email='.$row["email"].'">'.$row["email"].'</a></td>
                                    <td>'.$row["date"].'</td>
                                    <td class="danger">Not Marked Yet</td>
                                    <td>
                                        <a href="checkSubjective.php?email='.$row["email"].'" style="text-decoration:none;float:right">
                                            <input class="btn btn-primary" type="button" value="Check now"/>
                                        </a>
                                    </td>
                                </tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "sideNav.php";?>
</body>
<?php include "footer.php";?>
</html>
