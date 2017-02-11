<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 01:19
 */
include "DBHandler/config.php";
session_start();
$hide = "display:none";
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $desc = htmlspecialchars($_POST['desc']);
    $link = $_POST['link'];

    $query = mysqli_query($dbconfig,"insert into video(id,link,title,des) VALUE (NULL,'$link','$title','$desc')");

    if($query){
        $hide = "";
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
    <title>Admin | Upload videos</title>
</head>
<?php include "headerProfile.php";?>
<body>
<div id="main">
    <div class="container">
        <h2 style="color: #326eaf;">Current videos</h2>
        <hr>
        <ul class="list-unstyled video-list-thumbs row">
            <?php
            $sql = mysqli_query($dbconfig,"select * from video");
            while($r = mysqli_fetch_array($sql)){
                $id = $r['id'];
                $l = $r['link'];
                $t = $r['title'];
                $d = $r['des'];
                echo '<li style="margin: 20px" class="col-lg-3 col-sm-6 col-xs-6">
            <iframe width="300" height="200" src="https://www.youtube.com/embed/'.$l.'" frameborder="0" allowfullscreen></iframe>
            <h4 style="color:darkcyan">'.$t.'</h4>
            <p style="color: #525252;">'.$d.'</p>
            <form action="DBHandler/deleteVideo.php" method="post">
                <input type="hidden" value="'.$id.'" name="id" id="id">
                <input type="submit" value="Delete" class="btn btn-danger" name="submit" id="submit">
            </form>
    <hr style="width: 300px">
        </li>';
            }
            ?>
        </ul>
        <div>
            <div class="row">
                <hr>
                <h2 style="color: #326eaf;">Upload video</h2>
                <hr>
                <p style="color: coral">To upload a video take the link as shown below from YouTube and upload. NOTE: Do not upload the full link</p>
                <img src="Assets/link.png" width="540px" height="80px"/>
                <p style="color: coral">Take the parameter only like shown in image. Ignore 'v=' and '&'</p>
                <hr>
                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Upload your video here</h1>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="upload.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="title" id="title" class="form-control" required="required" placeholder="Video title">
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Write video description here" style="resize: none;height: 150px" class="form-control" rows="5" id="desc" name="desc"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="link" id="link" class="form-control" required="required" placeholder="Video Link">
                                </div>
                                <p style="color: #326eaf;<?php echo $hide;?>">Successfully uploaded</p>
                                <input style="background-color: #326eaf" name="submit" type="submit" value="Upload" class="btn btn-info btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "sideNav.php";?>
</body>
<?php include "footer.php";?>
</html>
