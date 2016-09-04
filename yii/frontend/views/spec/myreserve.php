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
		<script src="style/js/jquery-1.10.2.min.js"></script>
		
	</head>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
			<h1 class="am-header-title">
  	            <a href="" class="">我要预定</a>
            </h1>
	    </header>
        <input type="hidden" value="<?php echo $id ?>" name="id" id="g_id"/>
        <input type="hidden" value="<?php echo $money ?>" name="money" id="money"/>

        <div style="height: 49px;"></div>
	    <div class="whitebar">
	    <div data-am-widget="tabs" class="am-tabs am-tabs-d2">
			      <ul class="am-tabs-nav am-cf" style="position: fixed; top: 49px;">
			          <li class="am-active"><a href="[data-tab-panel-0]/index.html">我要预定</a></li>
			          <li class=""><a href="[data-tab-panel-1]/index.html">采购建议</a></li>
			      </ul>
			      <div style="height: 49px;"></div>
			      <div class="am-tabs-bd">
			          <div data-tab-panel-0 class="am-tab-panel am-active">
                          <form action="">
                           <div class="intergral">
						    	<input type="text"  placeholder="请输入姓名" id="u_name" onblur="u_na()" class="login-password">
						    	<input type="text"  placeholder="请输入电话" id="phone" onblur="u_phone()" class="login-name">
						    	<input type="text"  placeholder="请输入地址" id="pos" class="login-password">
                              <textarea name="teraContent" id="teraContent"  placeholder="备注说明" class="integ-text" onkeydown ="CheckWorkCount(this.form.teraContent,this.form.remain);"  onKeyUp="CheckWorkCount(this.form.teraContent,this.form.remain);"></textarea>
                               <input type="button" id="check" class="login-name"   name="remain"  value="您可以输入200/个字" >
                               <input type="text"  id="moneys" placeholder="预付金额" class="login-password" onblur="mon()" >
                               <input name="_csrf" type="hidden"id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                               <input type="button" class="login-btn" value="立即预定" onclick="sub()">
						    </div>
                          </form>
			          </div>
			          <div data-tab-panel-1 class="am-tab-panel ">
			              <div class="intergral">
						    	<input type="text"  placeholder="请输入昵称" class="login-password">
						    	<textarea placeholder="您有好的采购建议请给我们留言！" class="integ-text"></textarea>
						    	<div class="yzm" style="margin-top: 1.5rem;">
						    		<input type="text" class="reg-yzm" />
						    		<img src="style/images/yzm.png" class="yzmimg" />
						    	</div>
						        <input type="button" class="login-btn" value="提交留言">
						  </div>
			          </div>
			      </div>
        </div>
	   </div>
	  
	 

<script src="style/js/jquery.min.js"></script>
<script src="style/js/amazeui.min.js"></script>
	</body>
</html>

<script type="text/javascript">

    sign=0;
    function u_na()
    {
        var u_name=$("#u_name").val();

        var   reg = /^[\u4E00-\u9FA5]{2,4}$/;
        var res=reg.test(u_name);
            //alert(res);
        if(res==false)
        {
            $("#u_name").val("");
            $("#u_name").attr('placeholder','请输入二~四个汉字');
            sign=0;
        }
        else
        {
            sign=1;
        }


    }

  function u_phone()
  {
      var u_name=$("#phone").val();
      //(u_name);
      var   reg = /^\d{6,11}$/;
      var   res=reg.test(u_name);

      if(res==false)
      {
          $("#phone").val("");
          $("#phone").attr('placeholder','联系电话：6~11位数字');
          sign=0;
      }
      else
      {
          sign=1;
      }

  }

    function CheckWorkCount(message, remain)
    {
        var max;
        max = 200;
        if (message.value.length > max) {
            message.value = message.value.substring(0,max);
            remain.value = 0;
            sign=0;
            remain.value = "不能超过"+200+"个字!";

        }
        else {
            remain.value = "您还可以输入"+(max-message.value.length)+"/个字";
            sign=1;
        }
    }

        function mon()
        {

          var money=$("#moneys").val();
           var reg=/^\d+$/;
            var   res=reg.test(money);
            var   new_money=$("#money").val();
            //alert(new_money);

            if(res==false)
            {
                $("#moneys").val("");
                $("#moneys").attr('placeholder','请正确输入预售金额');
                sign=0;
            }
            else if(money<new_money)
            {
                $("#moneys").val("");
                $("#moneys").attr('placeholder','请预付商品金额50%');
                sign=0;
            }
            else
            {
                sign=1;
            }
        }

    function sub()
    {
       if(sign!=1)
       {
           $("#check").val("请完善您的个人信息");

       }
        else
       {
           var csrfToken = $("#_csrf").val();
           var u_name=$("#u_name").val();
           var phones=$("#phone").val();
           var moneys=$("#moneys").val();
           var poss=$("#pos").val();
           var areas=$("#teraContent").val();
           var   new_money=$("#money").val();
           var id=$("#g_id").val();
           $.ajax({
               type: "POST",
               url: "?r=spec/add_shop",
               data: "u_name="+u_name+"&phones="+phones+"&moneys="+moneys+"&poss="+poss+"&areas="+areas+"&new_money="+new_money+"&_csrf="+csrfToken+"&goods_id="+id,
               success: function(msg){
                   if(msg==0)
                   {
                       alert('预订成功，请等候通知！');
                       location.href='?r=spec/copshop';
                   }
               }
           });
       }
    }

</script>