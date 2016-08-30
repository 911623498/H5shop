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
		<script src="style/js/time.js"></script>
		<style>
			.integral-table li span{ width: 33%;}
		</style>
	</head>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
			<h1 class="am-header-title">
  	            <a href="" class="">消费记录</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <div class="whitebar">
	    	<h2>当前余额：500</h2>
	    	<div class="xfmx"><span>消费明细</span></div>
	    	 <ul class="integral-table">
			             	<li class="tit">
			             		<span>时间</span>
			             		<span> 收入/支出</span>
			             		<span>说明</span>
			             	</li>
			             	<li class="for">
			             		<span>2016-01-02</span>
			             		<span>-200 </span>
			             		<span>兑换了一个手机</span>
			             	</li>
			</ul>
            <div class="xfmx" style="margin-top: 20px;"><span>在线充值</span></div>
            <input type="password" placeholder="金额" class="login-password">
            <div class="pay-style" style="padding-bottom: 0;">
		    	<label class="am-radio am-warning">
	                <input type="radio" name="radio3" value="" data-am-ucheck="" checked="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 支付宝
	            </label>
	            <label class="am-radio am-warning" style="margin-top: 10px;">
	                <input type="radio" name="radio3" value="" data-am-ucheck="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 微信
	            </label>
	        </div>
            <input type="button" class="login-btn" value="确定">
	    </div>
	    <!--底部-->
 <div style="height: 55px;"></div>
 <div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default sq-foot am-no-layout" id="">
      <ul class="am-navbar-nav am-cf am-avg-sm-4">   
          <li>
            <a href="index.html" class="curr">
                <span class="am-icon-home"></span>
                <span class="am-navbar-label">首页</span>
            </a>
          </li>
          <li>
            <a href="category.html" class="">
                <span class="am-icon-th-large"></span>
                <span class="am-navbar-label">分类</span>
            </a>
          </li>
       
          <li>
            <a href="shopcart.html" class="">
                <span class="am-icon-shopping-cart"></span>
                <span class="am-navbar-label">购物车</span>
            </a>
          </li>
          <li>
            <a href="login.html" class="">
                <span class="am-icon-user"></span>
                <span class="am-navbar-label">我的55</span>
            </a>
          </li>
      </ul>
</div>
<script>
	//购物数量加减
	$(function(){
		$('.increase').click(function(){
			var self = $(this);
			var current_num = parseInt(self.siblings('input').val());
			current_num += 1;
			self.siblings('input').val(current_num);
			update_item(self.siblings('input').data('item-id'));
		})		
		$('.decrease').click(function(){
			var self = $(this);
			var current_num = parseInt(self.siblings('input').val());
			if(current_num > 1){
				current_num -= 1;
				self.siblings('input').val(current_num);
				update_item(self.siblings('input').data('item-id'));
			}
		})
	})
</script>

	    <script src="style/js/jquery.min.js"></script>
        <script src="style/js/amazeui.min.js"></script>
	</body>
</html>
