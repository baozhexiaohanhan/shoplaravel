<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>品优购，欢迎登录</title>

    <link rel="stylesheet" type="text/css" href="/static/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-login.css" />
</head>

<body>
<<<<<<< HEAD
	<div class="login-box">
		<div class="loginArea">
			<div class="py-container login">
				<div class="loginform">
					<ul class="sui-nav nav-tabs tab-wraped">
						<li>
							<a href="#index" data-toggle="tab">
								<h3>扫描登录</h3>
							</a>
						</li>
						<li class="active">
							<a href="#profile" data-toggle="tab">
								<h3>账户登录</h3>
							</a>
						</li>
					</ul>
					<div class="tab-content tab-wraped">
						<div id="index" class="tab-pane">
							<p>二维码登录，暂为官网二维码</p>
							<img src="/static/img/wx_cz.jpg" />
						</div>
=======
<h1>登录页面</h1>
		<!--loginArea-->
>>>>>>> ce5879cf50b717a1e5741dda0ee01e011ef128d1
						<div id="profile" class="tab-pane  active">
							<form class="sui-form">
								<div ><span class="add-on loginname"></span>
									<input id="prependedInput" type="text" placeholder="邮箱/用户名/手机号" name="admin_tel">
								</div>
								<div><span class="add-on loginpwd"></span>
									<input id="prependedInput" type="password" placeholder="请输入密码" name="admin_pwd">
								</div>
			
								<div class="logined">
									<a class=" btn-danger" id="bin-aa" type="button" >登&nbsp;&nbsp;录</a>
								</div>
							</form>
<<<<<<< HEAD
							<div class="otherlogin">
								<span class="register"><a href="register" target="_blank">立即注册</a></span>
=======

>>>>>>> ce5879cf50b717a1e5741dda0ee01e011ef128d1
							</div>
						</div>
				</div>
<<<<<<< HEAD
			</div>
		</div>
	</div>
=======
		<!--foot-->
>>>>>>> ce5879cf50b717a1e5741dda0ee01e011ef128d1

<script type="text/javascript" src="/static/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/static/js/pages/login.js"></script>
</body>

</html>
<script type="text/javascript">
	 $(document).on('click','#bin-aa',function(){
	 	var admin_tel = $('input[name="admin_tel"]').val();
	 	var admin_pwd = $('input[name="admin_pwd"]').val();
	 	$.post('/login/logindo',{admin_tel:admin_tel,admin_pwd:admin_pwd},function (result) {
            if(result.code=='00001'){
                alert(result.msg);
            }
            if(result.code=='00002'){
                alert(result.msg);
            }
            if(result.code=='00003'){
            	alert(result,msg);
            }
            if(result.code=='00000'){
                alert('登录成功');
            }
        },'json')

	 })
</script>