	<nav class="light-blue accent-3 z-depth-0 nav-extended">
		<div class="nav-wrapper">
			<a href="/" class="brand-logo">MFMUN</a>
			<a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a class="dropdown-trigger" data-target="reg-dr" href="#">申请参会<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a href="/levelup.php">Level UP!</a></li>
				<li><a href="/about.php">关于</a></li>
					<?php
					if(isset($_SESSION["uid"])){
						$uname=$_SESSION["rname"];
						$uemail=$_SESSION["email"];
						$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $uemail ) ) ) . "?d=" . urlencode( "mp" ) . "&s=" . 128;
						echo "<li><a class='dropdown-trigger' data-target='user-dr' href='#'>你好，$uname<img class='circle' src=$grav_url style='max-width:32px'></img></a></li>";
					}else{
						echo "<li><a class='btn waves-effect amber darken-4' href='/login.php'>登录</a></li><li><a class='btn waves-effect green lighten-4s' href='/join.php'>注册</a></li>";
					}
					?>
			</ul>
		</div>
		<script language="javascript">
	if(typeof(usermode)=="undefined"){
	}else if(usermode==1){
		var tabs="<div class='nav-content'><ul class='tabs tabs-transparent'><li class='tab'><a href='#info'>个人信息</a></li><li class='tab'><a href='#regs'>我的申请</a></li><li class='tab'><a href='#changepass'>修改密码</a></li><li class='tab'><a href='#logout'>登出</a></li></ul></div>";
		document.write(tabs);
	}
</script>
	</nav>
	<ul class="sidenav" id="mobile-nav">
		<?php
			if(isset($_SESSION["uid"])){
				echo "<li><div class='user-view'>
      <div class='background'>
        <img src='/img/user_banner.jpg' style='max-width:300px; max-height:160px'>
      </div>
      <a href='/user.php'><img class='circle' src=$grav_url></a>
      <a href='/user.php'><span class='white-text name'>$uname</span></a>
      <a href='/user.php'><span class='white-text email'>$uemail</span></a>
    </div></li>";
			}else{
				echo "<li><a class='btn wave-effects amber darken-4' href='/login.php'>登录</a></li><li><a class='btn wave-effects green lighten-4s' href='/join.php'>注册</a></li>";
			}
		?>
		<li><div class="divider"></div></li>
		<li><a class="subheader">申请参会</a></li>
		<li><a href="/reg.php?type=delegate">代表</a></li>
		<li><a href="/reg.php?type=acteam">学术团队</a></li>
		<li><a href="/reg.php?type=volunteer">志愿者</a></li>
		<li><div class="divider"></div></li>
		<li><a class="subheader">关于MFMUN</a></li>
		<li><a href="/levelup.php">Level UP!</a></li>
		<li><a href="/about.php">关于</a></li>
	</ul>
	<ul id="user-dr" class="dropdown-content light-blue accent-3">
		<li><a href="/user.php" class="white-text">我的</a></li>
		<li><a href="/logout.php" class="white-text">登出</a></li>
	</ul>
	<ul id="reg-dr" class="dropdown-content light-blue accent-3">
		<li><a href="/reg.php?type=delegate" class="white-text">代表</a></li>
		<li><a href="/reg.php?type=acteam" class="white-text">学术团队</a></li>
		<li><a href="/reg.php?type=volunteer" class="white-text">志愿者</a></li>
	</ul>

