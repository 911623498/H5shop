<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>超级返</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="icon" type="style/image/png" href="theme/default/images/favicon.png">
		<link href="style/css/amazeui.min.css" rel="stylesheet" type="text/css" />
		<link href="style/css/style.css" rel="stylesheet" type="text/css" />
		<script src="style/js/jquery-1.10.2.min.js"></script>
		<script src="style/js/time.js"></script>
		<script>
                    $(function () {
                        var elm = $('#shortbar');
                        var startPos = $(elm).offset().top;
                        $.event.add(window, "scroll", function () {
                            var p = $(window).scrollTop();
                            if (p > startPos) {
                                elm.addClass('sortbar-fixed');
                            } else {
                                elm.removeClass('sortbar-fixed');
                            }
                        });
                    });

		</script>
	</head>
	<body>
<!--图片轮换-->
<div class="am-slider am-slider-default" data-am-flexslider id="demo-slider-0" style="position: relative;">
	<header data-am-widget="header" class="am-header am-header-default tm-head" id="shortbar" >
			<div class="am-header-left am-header-nav">
		        <a href="city.html" class="">
			        <img src="style/images/city.png" />
			        <p style="font-size: 12px; margin-top: -35px;">南昌</p>
			    </a>
		   </div>
			<h1 class="am-header-title1">
		        <div class="search-box">
		           <input type="text" name="title" class="index-search" placeholder="寻找你喜欢的商品......" />
		           <input type="submit" value="" class="search-icon" /> 
		        </div>
		    </h1>
			<div class="am-header-right am-header-nav">
			    
			    <a href="" class="">
		           <img src="style/images/sao.png" />
		           <p style="font-size: 12px; margin-top: -35px;">扫一扫</p>
		        </a>
			</div>
        </header>
  <ul class="am-slides">
    <li><img src="style/images/banner1.png" /></li>
    <li><img src="style/images/banner1.png" /></li>
  </ul>
