<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>个人注册</title>


    <link rel="stylesheet" type="text/css" href="/static/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-register.css" />
</head>

<<<<<<< HEAD
<body>
	<div class="register py-container ">
		<div class="registerArea">
			<h3>注册新用户<span class="go">我有账号，去<a href="login" target="_blank">登陆</a></span></h3>
			<div class="info">
				<form class="sui-form form-horizontal" action="{{url('/login/store')}}" method="POST">
=======
		<!--head-->
	<h1>注册</h1>
		<!--register-->
				<form  action="{{url('/login/store')}}" method="POST">
>>>>>>> ce5879cf50b717a1e5741dda0ee01e011ef128d1
					<div class="control-group">
						<label class="control-label">用户名：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的用户名"  name="admin_name" class="input-xfat input-xlarge">
							   <div><span class="pass1"></span></div>
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">密码：</label>
						<div class="controls">
							<input type="password" placeholder="设置登录密码" name="admin_pwd" class="input-xfat input-xlarge">
							   <div><span class="pass2"></span></div>
						</div>
					</div>
			
					<div class="control-group">
						<label for="inputPassword" class="control-label">确认密码：</label>
						<div class="controls">
							<input type="password" placeholder="再次确认密码" name="admin_pwds" class="input-xfat input-xlarge">
							<div><span class="pass3"></span></div>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">邮箱</label>
						<div class="controls">
							<input type="text" placeholder="邮箱"  name="admin_email" class="input-xfat input-xlarge">
							   <div><span class="pass1"></span></div>
						</div>
					</div>
<<<<<<< HEAD
						<div class="control-group">
						<label class="control-label">邮箱</label>
						<div class="controls">
							<input type="text" placeholder="邮箱"  name="admin_email" class="input-xfat input-xlarge">
							   <div><span class="pass4"></span></div>
						</div>
					</div>
=======

>>>>>>> ce5879cf50b717a1e5741dda0ee01e011ef128d1
					<div class="control-group">
						<label class="control-label">手机号：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的手机号" name="admin_tel" class="input-xfat input-xlarge">
						</div>
					</div>	
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls btn-reg">
							<imput class=" btn-danger"  id="btn-s" type="button" target="_blank">完成注册
						</div>
					</div>
				</form>
<<<<<<< HEAD
			</div>
		</div>
	</div>
=======
				<div class="clearfix"></div>
		<!--foot-->
>>>>>>> ce5879cf50b717a1e5741dda0ee01e011ef128d1



<script type="text/javascript" src="/static/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/static/js/pages/register.js"></script>
<script type="text/javascript">
	   $(document).on('blur','input[name="admin_name"]',function(){
        var _this = $(this);
        var admin_name = _this.val();
        if(admin_name==""){
            $(".pass1").css('color','red').html("用户名不能为空");
        }else{
            $(".pass1").css('color','green').html("已填写");   
        }
    })

     $(document).on('blur','input[name="admin_pwd"]',function(){
        var _this = $(this);
        var admin_pwd = _this.val();
        if(admin_pwd==""){
            $(".pass2").css('color','red').html("密码不能为空");
        }else{
            $(".pass2").css('color','green').html("已填写");   
        }
    })

        $(document).on('blur','input[name="admin_pwds"]',function(){
        var _this = $(this);
        var admin_pwds = _this.val();
        if(admin_pwds==""){
            $(".pass3").css('color','red').html("确认密码密码不能为空");
        }else{
            $(".pass3").css('color','green').html("已填写");   
        }
    })

       $(document).on('blur','input[name="admin_email"]',function(){
        var _this = $(this);
        var admin_email = _this.val();
        if(admin_email==""){
            $(".pass4").css('color','red').html("邮箱不能为空");
        }else{
            $(".pass4").css('color','green').html("已填写");   
        }
    })


        $('#getcode').click(function(){
        	var mobile = $('input[name="admin_tel"]').val();
        	var reg = /^1[3|5|6|7|8|9]\d{9}$/;
        	if(reg.test(mobile)){
        		$.get('/getcode',{mobile:mobile},function(res){
        		if(res.code==0){
        			alert('发送成功');
        		}else{
        			alert('发送失败');
        		}
        	},'json')
        	}else{
        		alert('请输入正确的手机号！！！');
        	}
        })

        $(document).on('click','.btn-danger',function(){
        	
        	var admin_name = $('input[name="admin_name"]').val();
        	var admin_pwd = $('input[name="admin_pwd"]').val();
        	var admin_pwds = $('input[name="admin_pwds"]').val();
        	var admin_tel = $('input[name="admin_tel"]').val();
<<<<<<< HEAD
        	var admin_email = $('input[name="admin_email"]').val();
        	var code = $('input[name="code"]').val();
        	 $.post('/login/store',{admin_name:admin_name,admin_pwd:admin_pwd,admin_pwds:admin_pwds,admin_tel:admin_tel,admin_email:admin_email,code:code},function (result) {
=======
			var admin_email = $('input[name="admin_email"]').val();
        	$.post('/login/registerdo',{admin_name:admin_name,admin_pwd:admin_pwd,admin_pwds:admin_pwds,admin_tel:admin_tel,admin_email:admin_email},function (result) {
>>>>>>> ce5879cf50b717a1e5741dda0ee01e011ef128d1
            if(result.code=='00001'){
                alert(result.msg);
            }
            if(result.code=='00000'){
                location.href = "/login"
            }else{
                alert(result.msg);
            }
        },'json')

        })


</script>
</html>

