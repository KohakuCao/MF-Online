<!doctype html>
<?php
session_start();
if(isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
	$uname=$_SESSION["name"];
	$uemail=$_SESSION["email"];
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Level Up! 计划 - MFMUN</title>
	<?php include("./includes/import_css.php"); ?>
</head>

<body>
	<main>
	<?php include("./includes/nav.php"); ?>
	<div class="parallax-container scrollspy"  style="max-height: 260px">
			<div class="parallax">
				<img src="/img/MF_banner.png" />
			</div>
	</div>
	<div class="section z-depth-5 scrollspy">
		<div class="container">
			<h1 class="center"><b>Level Up! 计划</b></h1>
			<h5 class="center grey-text"><i class="small material-icons">all_inclusive</i><br />什么是Level Up!</h5>
			<p>“Level Up! 计划”是由北京市第一六一中学模拟联合国社团牵头的一个行动，其旨在对MFMUN进行全面改造升级：包括学术升级、会务服务升级、规模升级。我们将通过“Level Up! 计划”，把MFMUN建设成为北京一流的校际模拟联合国会议。</p>
		</div>
	</div>
	<div class="parallax-container scrollspy"  style="max-height: 280px">
			<div class="parallax">
				<img src="/img/161_campus_1.png" />
			</div>
	</div>
	<div class="section z-depth-5 scrollspy">
		<div class="container">
			<h5 class="center grey-text"><i class="small material-icons">all_inclusive</i><br />为什么要Level Up!</h5>
			<p>&#9679;近年北京模联圈正在走下坡路——这是我们发起“Level Up! 计划”最重要的原因。我们常听前辈怀念北京模联曾经的“黄金时代”，也常听前辈感叹如今的学术水平底下。我们希望通过“Level Up! 计划”培养有学术素养的代表和主席，为北京模联圈的复兴尽微薄之力。</p>
			<p>&#9679;寻回初心——发起“Level Up! 计划”的另一个重要原因。模联的本质是一个学生活动，是一个提供学术交流的活动，是一个社交活动。我们希望在这里收获知识、收获友谊，而不是互相勾心斗角与恶性竞争。一六一中——并且我们相信，不只是一六一中——希望找回模联的初心，打造一个真正的纯净的模联交流平台。</p>
			<p>&#9679;培养主席——MFMUN的传统。MFMUN召开正值高一第二学期，因此会议也将培养一批新的高水平主席，帮助他们在暑假前往更高端的会议。</p>
		</div>
	</div>
	<div class="parallax-container scrollspy"  style="max-height: 280px">
			<div class="parallax">
				<img src="/img/canterlot.png" />
			</div>
	</div>
	<div class="section z-depth-5 scrollspy">
		<div class="container">
			<h5 class="center grey-text"><i class="small material-icons">all_inclusive</i><br />如何Level Up!</h5>
			<p>我们将以完善成员校体系、扩大会议规模、召开学术沙龙等方式，逐步实现MFMUN的“Level Up! 计划”。</p>
		</div>
	</div>
	<div class="parallax-container scrollspy"  style="max-height: 280px">
			<div class="parallax">
				<img src="/img/161_campus_2.png" />
			</div>
	</div>
	</main>
	<?php
	include("./includes/footer.php");
	include("./includes/import_js.php");
	?>
</body>
</html>