<?php
$uid=$_SESSION["uid"];
$resault_checkinfo=mysqli_query($con,"SELECT * FROM `user` WHERE `uid`=$uid;");
$user_info=mysqli_fetch_array($resault_checkinfo);
?>
<div class="section">
	<div class="container">
		<h1>个人信息</h1>
	</div>
	<div class="container">
		<div class="user-view">
			<div class="row">
				<img class="circle col m6 s12 modal-trigger" src="<?php echo $grav_url; ?>" href="#changeAva" style="max-width: 96px"></img>
				<h3 class="col m6 s12"><?php echo $user_info["name"]; ?>（<?php echo $user_info["real_name"]; ?>）</h3>
			</div>
			<div class="modal" id="changeAva">
				<div class="modal-content">
					<h4>更换头像</h4>
					<p>MFMUN使用了Gravatar头像库进行头像服务。<br />Gravatar是一个全球公认的头像存储网站，它的原理是将头像与邮箱绑定，这样无论使用哪个网站都无需单独设置头像而只需根据邮箱从Gravatar调取。如果您想要更换头像，请进入Gravatar并使用您当前邮箱注册并设置头像。</p>
				</div>
				<div class="modal-footer">
					<a href="#" class="modal-close waves-effect waves-green btn-flat">取消</a>
					<a href="https://cn.gravatar.com" class="modal-close waves-effect waves-green btn-flat">去Gravatar更换头像</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="divider"></div>
<div class="section">
	<div class="container">
		<form action="/actions/update_info.php" method="post">
			<div class="row">
				<div class="input-field col s6">
					<input placeholder="姓名" id="real_name" type="text" class="validate" value="<?php echo $user_info["real_name"]; ?>" name="real_name">
					<label for="real_name">姓名</label>
				</div>
				<div class="input-field col s6">
					<input placeholder="学校" id="school" type="text" class="validate" value="<?php echo $user_info["school"]; ?>" name="school">
					<label for="school">学校</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input placeholder="邮箱" id="email" type="email" class="validate" value="<?php echo $user_info["email"]; ?>" name="email">
					<label for="email">邮箱</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input placeholder="手机号码" id="phone" type="tel" class="validate" value="<?php echo $user_info["phone"]; ?>" name="phone">
					<label for="phone">手机号码</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input placeholder="QQ号码" id="qq" type="tel" class="validate" value="<?php echo $user_info["qq"]; ?>" name="qq">
					<label for="qq">QQ号码</label>
				</div>
			</div>
			<button type="submit" class="btn waves-effect">更新</button>
		</form>
	</div>
</div>