<?php
session_start();
$uid=intval($_SESSION["uid"]);
include("../includes/con.php");
$email=$_POST["email"];
$phone=$_POST["phone"];
$qq=$_POST["qq"];
$res=mysqli_query($con,"UPDATE `user` SET `email`='$email', `phone`='$phone', `qq`='$qq' WHERE `uid`=$uid;");
	header("location:../user.php");
?>