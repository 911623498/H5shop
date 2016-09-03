<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理-有点</title>
<link rel="stylesheet" type="text/css" href="{{URL::asset('')}}style/css/css.css" />
<script type="text/javascript" src="{{URL::asset('')}}style/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="{{URL::asset('')}}style/img/coin02.png" /><span><a href="{{url('index/index')}}">首页</a>&nbsp;-&nbsp;-</span>&nbsp;企业管理
			</div>
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform">
					<form action="{{url('Shop/shoptianjia')}}" onsubmit="return shopadd()" enctype="multipart/form-data" method="post">
						<div class="cfD">
							店铺名称:<input style="margin-top: 20px;margin-left: 30px;width: 300px" name="shop_name" onblur="yan_name()" id="shop_name" class="userinput" type="text" placeholder="店铺名称" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="shop_names" style="color: red;"></span><br/>
                            店铺log: <input type="file" onblur="yan_img()" style="margin-top: 20px;margin-left: 30px" name="shop_img" id="shop_img" /><span id="shop_imgs" style="color: red;"></span><br/>
                            店铺描述:<input style="margin-top: 20px;margin-left: 30px;width: 300px" onblur="yan_desc()" name="shop_desc" id="shop_desc" class="userinput vpr" type="text" placeholder="店铺描述" /><span id="shop_descs" style="color: red;"></span><br/>
                            店铺url: <input style="margin-top: 20px;margin-left: 35px;width: 300px" name="shop_url"id="shop_url" class="userinput vpr" onblur="yan_url()" type="text" placeholder="店铺url" /><span id="shop_urls" style="color: red;"></span><br/>
                            <button   style="margin-top: 30px;margin-left: 100px" class="userbtn">添加</button>
						</div>
					</form>
				</div>
			</div>
			<!-- user页面样式end -->
		</div>

	</div>
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
function yan_name(){
    var shop_name=$("#shop_name").val();
    if(shop_name=="")
    {
        $("#shop_names").html("店铺名称不可为空");
    }else
    {
        var data={"shop_name":shop_name};
        var url="{{url('Shop/shopweiyi')}}";
        $.get(url,data,function(msg){
            if(msg==1)
            {
                $("#shop_names").html("店铺名称已存在，请重新输入");
                return false;
            }else
            {
                $("#shop_names").html("");
            }
        })
    }
}
function yan_img(){
    var shop_img=$("#shop_img").val();
    if(shop_img=="")
    {
        $("#shop_imgs").html("请选择店铺log");
    }else
    {
        $("#shop_imgs").html("");
    }
}
function yan_desc(){
    var shop_desc=$("#shop_desc").val();
    if(shop_desc=="")
    {
        $("#shop_descs").html("店铺描述不可为空");
    }else
    {
        $("#shop_descs").html("");
    }
}
function yan_url(){
    var shop_url=$("#shop_url").val();
    if(shop_url=="")
    {
        $("#shop_urls").html("店铺url不可为空");
    }else
    {
        $("#shop_urls").html("");
    }
}
var rst = false;
function shopadd() {
    var shop_name=$("#shop_name").val();
    var shop_img=$("#shop_img").val();
    var shop_desc=$("#shop_desc").val();
    var shop_url=$("#shop_url").val();
    if(shop_name=="")
    {
        $("#shop_names").html("店铺名称不可为空");
        return false;
    }else if(shop_img=="")
    {
        $("#shop_imgs").html("请选择店铺log");
        return false;
    }else if(shop_desc=="")
    {
        $("#shop_descs").html("店铺描述不可为空");
        return false;
    }else if(shop_url=="")
    {
        $("#shop_urls").html("店铺url不可为空");
        return false;
    }else{
        $.ajax({
            url: "{{url('Shop/shopweiyi')}}",
            type: "POST",
            data: "shop_name=" +shop_name,
            dataType: "text",
            async: false,
            success: function (result) {
                if (result == 1) {
                    $("#shop_names").html("店铺名称已存在，请重新输入");
                }else{
                    rst=true;
                }
            },
            error: function () {
                alert("发生错误");
            }
        });
        return rst;
    }

}
</script>
</html>