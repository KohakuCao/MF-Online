<?php
$uid=$_SESSION["uid"];
$res_applications=mysqli_query($con,"SELECT * FROM `reg` WHERE `uid`=$uid ORDER BY `time` DESC;");
?>
<div class="section">
	<div class="container">
		<h1>我的申请</h1>
	</div>
</div>
<div class="divider"></div>
<div class="section">
	<div class="container">
		<div class='row'>
		<?php
		while($app=mysqli_fetch_array($res_applications)){
			$cid=intval($app["cid"]);
			$res_conference=mysqli_query($con,"SELECT * FROM `conferences` WHERE `id`=$cid;");
			$row_conference=mysqli_fetch_array($res_conference);
			$rid=$app["rid"];
			$state=getStates($app["state"]);
			$state_text=$state["string"];
			$state_textcolor=$state["textcolor"];
			$type=$app["type"];
			if($type=="acteam"){
				$color="black";
			}elseif($type=="del"){
				$color="blue darken-4";
			}elseif($type=="volunteer"){
				$color="teal darken-3";
			}
			$time=$app["time"];
			$title=$row_conference["name"];
			$intro=$row_conference["intro"];
			echo "
			
				<div class='col s12 m6'>
					<div class='card $color'>
						<div class='card-image'>
							<img src='/img/conference/$cid.png' />
							<span class='card-title white-text'>$title</span>
						</div>
						<div class='card-content white-text'>
							<p>$intro</p>
						</div>
						<div class='card-action'>
							<p class=$state_textcolor>$state_text</p>
							<a href='/view.php?rid=$rid' class='btn waves-effect deep-orange darken-4'>查看</a>
						</div>
					</div>
				</div>
			
			";
		}
		?>
		</div>
	</div>
</div>