<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
	$uname=$_SESSION["name"];
	$uemail=$_SESSION["email"];
}else{
	header("location:index.php");
}
include("./includes/con.php");
include("./includes/functions.php");
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>用户 - MFMUN</title>
	<?php include("./includes/import_css.php"); ?>
	<script language="javascript">
		var usermode=1;
	</script>
</head>
<body>
	<main>
	<?php include("./includes/nav.php"); ?>
	<div id="info" class="col s12">
		<?php include("./includes/user_info.php"); ?>
	</div>
	<div id="regs" class="col s12">
		<?php include("./includes/my_application.php"); ?>
	</div>
	</div></div>
	<div id="changepass" class="col s12">
		<?php include("./includes/change_pass.php"); ?>
	</div>
	<div id="logout" class="col s12">
		<div class="section">
			<div class="container">
				<p>您将离开系统</p>
				<a href="/logout.php" class="btn waves-effect red darken-1">登出</a>
			</div>
		</div>
	</div>
	</main>
	<?php 
	include("./includes/footer.php");
	include("./includes/import_js.php"); 
	?>
</body>
</html>