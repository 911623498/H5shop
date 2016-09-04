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
        <link rel="icon" type="image/png" href="style/theme/default/images/favicon.png">
		<link href="style/css/amazeui.min.css" rel="stylesheet" type="text/css" />
		<link href="style/css/style.css" rel="stylesheet" type="text/css" />
		<link href="style/css/check.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
			<h1 class="am-header-title">
  	            <a href="" class="">修改密码</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <input type="password" name="mobile" placeholder="请输入旧密码" id="old_pwd" class="login-password">
	    <input type="password" name="mobile" placeholder="请输入新密码" id="new_pwd"  class="login-password">
	    <input type="password" name="mobile" placeholder="请再次输入新密码" id="two_pwd" class="login-name">
        <p style="margin-left:75px;" id="msg"></p>
	    <input type="button" class="login-btn" value="确认">
	</body>
</html>
<script src="style/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(".login-btn").click(function(){
        var old_pwd = $("#old_pwd").val();
        var new_pwd = $("#new_pwd").val();
        var two_pwd = $("#two_pwd").val();

        var sign = true;
        if(old_pwd==""){
            $("#msg").html("<font color='red'>请输入旧密码</font>");
            sign = false;
        }else if(new_pwd==""){
            $("#msg").html("<font color='red'>请输入新密码</font>");
            sign = false;
        }else if(two_pwd==""){
            $("#msg").html("<font color='red'>请输入确认密码</font>");
            sign = false;
        }else if( new_pwd != two_pwd ){
            $("#msg").html("<font color='red'>确认密码不一致</font>");
            sign = false;
        }else{
            $("#msg").html("<font color='red'></font>");
            sign = true;
        }
        if(sign == true){
            $.ajax({
                type:'POST',
                url:'index.php?r=user/pwd',
                data:{
                    old_pwd:old_pwd,
                    new_pwd:new_pwd
                },
                success: function (reponsmsg) {
//                    alert(reponsmsg)
//                    return;
                    var data = eval("("+reponsmsg+")");
                    if(data.status==0){
                        $("#msg").html("<font color='blue'>"+data.msg+"</font>");
                        alert('修改成功 请重新登录');
                        location.href='index.php?r=user/index';
                    }else{
                        $("#msg").html("<font color='red'>"+data.msg+"</font>");
                    }
                }

            })
        }


    })
</script>
