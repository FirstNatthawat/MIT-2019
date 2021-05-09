<?php
/**
 * Created by PhpStorm.
 * User: natthapong
 * Date: 31/8/2018
 * Time: 7:10
 */
$hostname = "localhost";
$username = "webrice2_db2";
$pass = "webrice2_db2";
$dbname = "webrice2_db2";
$con = mysqli_connect($hostname, $username, $pass) or die (mysqli_error("ไม่สามารถเชื่อมต่อกับ Mysql ได้"));
mysqli_query($con, "SET NAMES UTF8");
mysqli_select_db($con, $dbname)

?>