</div>
<!--导航-->
 <ul class="sq-nav"  >
      <li>
        <div class="am-gallery-item">
            <a href="index.php?r=spec/newshop" class="">
              <img src="style/images/icon.png" />
              <p>新品</p>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="index.php?r=spec/index" class="">
              <img src="style/images/icon1.png" />
              <p>特价</p>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="index.php?r=spec/copshop" class="">
              <img src="style/images/icon2.png" />
              <p>预定</p>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="index.php?r=inte/index" class="">
              <img src="style/images/icon3.png" />
              <p>积分</p>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="index.php?r=all/index" class="">
              <img src="style/images/icon4.png" />
              <p>众筹</p>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="whitebar.html" class="">
              <img src="style/images/icon5.png" />
              <p>白条</p>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="news.html" class="">
              <img src="style/images/icon6.png" />
              <p>头条</p>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="index.php?r=cate/index" class="">
              <img src="style/images/icon7.png" />
              <p>分类</p>
            </a>
        </div>
      </li>
  </ul>
 <!--限时秒杀 -->
 <div class="sq-title">
 	<i class="am-icon-volume-up"></i>
 	<div class="fnTimeCountDown" data-end="2018/07/08 18:45:13">
                   限时秒杀：距开抢 
        <span class="hour">00</span>
        <strong>:</strong>
        <span class="mini">00</span>
        <strong>:</strong>
        <span class="sec">00</span>
    </div>
    <script type="text/javascript">
    $(".fnTimeCountDown").fnTimeCountDown("2018/07/08 18:45:13");
    </script>
 </div>
  <ul data-am-widget="gallery" class="am-gallery pro-list am-avg-sm-3 am-avg-md-3 am-avg-lg-4 am-gallery-default"  >
      <li>
        <div class="am-gallery-item">
            <a href="index.php?r=list/index" class="">
              <img src="style/images/test.png" />
                <h3 class="am-gallery-title">猪骨头棒新鲜生鲜肉制品猪大骨头筒骨熬汤佳品500g</h3>
                <div class="am-gallery-desc">￥52</div>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="detail.html" class="">
              <img src="style/images/test1.png" />
                <h3 class="am-gallery-title">冻品批发大江鸡腿 冷鲜鸡腿放心食材1kg 冷冻食材</h3>
                <div class="am-gallery-desc">￥39</div>
            </a>
        </div>
      </li>
        <li>
        <div class="am-gallery-item">
            <a href="detail.html" class="">
              <img src="style/images/test2.png" />
                <h3 class="am-gallery-title">法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮</h3>
                <div class="am-gallery-desc">￥45.8</div>
            </a>
        </div>
      </li>
  </ul>
 <!-- 特色专区-->
  <div class="sq-title">
 	<img src="style/images/ts.png" width="24"/>
 	特色专区
 </div>
  <ul data-am-widget="gallery" class="am-gallery pro-list am-avg-sm-3 am-avg-md-3 am-avg-lg-4 am-gallery-default"  >
      <li>
        <div class="am-gallery-item">
            <a href="index.php?r=list/index" class="">
              <img src="style/images/test3.png" />
                <h3 class="am-gallery-title">猪骨头棒新鲜生鲜肉制品猪大骨头筒骨熬汤佳品500g</h3>
                <div class="am-gallery-desc">￥52</div>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="detail.html" class="">
              <img src="style/images/test4.png" />
                <h3 class="am-gallery-title">冻品批发大江鸡腿 冷鲜鸡腿放心食材1kg 冷冻食材</h3>
                <div class="am-gallery-desc">￥39</div>
            </a>
        </div>
      </li>
        <li>
        <div class="am-gallery-item">
            <a href="detail.html" class="">
              <img src="style/images/test5.png" />
                <h3 class="am-gallery-title">法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮</h3>
                <div class="am-gallery-desc">￥45.8</div>
            </a>
        </div>
      </li>
  </ul>
  <!-- 精品专区-->
  <div class="sq-title">
 	<img src="style/images/jp.png" width="24"/>
 	精品专区
 </div>
  <ul data-am-widget="gallery" class="am-gallery pro-list am-avg-sm-3 am-avg-md-3 am-avg-lg-4 am-gallery-default"  >
      <li>
        <div class="am-gallery-item">
            <a href="index.php?r=list/index" class="">
              <img src="style/images/test.png" />
                <h3 class="am-gallery-title">猪骨头棒新鲜生鲜肉制品猪大骨头筒骨熬汤佳品500g</h3>
                <div class="am-gallery-desc">￥52</div>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="detail.html" class="">
              <img src="style/images/test1.png" />
                <h3 class="am-gallery-title">冻品批发大江鸡腿 冷鲜鸡腿放心食材1kg 冷冻食材</h3>
                <div class="am-gallery-desc">￥39</div>
            </a>
        </div>
      </li>
        <li>
        <div class="am-gallery-item">
            <a href="detail.html" class="">
              <img src="style/images/test2.png" />
                <h3 class="am-gallery-title">法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮</h3>
                <div class="am-gallery-desc">￥45.8</div>
            </a>
        </div>
      </li>
  </ul>
  <!-- 便民-->
  <div class="sq-title">
 	<img src="style/images/bm.png" width="24"/>
 	便民服务
 </div>
 <ul class="yule">
        <li>
			<a href="index.php?r=list/index">
				<img src="style/images/test.jpg">
				<div style="width: 70%; float: left;">
				<h3 class="title">青山湖区熊氏锁业</h3>
				<p class="intro">开、修、换各式民用锁具（各类普通房门、防盗门、车库门、密码箱</p>
				</div>
			</a>
		</li>
		<li>
			<a href="news.html">
				<img src="style/images/test.jpg">
				<div style="width: 70%; float: left;">
				<h3 class="title">青山湖区熊氏锁业</h3>
				<p class="intro">开、修、换各式民用锁具（各类普通房门、防盗门、车库门、密码箱</p>
				</div>
			</a>
		</li>
		<li>
			<a href="news.html">
				<img src="style/images/test.jpg">
				<div style="width: 70%; float: left;">
				<h3 class="title">青山湖区熊氏锁业</h3>
				<p class="intro">开、修、换各式民用锁具（各类普通房门、防盗门、车库门、密码箱</p>
				</div>
			</a>
		</li>
		<li>
			<a href="news.html">
				<img src="style/images/test.jpg">
				<div style="width: 70%; float: left;">
				<h3 class="title">青山湖区熊氏锁业</h3>
				<p class="intro">开、修、换各式民用锁具（各类普通房门、防盗门、车库门、密码箱</p>
				</div>
			</a>
		</li>
 </ul>
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
