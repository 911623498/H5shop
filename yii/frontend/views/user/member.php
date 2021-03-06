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
	</head>
	<body style="background: #f6f6f6;">
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="step.html" class="">
					<img src="style/images/step.png" width="26" style="margin-top: 1px;"/>
				</a>
			</div>
			<h1 class="am-header-title">
  	            <a href="" class="">个人中心</a>
            </h1>
            <div class="am-header-right am-header-nav">
			    <a href="" class="">
			    	<i class="am-icon-comment-o" style="font-size: 20px;"></i>
		        </a>
			</div>
	    </header>
	    <div style="height: 49px;"></div>
	    <div class="member">
	    	<div class="mem-tit">15078921546 
	    		<a href="index.php?r=user/sys" class="step"><img src="style/images/step.png" width="26"/></a>
	    	</div>
	    	<div class="mem-pic">
		    	<div class="mem-pic-bg" style="background-image: url(images/memtx.png);"></div>
		    	<a href="" class="men-level">√普通会员</a>
	    	</div>
	    	<ul class="member-menu">
			<li>
				<a href="index.php?r=user/money">
					<p class="yellow">0</p>
					<p class="black">帐户余额 </p>
				</a>
			</li>
            <li>
				<a href="integral.html">
					<p class="yellow">0</p>
					<p class="black">积分 </p>
				</a>
			</li>
			<li>
				<a href="yhq.html">
					<p class="yellow">0</p>
					<p class="black">优惠劵 </p>
				</a>
			</li>
			<li>
				<a href="collect.html">
					<p class="yellow">0</p>
					<p class="black">我的收藏 </p>
				</a>
			</li>
		</ul>
	    </div>
	    <div class="user-list">
		  	<div class="u-list-main">
		  		<img src="style/images/order-pic.png" width="27" />
		  		<span>我的购物订单</span>
		  		<a href="allorder.html">查看全部订单></a>
		  	</div>
		    <ul class="user-nav">
		    	<li><a href="allorder.html"> <img src="style/images/1-icon.png"> <p>待付款</p></a></li>
		    	<li><a href="allorder.html"> <img src="style/images/1-icon1.png"> <p>待收货</p></a></li>
		    	<li><a href="allorder.html"> <img src="style/images/1-icon2.png"> <p>待评价</p></a></li>
		    	<li><a href="allorder.html"> <img src="style/images/1-icon3.png"> <p>退换货</p></a></li>
		    </ul>
		    <div class="u-list-main">
		  		<img src="style/images/order-my.png" width="27" />
		  		<span>帐户与安全</span>
		  	</div>
		    <ul class="user-nav">
		    	<li><a href="infor.html"> <img src="style/images/1-icon4.png"> <p>个人资料</p></a></li>
		    	<li><a href="gladdress.html"> <img src="style/images/1-icon5.png"> <p>收货地址</p></a></li>
		    	<li><a href="index.php?r=user/aecurity"> <img src="style/images/1-icon6.png"> <p>安全设置</p></a></li>
		    	<li><a href="money.html"> <img src="style/images/1-icon7.png"> <p>我的钱包</p></a></li>
		    </ul>
	    </div>
	    <!--导航-->
 <ul class="sq-nav" style=" background: #fff; margin-top: 1rem; border-top: 1px solid #ddd;  border-bottom: 1px solid #ddd;">
      <li>
        <div class="am-gallery-item">
            <a href="myallchips.html" class="">
              <img src="style/images/icon4.png" />
              <p>我的众筹</p>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="mywhite.html" class="">
              <img src="style/images/icon5.png" />
              <p>我的白条</p>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="?r=spec/shop_list" class="">
              <img src="style/images/icon2.png" />
              <p>我的预定</p>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="index.php?r=user/login_out" class="">
              <img src="style/images/icon8.png" />
              <p>安全退出</p>
            </a>
        </div>
      </li>
      </ul>
      </div>
       <!--底部-->
        <?php use yii\widgets\ActiveForm;?>
        <?php $form = ActiveForm::begin(); ?>
        <?php $this->beginContent('@frontend/views/index/pub.php')?>
        <?php $this->endContent();?>
        <?php ActiveForm::end(); ?>







        <script src="style/js/jquery.min.js"></script>
<script src="style/js/amazeui.min.js"></script>
	</body>
</html>
