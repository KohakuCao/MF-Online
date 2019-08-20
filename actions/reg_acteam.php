<!doctype html>
<?php 
session_start();
if(isset($_SESSION["uid"])==false){
	header("location:../index.php");
}
$uid=intval($_SESSION["uid"]);
$cid=intval($_GET["id"]);
include("../includes/con.php");
$res=mysqli_query($con,"SELECT * FROM `reg` WHERE `uid`=$uid AND `cid`=$cid ORDER BY `time` DESC;");

?>
<html>
<head>
<meta charset="UTF-8">
<title>申请学术团队</title>
</head>
<?php
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_array($res);
		if(intval($row["state"])!=9){
			echo "<script type='text/javascript'>alert('您已申请过该会议，请勿重复申请');
			window.location.pathname='/user.php';</script>";
		}else{
			$res2=mysqli_query($con, "INSERT INTO `reg` (uid,cid,type,state) VALUES ($uid,$cid,'acteam',1);");
			echo "<script language='javascript'>window.location.pathname='/user.php';</script>";
		}
	}else{
		$res2=mysqli_query($con, "INSERT INTO `reg` (uid,cid,type,state) VALUES ($uid,$cid,'acteam',1);");
		echo "<script language='javascript'>window.location.pathname='/user.php';</script>";
	}
	?>
<body>
</body>
</html>