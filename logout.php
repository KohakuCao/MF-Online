<!doctype html>
<?php
session_start();
if(isset($_SESSION["uid"])){
	session_unset();
	session_destroy();
	header("location:index.php");
}else{
	header("location:index.php");
}
?>
<html>
<head>
<meta charset="UTF-8">
<title>登出……</title>
</head>

<body>
</body>
</html>