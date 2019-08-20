<?php
session_start();
$uid=intval($_SESSION["uid"]);
include("../includes/con.php");
$oldpass=$_POST["oldpass"];
$pass=$_POST["pass"];
$repass=$_POST["repass"];
if($pass!=$repass||$pass==""||$repass==""){
	echo "<script type='text/javascript'>alert('两次密码输入不一样'); window.location.pathname='/user.php';</script>";
}else{
	$try=mysqli_query($con, "SELECT * FROM `user` WHERE `uid`=$uid");
	$try_row=mysqli_fetch_array($try);
	if($try_row["password"]==hash("sha512",$oldpass)){
		$hashed_pass=hash("sha512",$pass);
		$res=mysqli_query($con, "UPDATE `user` SET `password`='$hashed_pass' WHERE `uid`=$uid;");
		if($res){
			echo "<script type='text/javascript'>alert('修改成功！'); window.location.pathname='/user.php';</script>";
		}else{
			die(mysqli_error($con));
		}
	}else{
		echo "<script type='text/javascript'>alert('旧密码输入错误！'); window.location.pathname='/user.php';</script>";
	}
	
}
?>