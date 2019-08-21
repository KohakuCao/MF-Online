<?php
function getStates($x){
	global $con;
	$code=intval($x);
	$query="SELECT * FROM `statecode` WHERE `code`=$code";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);
	return $row;
}

function getUserInfo($x){
	global $con;
	$uid=intval($x);
	$query="SELECT * FROM `user` WHERE `uid`=$uid;";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);
	return $row;
}

function getRegInfo($x){
	global $con;
	$rid=intval($x);
	$query="SELECT * FROM `reg` WHERE `rid`=$rid;";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);
	return $row;
}

 function getConferenceInfo($x){
	 global $con;
	 $cid=intval($x);
	 $query="SELECT * FROM `conferences` WHERE `id`=$cid;";
	 $res=mysqli_query($con,$query);
	 $row=mysqli_fetch_array($res);
	 return $row;
 }

function getCommitteeInfo($x){
	global $con;
	$eid=intval($x);
	$query="SELECT * FROM `committees` WHERE `id`=$eid;";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);
	return $row;
}

function getSeatInfo($x,$y){
	global $con;
	$uid=intval($x);
	$eid=intval($y);
	$query="SELECT * FROM `seat` WHERE `uid`=$uid AND `eid`=$eid;";
	$res=mysqli_query($con,$query);
	if(mysqli_num_rows($res)==1){
		$row=mysqli_fetch_array($res);
		return $row;
	}else{
		$row2=array(
			"name"=>"暂未分配席位"
		);
		return $row2;
	}
}

function showPayImage(){
	
}

function getInviteInfo($x){
	global $con;
	$rid=intval($x);
	$query="SELECT * FROM `invites` WHERE `torid`=$rid AND `state`='pending'";
	$res=mysqli_query($con,$query);
	if(mysqli_num_rows($res)>=1){
		$temp=0;
		while($row=mysqli_fetch_array($res)){
			$rows[$temp]=$row;
			$temp+=1;
		}
		return $rows;
	}else{
		return false;
	}
	
}
?>