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
if($reg["uid"]!=$_SESSION["uid"]){
	header("location:./index.php");
}
$committee=getCommitteeInfo($reg["eid"]);
$state=getStates($reg["state"]);
if($reg["type"]=="del"){
	$committee_string=$committee["name"];
}elseif($reg["type"]=="acteam"){
	$committee_string="学术团队";
}elseif($reg["type"]=="volunteer"){
	$committee_string="志愿者";
}
$seat=getSeatInfo($uid,$committee["id"]);
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>查看参会申请 - MFMUN</title>
	<?php include("./includes/import_css.php"); ?>
</head>
<body>
	<?php include("./includes/nav.php"); ?>
	<main>
	<div class="section">
		<div class="container">
			<h1 class="center">参会申请</h1>
			<h5 class="center"><?php echo $committee_string; ?></h5>
			<h6 class="center <?php echo $state["textcolor"]; ?>"><?php echo $state["string"]; ?></h6>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<ul class="collapsible popout expandable">
				<li>
					<div class="collapsible-header"><i class="material-icons">people</i>搭档</div>
					<div class="collapsible-body">
						<?php
						if($reg["type"]=="del"){
							if($committee["seattype"]=="single"){
								echo "您申请的委员会是单代表制，无需搭档。";
							}elseif($committee["seattype"]=="double"){
								if($reg["partner"] == -1){
									echo "<p>您还没有搭档。</p><a href='/partner.php?rid=".$reg["rid"]."' class='btn waves-effect'>寻找搭档</a>";
								}else{
									$partner=getUserInfo($reg["partner"]);
									echo "<p>您的搭档是来自".$partner["school"]."的".$partner["real_name"]."，祝您和您的搭档合作愉快！</p>";
								}
							}else{
								echo "您申请的委员会是特殊代表制，无需搭档。";
							}
						}else{
							echo "您申请的职位无需搭档。";
						}
						?>
					</div>
				</li>
				<li>
					<div class="collapsible-header"><i class="material-icons">accessible</i>委员会与席位</div>
					<div class="collapsible-body">
						<?php
							if($reg["type"]=="del"){
								echo "<h6>".$committee["name"]."（".$committee["shortname"]."）</h6><p>席位：".$seat["name"]."</p>";
							}else{
								echo "您申请的身份不是代表，没有委员会和席位可供分配。";
							}
						?>
					</div>
				</li>
				<li>
					<div class="collapsible-header"><i class="material-icons">create</i>学术测试</div>
					<div class="collapsible-body">
						<?php 
						if($reg["state"]==0){
							echo "正在等待分配学测";
						}elseif($reg["state"]>0&&$reg["state"]<=3){
							echo "<a href='/test.php?tid=".$reg["tid"]."' class='btn waves-effect'>查看学测</a>";
						}else{
							echo "您的学测已完成";
						}
						?>
					</div>
				</li>
				<li>
					<div class="collapsible-header"><i class="material-icons">euro_symbol</i>会费</div>
					<div class="collapsible-body">
						<?php
						if($reg["type"]=="del"){
							if($reg["state"]<=7&&$reg["state"]>=2){
								showPayImage();
							}elseif($reg["state"]<2){
								echo "您需要先完成学测。";
							}else{
								echo "您已经缴纳完会费。";
							}
						}else{
							echo "您无需缴纳会费。";
						}
						?>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<a href="/user.php" class="btn waves-effect">返回</a>
			<a href='#ab' class="btn waves-effect modal-trigger right red">取消申请</a>
			<div id="ab" class="modal">
				<div class="modal-content">
					<h4>取消申请</h4>
					<p>您确定要取消申请吗？</p>
				</div>
				<div class="modal-footer">
					<a href="#!" class="modal-close waves-effect btn-flat">返回</a>
					<a href="<?php echo "/actions/cancel_reg.php?rid=$rid"; ?>" class="waves-effect btn-flat">取消申请</a>
				</div>
			</div>
		</div>
	</div>
	</main>
	<?php include("./includes/import_js.php");
	include("./includes/footer.php"); ?>
</body>
</html>