<?php
session_start();
if(isset($_SESSION["uid"])==false){
	header("location:./index.php");
}
$uid=intval($_SESSION["uid"]);
include("../includes/con.php");
include("../includes/functions.php");
if($_GET["action"]=="invite"){
	$rid=$_GET["rid"];
	$to_uid=intval($_GET["uid"]);
	$inviter_info=getUserInfo($uid);
	$inviter_reg=getRegInfo($rid);
	$query="SELECT * FROM `reg` WHERE `uid`=$to_uid AND `type`='del';";
	$res=mysqli_query($con,$query);
	if(mysqli_num_rows($res)>0){
		while($row=mysqli_fetch_array($res)){
			if(intval($row["eid"])==intval($inviter_reg["eid"])){
				if(intval($row["partner"]) != -1){
					echo "<script type='text/javascript'>alert('对方已经有搭档了！'); window.location.href='/view.php?rid=".$rid."';</script>";
				}else{
					if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM `invites` WHERE `rid`='$rid' AND `torid`=".$row["rid"]." AND `state`='pending';"))>=1){
						echo "<script type='text/javascript'>alert('您已经邀请过该人！'); window.location.href='/view.php?rid=".$rid."';</script>";
					}else{
						$query="INSERT INTO `invites` (inviter, rid, torid, state) VALUES ($uid, $rid, ".$row["rid"].", 'pending')";
						$res=mysqli_query($con,$query);
						echo "<script type='text/javascript'>alert('邀请成功！'); window.location.href='/view.php?rid=".$rid."';</script>";
					}
				}
			}else{
				echo "<script type='text/javascript'>alert('对方没有和你报名同一个委员会！'); window.location.href='/view.php?rid=".$rid."';</script>";
			}
		}
	}else{
		echo "<script type='text/javascript'>alert('对方没有报名！'); window.location.href='/view.php?rid=".$rid."';</script>";
	}
	
}

if($_GET["action"]=="accept"){
	$iid=intval($_GET["iid"]);
	$invite=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `invites` WHERE `id`=$iid;"));
	$user_reg=getRegInfo($invite["torid"]);
	if($user_reg["uid"]!=$uid){
		header("location:../index.php");
	}else{
		$inviter_reg=getRegInfo($invite["rid"]);
		$res1=mysqli_query($con,"UPDATE `reg` SET `partner`=".intval($inviter_reg["uid"])." WHERE `rid`=".intval($user_reg["rid"]).";");
		$res2=mysqli_query($con,"UPDATE `reg` SET `partner`=".intval($user_reg["uid"])." WHERE `rid`=".intval($inviter_reg["rid"]).";");
		$res3=mysqli_query($con,"UPDATE `invites` SET `state`='accepted' WHERE `id`=".$iid.";");
		echo "<script type='text/javascript'>alert('完成！'); window.location.href='/view.php?rid=".$user_reg["rid"]."';</script>";
	}
	
}

if($_GET["reject"]=="reject"){
	$iid=intval($_GET["iid"]);
	$invite=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `invites` WHERE `id`=$iid;"));
	$user_reg=getRegInfo($invite["torid"]);
	if($user_reg["uid"]!=$uid){
		header("location:../index.php");
	}else{
		$inviter_reg=getRegInfo($invite["rid"]);
		$res3=mysqli_query($con,"UPDATE `invites` SET `state`='rejected' WHERE `id`=".$iid.";");
		echo "<script type='text/javascript'>alert('完成！'); window.location.href='/view.php?rid=".$user_reg["rid"]."';</script>";
	}
	
}
?>