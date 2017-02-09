<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 07/02/2017
 * Time: 08:13
 */
include "DBHandler/config.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!--For Mobile rendering-->
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin | Home</title>
</head>
<?php include ('headerProfile.php');?>
<body>
    <div id="main">
            <div class="container">
                <b><p style="color: coral">Users</p></b>
                <div class="table-responsive">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <table class="table table-striped table-bordered table-hover table-condensed">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $query  = mysqli_query($dbconfig,"select * from premium limit 0,10");
                                    while($row = mysqli_fetch_array($query)){
                                        echo '<tr>
                                    <td>'.$row["fullname"].'</td>
                                    <td><a href="viewUser.php?email='.$row["email"].'">'.$row["email"].'</a></td>
                                </tr>';
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <b><p style="color: coral">Waiting for marking</p></b>
                <div class="table-responsive">
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
                                $query  = mysqli_query($dbconfig,"select * from record where validate=0 limit 0,10");
                                while($row = mysqli_fetch_array($query)){
                                    echo '<tr>
                                    <td><a href="viewUser.php?email='.$row["email"].'">'.$row["email"].'</a></td>
                                    <td>'.$row["date"].'</td>
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
    <div style="float: right">
        <?php include "sideNav.php";?>
    </div>
</body>
<?php include ('footer.php');?>
</html>
