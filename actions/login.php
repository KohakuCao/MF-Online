<?php
	session_start();
	$user=$_POST["user"];
	$password=hash("sha512",$_POST["password"]);
	include("../includes/con.php");
	$result=mysqli_query($con,"select * from user where name='$user' or email='$user' or phone='$user';");
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if($password==$row["password"]){
		$_SESSION["name"]=$row["name"];
		$_SESSION["rname"]=$row["real_name"];
		$_SESSION["uid"]=$row["uid"];
		$_SESSION["qq"]=$row["qq"];
		$_SESSION["phone"]=$row["phone"];
		$_SESSION["email"]=$row["email"];
		$school=$row["school"];
		mysqli_close($con);
		header("location:../index.php");
	}else{
		echo "<script type='text/javascript'>alert('密码或用户名错误！');</script>";
		header("location:../login.php");
	}
?>