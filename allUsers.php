<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 08/02/2017
 * Time: 11:33
 */
include "DBHandler/config.php";
session_start();
$num_rec_per_page=1;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
if (isset($_GET["resit"])) { $resit_page  = $_GET["resit"]; } else { $resit_page=1; };
$start_from = ($page-1) * $num_rec_per_page;
$start_for_resit=($resit_page-1)*$num_rec_per_page;
$resit = mysqli_query($dbconfig,"SELECT * FROM premium where status_p=0 LIMIT $start_for_resit, $num_rec_per_page");
$rs_result = mysqli_query ($dbconfig,"SELECT * FROM premium LIMIT $start_from, $num_rec_per_page");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!--For Mobile rendering-->
    <link rel="stylesheet" href="CSS/style.css">
    <link href="Assets/midp.ico" rel="shortcut icon" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin | All users</title>
</head>
<?php include "headerProfile.php";?>
<body>
<div id="main">
<div class="container">
    <h4>User details</h4>
    <div class="table-responsive">
        <div class="panel-group">
            <div class="panel panel-default">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>IC</th>
                        <th>Mobile</th>
                        <th>State</th>
                        <th>School</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($rs_result)){
                        echo '<tr>
                                    <td>'.$row["fullname"].'</td>
                                    <td><a href="viewUser.php?email='.$row["email"].'">'.$row["email"].'</a></td>
                                    <td>'.$row["ic"].'</td>
                                    <td>'.$row["mobile"].'</td>
                                    <td>'.$row["state"].'</td>
                                    <td>'.$row["school"].'</td>
                                </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
            $rs_result = mysqli_query($dbconfig,"SELECT * FROM premium");
            $total_records = mysqli_num_rows($rs_result);
            $total_pages = ceil($total_records / $num_rec_per_page);

            echo '<nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="allUsers.php?page='.($page-1).'">Previous</a></li>';
            for ($i=1; $i<=$total_pages; $i++) {
                echo '<li class="page-item"><a class="page-link" href="allUsers.php?page='.$i.'">'.$i.'</a></li>';
            };
            echo '<li class="page-item"><a class="page-link" href="allUsers.php?page='.($page+1).'">Next</a></li>
                        </ul>
                </nav>';
            ?>
        </div>
    </div>
    <h4>User for resit</h4>
    <div class="table-responsive">
        <div class="panel-group">
            <div class="panel panel-default">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>IC</th>
                        <th>Mobile</th>
                        <th>State</th>
                        <th>School</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($resit)){
                        echo '<tr>
                                    <td>'.$row["fullname"].'</td>
                                    <td><a href="viewUser.php?email='.$row["email"].'">'.$row["email"].'</a></td>
                                    <td>'.$row["ic"].'</td>
                                    <td>'.$row["mobile"].'</td>
                                    <td>'.$row["state"].'</td>
                                    <td>'.$row["school"].'</td>
                                </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
            $rs_result = mysqli_query($dbconfig,"SELECT * FROM premium where status_p=0");
            $total_records = mysqli_num_rows($rs_result);
            $total_pages = ceil($total_records / $num_rec_per_page);

            echo '<nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="allUsers.php?resit='.($resit_page-1).'">Previous</a></li>';
            for ($i=1; $i<=$total_pages; $i++) {
                echo '<li class="page-item"><a class="page-link" href="allUsers.php?resit='.$i.'">'.$i.'</a></li>';
            };
            echo '<li class="page-item"><a class="page-link" href="allUsers.php?resit='.($resit_page+1).'">Next</a></li>
                        </ul>
                </nav>';
            ?>
        </div>
    </div>
</div>
</div>
<?php include ('sideNav.php');?>
</body>
<?php include "footer.php";?>
</html>
