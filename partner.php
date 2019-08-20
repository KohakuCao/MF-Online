<!doctype html>
<?php
session_start();
if(isset($_SESSION["uid"])==false){
	header("location:./index.php");
}
$uid=$_SESSION["uid"];
$rid=$_GET["rid"];
include("./includes/con.php");
include("./includes/functions.php");
$reg=getRegInfo($rid);
$committee=getCommitteeInfo($reg["eid"]);
if($reg["uid"]!=$_SESSION["uid"]||$reg["partner"]!=-1||$committee["seattype"]!="double"){
	header("location:./index.php");
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>寻找搭档 - MFMUN</title>
	<?php include("./includes/import_css.php"); ?>
	<script type="text/javascript">
		function getUserInfo(){
			var x=document.getElementById("search_bar").value;
				$.post("/actions/get_user_info.php",{
					"safety":"safe",
					"name":x,
					"rid":<?php echo $rid; ?>
				},function(data,status){
					document.getElementById("search_res").innerHTML=data;
			});
			}
	</script>
</head>

<body>
	<?php include("./includes/nav.php"); ?>
	<main>
		<div class="section">
			<div class="container">
				<h1>寻找搭档</h1>
				<div class="row">
					<div class="input-field col s10">
						<input type="text" id="search_bar" placeholder="搭档姓名/用户名/手机/QQ" class="validate" />
						<label for="search_bar">搭档姓名/用户名/手机/QQ</label>
					</div>
					<button class="btn waves-effect col s2" onClick="getUserInfo();" id="search">搜索</button>
				</div>
			</div>
		</div>
		<div class="section">
			<div class="container">
				<div class="row" id="search_res">
					
				</div>
			</div>
		</div>
	</main>
	<?php include("./includes/footer.php"); 
	include("./includes/import_js.php"); ?>
</body>
</html>