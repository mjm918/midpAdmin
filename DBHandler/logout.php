<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 07/02/2017
 * Time: 04:01
 */
session_start();
session_destroy();
session_regenerate_id(true);
header("location:../index.php");
?>