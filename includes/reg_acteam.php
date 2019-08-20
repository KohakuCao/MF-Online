<div class="grey lighten-4">
	<div class="section">
		<div class="container">
			<h1 class="center"><b>学术团队申请</b></h1>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<div class="row">
<?php
include("./includes/con.php");
$check_query="SELECT * FROM conferences WHERE actived=1";
$result=mysqli_query($con,$check_query);
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$conference_Info=array(
		"id"=>$row["id"],
		"name"=>$row["name"],
		"intro"=>$row["intro"],
		"time_s"=>$row["time_s"],
		"time_e"=>$row["time_e"],
		"place"=>$row["place"]
	);
	$c="<div class='col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 scrollspy'>
				<div class='card light-blue lighten-1 white-text'>
				<div class='card-image'>
				<img src='/img/conference/".$conference_Info["id"].".png' />
				<span class='card-title opback'>".$conference_Info["name"]."</span>
				<a class='btn-large btn-floating halfway-fab waves-effect right indigo accent-3' href='/actions/reg_acteam.php?id=".$conference_Info["id"]."'>申请</a>
				</div>
				<div class='card-content'>
						<p>".$conference_Info["intro"]."</p>
					</div>
					<div class='card-action'>
						<p>时间：".$conference_Info["time_s"]." 至 ".$conference_Info["time_e"]."<br/>地点：".$conference_Info["place"]."</p>
					</div>
				</div>
			</div>";
	echo $c;
}

?>
			</div>
		</div>
	</div>
</div>