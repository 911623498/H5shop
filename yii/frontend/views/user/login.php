<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>55社区</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="icon" type="style/image/png" href="style/theme/default/images/favicon.png">
		<link href="style/css/amazeui.min.css" rel="stylesheet" type="text/css" />
		<link href="style/css/style.css" rel="stylesheet" type="text/css" />
		<script src="style/js/time.js"></script>
	</head>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
			<h1 class="am-header-title">
  	            <a href="" class="">登录</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <div class="login-logo">
	    	<img src="style/images/logo.png" />
	    </div>
	    <input type="text" name="mobile" id="mobile" placeholder="请输入用户名/手机号" class="login-name">
	    <input type="password" name="password" id="password" placeholder="请输入密码" class="login-password">
        <p style="margin-left:75px;" id="msg"></p>
	    <input type="button" class="login-btn" value="我要登录">
	    <input type="button" class="reg-btn" value="我要注册">
	    <div class="agree">
	    	<a href="forgetpassword.html" class="forget">忘记密码？</a>
	    </div>
	</body>
</html>
<script src="style/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(".login-btn").click(function(){
        var sign = true;
        var userName = $("#mobile").val();
        var password = $("#password").val();

        var mreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;

        if(userName == ""){
            $("#mobile").attr('placeholder',"用户名不能为空");
            sign = false;
        }else if(!mreg.test(userName)) {
            $("#mobile").val('');
            $("#mobile").attr('placeholder',"邮箱格式不正确");
            sign = false;
        }
        if(password == ""){
            $("#password").attr('placeholder',"密码不能为空");
            sign = false;
        }
        if(sign == true){
            $.ajax({
                type:'POST',
                url:'index.php?r=user/login_ok',
                data:{
                    userName:userName,
                    password:password
            },
            success: function (reponsmsg) {
                // alert(reponsmsg);
                // return;
                var data = eval("("+reponsmsg+")");
                // alert(data);
                // return;
                if(data.status==0){
                    $("#msg").html("<font color='blue'>"+data.msg+"</font>");
                    window.location.reload();
                }else{
                    $("#msg").html("<font color='red'>"+data.msg+"</font>");
                }
            }

        })
        }
    })
</script>
