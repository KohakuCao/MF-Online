<?php
$uid=$_SESSION["uid"];
$resault_checkinfo=mysqli_query($con,"SELECT * FROM `user` WHERE `uid`=$uid;");
$row_checkinfo=mysqli_fetch_array($resault_checkinfo);
?>