<!DOCTYPE html>
<!--Server Side Code-->
<?php
session_start();
if(isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
	$uname=$_SESSION["name"];
	$uemail=$_SESSION["email"];
}else{
	$uname="游客";
	$uemail="♂?";
}
?>
<!--Main Part-->
<html>
<head>
	<meta charset="UTF-8">
	<title>五月花模联 - MFMUN</title>
	<?php include("./includes/import_css.php"); ?>
</head>
	
<body>
	<?php include("./includes/nav.php"); ?>
	<main>
	<div class="grey lighten-4">
		<div class="section scrollspy">
			<div class="container">
				<h1 class="center"><b>五月花模联</b></h1>
				<p class="center blue-grey-text">MFMUN</p>
				<p class="center">2020年5月1日~3日</p>
				<p class="center"><a class="center btn waves-effect light-blue z-depth-4" href="#">现在申请</a></p>
			</div>
		</div>
	</div>
	</main>
	<!--IMPORT JS UNDER THE LINE-->
	<?php 
	include("./includes/footer.php");
	include("./includes/import_js.php"); 
	?>
</body>
</html>