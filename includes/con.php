<?php
$con=mysqli_connect("localhost","mfmun","mfmun","MFMUN");
	if(!$con){
		die("连接错误: " . mysqli_connect_error());
	}
?>