<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 11/02/2017
 * Time: 12:03
 */

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
    <title>Admin | Setup site</title>
</head>
<?php include "headerProfile.php";?>
<body>
<div style="margin-bottom: 100px" id="main">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h4 style="color: #326eaf">Policy for payment</h4></div>
            <div class="panel-body"><img style="margin-left: auto;margin-right: auto;display: block;" src="Assets/policy_paypal.png" width="300" height="400" alt=""></div>
            <div class="panel-body">
                <h4 style="color: #326eaf">Content:</h4>
                <form action="./DBHandler/payment_p.php" method="post">
                    <textarea placeholder="Write your comment here" style="resize: none;height: 150px" class="form-control" rows="5" id="comment" name="comment"></textarea>
                    <br>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h4 style="color: #326eaf">Home content (User view)</h4></div>
            <div class="panel-body"><img style="margin-left: auto;margin-right: auto;display: block;" src="Assets/policy_home.png" width="1000" height="200" alt=""></div>
            <div class="panel-body">
                <h4 style="color: #326eaf">Content:</h4>
                <form action="./DBHandler/homecontent_p.php" method="post">
                    <textarea placeholder="Write your comment here" style="resize: none;height: 150px" class="form-control" rows="5" id="comment" name="comment"></textarea>
                    <br>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h4 style="color: #326eaf">Proceeding to exam alert</h4></div>
            <div class="panel-body"><img style="margin-left: auto;margin-right: auto;display: block;" src="Assets/policy_exam.png" width="900" height="200" alt=""></div>
            <div class="panel-body">
                <h4 style="color: #326eaf">Content:</h4>
                <form action="./DBHandler/exam_alert_p.php" method="post">
                    <textarea placeholder="Write your comment here" style="resize: none;height: 150px" class="form-control" rows="5" id="comment" name="comment"></textarea>
                    <br>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h4 style="color: #326eaf">Proceeding to retake exam alert</h4></div>
            <div class="panel-body"><img style="margin-left: auto;margin-right: auto;display: block;" src="Assets/policy_retake.png" width="700" height="200" alt=""></div>
            <div class="panel-body">
                <h4 style="color: #326eaf">Content:</h4>
                <form action="./DBHandler/retake_alert_p.php" method="post">
                    <textarea placeholder="Write your comment here" style="resize: none;height: 150px" class="form-control" rows="5" id="comment" name="comment"></textarea>
                    <br>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h4 style="color: #326eaf">Total marks for the exam</h4></div>
            <div class="panel-body">
                <h4 style="color: #326eaf">Content:</h4>
                <form action="./DBHandler/total_marks_p.php" method="post">
                    <input type="number" placeholder="Marks" class="form-control" rows="5" id="comment" name="comment" />
                    <br>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h4 style="color: #326eaf">Passing marks</h4></div>
            <div class="panel-body">
                <h4 style="color: #326eaf">Content:</h4>
                <form action="./DBHandler/passing_marks_p.php" method="post">
                    <input type="number" placeholder="Marks" class="form-control" rows="5" id="comment" name="comment" />
                    <br>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h4 style="color: #326eaf">Marks per question</h4></div>
            <div class="panel-body">
                <h4 style="color: #326eaf">Content:</h4>
                <form action="./DBHandler/marks_per_p.php" method="post">
                    <input type="number" placeholder="Marks" class="form-control" rows="5" id="comment" name="comment" />
                    <br>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "sideNav.php";?>
</body>
<?php include "footer.php";?>
</html>
