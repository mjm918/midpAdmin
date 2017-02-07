<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 07/02/2017
 * Time: 04:00
 */
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'midp';
$dbconfig = mysqli_connect($host,$username,$password,$database) or die("Database Error");
?>