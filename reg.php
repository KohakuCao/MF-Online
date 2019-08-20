<!doctype html>
<?php
session_start();
if(isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
	$uname=$_SESSION["name"];
	$uemail=$_SESSION["email"];
}
if(isset($_SESSION["uid"])){
	$type_e=$_GET["type"];
	switch($type_e){
		case 'delegate':
			$type_s="代表";
			break;
		case 'acteam':
			$type_s="学术团队";
			break;
		case 'volunteer':
			$type_s="志愿者";
			break;
		default:
			header("location:index.php");
	}
}else{
	header("location:login.php");
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $type_s; ?>申请 - MFMUN</title>
	<?php include("./includes/import_css.php"); ?>
</head>

<body>
	<main>
	<?php include("./includes/nav.php"); ?>
	<?php
	switch($type_e){
		case 'delegate':
			include("./includes/reg_delegate.php");
			break;
		case 'acteam':
			include("./includes/reg_acteam.php");
			break;
		case 'volunteer':
			include("./includes/reg_volunteer.php");
			break;
	}
	?>
	</main>
	<?php 
	include("./includes/footer.php");
	include("./includes/import_js.php"); 
	?>
</body>
</html>
