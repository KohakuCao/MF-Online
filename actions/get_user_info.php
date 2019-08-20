<?php
$name=$_POST["name"];
$safe=$_POST["safety"];
include("../includes/con.php");
if($safe!="safe"){
	echo "shit!";
}else{
	$res=mysqli_query($con,"SELECT * FROM `user` WHERE `real_name`='$name' OR `name`='$name' OR `phone`='$name' OR `qq`='$name';");
	if(mysqli_num_rows($res)==0){
		echo "未查询到此人";
	}else{
		while($row=mysqli_fetch_array($res)){
			$uid=$row["uid"];
			$uname=$row["real_name"];
			$uemail=$row["email"];
			$uschool=$row["school"];
			$sex=$row["sex"];
			$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $uemail ) ) ) . "?d=" . urlencode( "mp" ) . "&s=" . 160;
			$content="
			<div class='card horizontal s12 m10 l6'>
				<div class='card-image'>
					<img src=$grav_url />
				</div>
				<div class='card-stacked'>
					<div class='card-content'>
						<p><b>$uname</b><br />$sex<br />$uschool</p>
					</div>
					<div class='card-action'>
						<a href='/actions/invite_partner.php?uid=$uid' class='btn-flat waves-effect'>邀请</a>
					</div>
				</div>
			</div>
			";
			echo $content;
		}
	}
	
}
?>