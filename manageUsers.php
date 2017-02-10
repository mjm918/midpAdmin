<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 11:18
 */
include "DBHandler/config.php";
$hide = "display:none";
if(isset($_GET['msg'])){
 $msg = $_GET['msg'];
 $hide = "";
}else{
    $msg = "";
}
if(isset($_GET['notify'])){
    $notify = $_GET['notify'];
    $hide = "";
}else{
    $notify = "";
}
if(isset($_POST["submit"])){
    $search = $_POST['search'];

    $query = mysqli_query($dbconfig,"select * from premium where email='$search'");
    if(mysqli_num_rows($query) == 0){
        $query = mysqli_query($dbconfig,"select * from admin where username='$search'");
        $res = $query->fetch_assoc();
        $name = $res['username'];
        $ic = "NULL";
        $mobile = "NULL";
        $state = "NULL";
        $school = "NULL";
        $pid = "NULL";
        $pmid = "NULL";
    }else{
        $res = $query->fetch_assoc();
        $name = $res['fullname'];
        $ic = $res['ic'];
        $mobile = $res['mobile'];
        $state = $res['state'];
        $school = $res['school'];
        $pid = $res['pid'];
        $pmid = $res['pmid'];
    }
    $display = "";

}else{
    $display = "display:none";
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
    <title>Admin | Manage Users & Admin</title>

    <style type="text/css">
        .search-form .form-group {
            float: right !important;
            transition: all 0.35s, border-radius 0s;
            width: 32px;
            height: 32px;
            background-color: #fff;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            border-radius: 25px;
            border: 1px solid #ccc;
        }
        .search-form .form-group input.form-control {
            padding-right: 20px;
            border: 0 none;
            background: transparent;
            box-shadow: none;
            display:block;
        }
        .search-form .form-group input.form-control::-webkit-input-placeholder {
            display: none;
        }
        .search-form .form-group input.form-control:-moz-placeholder {
            /* Firefox 18- */
            display: none;
        }
        .search-form .form-group input.form-control::-moz-placeholder {
            /* Firefox 19+ */
            display: none;
        }
        .search-form .form-group input.form-control:-ms-input-placeholder {
            display: none;
        }
        .search-form .form-group:hover,
        .search-form .form-group.hover {
            width: 100%;
            border-radius: 4px 25px 25px 4px;
        }
        .search-form .form-group span.form-control-feedback {
            position: absolute;
            top: -1px;
            right: -2px;
            z-index: 2;
            display: block;
            width: 34px;
            height: 34px;
            line-height: 34px;
            text-align: center;
            color: #3596e0;
            left: initial;
            font-size: 14px;
        }

    </style>
</head>
<?php include "headerProfile.php";?>
<body>
<div id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>User search field</h2>
                <form action="manageUsers.php" method="post" class="search-form">
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" name="search" id="search" placeholder="Email">
                        <button type="submit" name="submit" id="submit">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </button>
                    </div>
                </form>
            </div>
            <div style="margin-bottom: 50px;<?php echo $display;?>" class="col-md-6 col-md-offset-3">
                <div class="card">
                    <div class="card-content">
                        <H2 style="color: coral;" class="card-title"><?php echo $name;?></H2>
                        <a href="viewUser.php?email=<?php echo $search?>"><p style="color: #326eaf"><?php echo $search;?></p></a>
                    </div>

                    <div class="card-action">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><a style="text-decoration: none;font-weight: 700" href="https://www.google.com/search?q=<?php echo $school;?>" target="new_blank"><span style="color: #326eaf">School </span></td>
                                <td><a style="text-decoration: none" href="https://www.google.com/search?q=<?php echo $school;?>" target="new_blank"><b style="color: coral"><?php echo $school;?></b></a></td>
                            </tr>
                            <tr>
                                <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">IC </span></b></h5></td>
                                <td><b style="color: coral"><?php echo $ic;?></b></td>
                            </tr>
                            <tr>
                                <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">State </span></b></h5></td>
                                <td><b style="color: coral"><?php echo $state;?></b></td>
                            </tr>
                            <tr>
                                <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">Mobile </span></b></h5></td>
                                <td><b style="color: coral"><?php echo $mobile;?></b></td>
                            </tr>
                            <tr>
                                <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">PAY-ID </span></b></h5></td>
                                <td><b style="color: coral"><?php echo $pid;?></b></td>
                            </tr>
                            <tr>
                                <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">PAYMENT-ID </span></b></h5></td>
                                <td><b style="color: coral"><?php echo $pmid;?></b></td>
                            </tr>
                            <tr>
                                <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">Delete user </span></b></h5></td>
                                <td><form action="DBHandler/deleteMember.php" method="post">
                                        <input name="email" id="email" value="<?php echo $search;?>" style="display: none"/>
                                        <input name="submit" id="submit" type="submit" class="btn btn-primary" value="Delete now!"/>
                                    </form> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="float: right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Assign a new admin</h1>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="DBHandler/newAdmin.php" method="POST">
                            <div class="form-group">
                                <input type="text" pattern=".{3,40}" required title="3 to 40 characters" name="username" id="username" class="form-control" required="required" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <input type="password" pattern=".{3,20}" required title="3 to 20 characters" name="pass" id="username" class="form-control" required="required" placeholder="Password">
                            </div>
                            <input style="background-color: #326eaf" name="submit" type="submit" value="Assign" class="btn btn-info btn-block">
                        </form>
                        <p style="color: #326eaf;<?php echo $hide?>"><?php echo $msg;?></p>
                    </div>
                </div>
            </div>
            <div style="float: right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Change membership status</h1>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="DBHandler/editMembership.php" method="POST">
                            <div class="form-group">
                                <input type="email" pattern=".{3,40}" required title="3 to 40 characters" name="email" id="email" class="form-control" required="required" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <label class="radio-inline"><input type="radio" value="Premium" id="optradio" name="optradio">Premium</label>
                                <label class="radio-inline"><input type="radio" value="Normal" id="optradio" name="optradio">Normal</label>
                            </div>
                            <input style="background-color: #326eaf" name="submit" type="submit" value="Change status" class="btn btn-info btn-block">
                        </form>
                        <p style="color: #326eaf;<?php echo $hide?>"><?php echo $notify;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "sideNav.php";?>
</body>
<?php include "footer.php";?>
</html>
