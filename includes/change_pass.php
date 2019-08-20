<?php
$uid=$_SESSION["uid"];
?>
<div class="section">
	<div class="container">
		<h1>更换密码</h1>
	</div>
</div>
<div class="divider"></div>
<div class="section">
	<div class="container">
		<form action="/actions/change_pass.php" method="post">
			<div class="row">
				<div class="input-field col s12">
					<input placeholder="旧密码" id="oldpass" type="password" class="validate" name="oldpass">
					<label for="oldpass">旧密码</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input placeholder="新密码" id="pass" type="password" class="validate" name="pass">
					<label for="pass">新密码</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input placeholder="重复新密码" id="repass" type="password" class="validate" name="repass">
					<label for="repass">重复新密码</label>
				</div>
			</div>
			<button type="submit" class="btn waves-effect">更换密码</button>
		</form>
	</div>
</div>