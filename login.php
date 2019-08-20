<!doctype html>
<?php
session_start();
if(isset($_SESSION["uid"])){
	header("location:./index.php");
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>登录 - MFMUN</title>
	<?php include("./includes/import_css.php"); ?>
	<script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
	<script language="javascript">
					window.ttcb = function(res){
						console.log(res);
    					// res（未通过验证）= {ret: 1, ticket: null}
    					// res（验证成功） = {ret: 0, ticket: "String", randstr: "String"}
    					if(res.ret === 0){   // 票据
							document.getElementById("loginform").submit();
						}
					}
	</script>
</head>

<body>
	<?php include("./includes/nav.php"); ?>
	<div class="parallax-container" style="max-height: 300px">
		<div class="section no-pad-bot white-text">
			<div class="container">
				<h1 class="center">登录</h1>
			</div>
		</div>
		<div class="parallax">
			<img src="/img/test.png" />
		</div>
	</div>
	<div class="section grey lighten-4">
		<div class="container">
			<form action="/actions/login.php" method="post" id="loginform">
				<div class="input-field col">
					<input id="user" name="user" class="validate" type="text" />
					<label for="user">用户名/邮箱/手机号</label>
				</div>
				<div class="input-field col">
					<input id="password" name="password" class="validate" type="password" />
					<label for="password">密码</label>
				</div>
			</form>
			<button class="btn waves-effect waves-light" id="TencentCaptcha" data-appid="2075006532" data-cbfn="ttcb"><i class="material-icons right">send</i>登录</button><a class="btn waves-effect waves-light right" href="/join.php"><i class="material-icons right">assignment_ind</i>注册</a>
		</div>
	</div>
	<?php 
	include("./includes/footer.php");
	include("./includes/import_js.php"); 
	?>
</body>
</html>