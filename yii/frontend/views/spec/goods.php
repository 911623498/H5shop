<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>超市</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="icon" type="style/image/png" href="style/theme/default/images/favicon.png">
		<link href="style/css/amazeui.min.css" rel="stylesheet" type="text/css" />
		<link href="style/css/style.css" rel="stylesheet" type="text/css" />
		<script src="style/js/jquery-1.10.2.min.js"></script>
		<style>
			.am-slider-default .am-control-nav{ text-align: center;}
			.am-slider-default .am-control-nav li a.am-active{ background: #fdb325;}
			.am-slider-default .am-control-nav li a{ border: 0; width: 10px; height: 10px;}
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
  	            <a href="" class="">商品详情</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
        <div id="show">
        <?php
        foreach($goods as $k=>$v){
        ?>
	    <!--图片轮换-->
		<div class="am-slider am-slider-default" data-am-flexslider id="demo-slider-0">
		  <ul class="am-slides">
		    <li><img src="style/images/pic.png" /></li>
		    <li><img src="style/images/pic.png" /></li>
		  </ul>
		</div>
		<div class="detal-info">
			<p><?php echo $v['goods_name']?></p>
			<h2>商城价：<span><?php echo $v['goods_price']?></span></h2>
		</div>
		<div class="d-amount">
        	<h4>数量：</h4>
            <div class="d-stock">
              <a class="decrease/index.html">-</a>
                <input id="num" readonly="" class="text_box" name="" type="text" value="1">
                <input id="id" type="hidden" value="644">
                <a class="increase/index.html">+</a>
               <span id="dprice" class="price" style="display:none"> <?php echo $v['goods_num']?></span>
            </div>
        </div>
        <div style="background: #eee; height: 10px;"></div>
        <div class="am-tabs detail-list" data-am-tabs>
		  <ul class="am-tabs-nav am-nav am-nav-tabs">
		    <li class="am-active"><a href="#tab1/index.html">商品详情</a></li>
		    <li><a href="#tab2/index.html">商品评论</a></li>
		  </ul>
		  <div class="am-tabs-bd">
		    <div class="am-tab-panel am-fade am-in am-active detail " id="tab1" >
		            <p>商品源:<?php echo $v['goods_url']?></p>
                    <p>商品描述：<?php echo $v['goods_desc']?></p>
                    <p>返利: <?php echo $v['goods_rebate']?></p>
                    <img src="style/images/test11.png" />
		    </div>
              <?php
              }
              ?>
		    <div class="am-tab-panel am-fade detail " id="tab2">
		         <div class="comment">
		         	<span>好评：</span>
		         	<div class="com-good"></div>
		         	<span>100%</span>
		         </div>
		         <div class="comment">
		         	<span>中评：</span>
		         	<div class="com-bad"></div>
		         	<span>0%</span>
		         </div>
		         <div class="comment">
		         	<span>差评：</span>
		         	<div class="com-bad"></div>
		         	<span>0%</span>
		         </div>
		         <ul class="comment-list">
		           <li><a href="">全部</a></li>
		           <li><a href="">好评（20）</a></li>
		           <li><a href="">中评（5）</a></li>
		           <li><a href="">差评（0）</a></li>
		         </ul>
		         <ul class="comment-pic">
		         	<li>
		         		<div class="tit">
		         			<img src="style/images/tx.png" class="tx" />
		         			<span>songke2014</span>
		         			<i> [2016-01-01]</i>
		         		</div>
		         		<div class="comment-con">
		         			买了些给家人，都说不错！
		         		</div>
		         	</li>
		         	<li>
		         		<div class="tit">
		         			<img src="style/images/tx.png" class="tx" />
		         			<span>songke2014</span>
		         			<i> [2016-01-01]</i>
		         		</div>
		         		<div class="comment-con">
		         			买了些给家人，都说不错！
		         		</div>
		         	</li>
		         </ul>
		    </div>
		  </div>
		</div>
		<!--底部-->
 <div style=" height: 55px;"></div>
 <ul class="fix-shopping">
 	<li><a href="index.php?r=car/index" class="join">加入购物车</a></li>
 	<li>
        <?php if($goods[0]['is_show'] ==2) { ?>
            <a href="javascript:void(0);" onclick="url('<?php echo $goods[0]['goods_url'] ?>')" class="imm-buy">立即购买</a>
        <?php
        }
       else
        {
        ?>
            <a href="javascript:void(0);" class="imm-buy">尽请期待</a>
        <?php
        }
        ?>

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


     function url(url)
     {
         $.get("index.php?r=spec/goods", { url: url},
             function(data){
          $("#show").html(data);
                // location.href=url;
             });
     }
</script>
 
 
 
 
<script src="style/js/jquery.min.js"></script>
<script src="style/js/amazeui.min.js"></script>
	</body>
</html>
