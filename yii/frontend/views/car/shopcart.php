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
  	            <a href="" class="">购物车</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <!--购物车空的状态-->
	    <div class="login-logo">
	    	<img src="style/images/logo.png">
	    	<p>亲、您的购物车还是空空的哦，快去装满它!</p>
	    	<a href="index.html" class="goshopping">前去逛逛</a>
	    </div>
	    <ul class="shopcart-list">
	    	<li>
	    		<label class="am-checkbox am-warning">
                 <input type="checkbox" checked="checked" value="" data-am-ucheck checked>
                </label>
                <a href="detail.html"><img src="style/images/test3.png" class="shop-pic" /></a>
                <div class="shop-list-mid">
                	<div class="tit"><a href="detail.html">法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮</a></div>
                	<div class="d-stock">
		                <a class="decrease/index.html">-</a>
		                <input id="num" readonly="" class="text_box" name="" type="text" value="1">
		                <a class="increase/index.html">+</a>
                     </div>
                </div>
                <b class="shop-list-price">￥169 </b>
                <div class="del"><i class="am-icon-trash"></i></div>
	    	</li>
	    	<li>
	    		<label class="am-checkbox am-warning">
                 <input type="checkbox" checked="checked" value="" data-am-ucheck checked>
                </label>
                <a href="detail.html"><img src="style/images/test3.png" class="shop-pic" /></a>
                <div class="shop-list-mid">
                	<div class="tit"><a href="detail.html">法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮</a></div>
                	<div class="d-stock">
		                <a class="decrease/index.html">-</a>
		                <input id="num" readonly="" class="text_box" name="" type="text" value="1">
		                <a class="increase/index.html">+</a>
                     </div>
                </div>
                <b class="shop-list-price">￥169 </b>
                <div class="del"><i class="am-icon-trash"></i></div>
	    	</li>
	    	<li>
	    		<label class="am-checkbox am-warning">
                 <input type="checkbox" checked="checked" value="" data-am-ucheck checked>
                </label>
                <a href="detail.html"><img src="style/images/test3.png" class="shop-pic" /></a>
                <div class="shop-list-mid">
                	<div class="tit"><a href="detail.html">法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮</a></div>
                	<div class="d-stock">
		                <a class="decrease/index.html">-</a>
		                <input id="num" readonly="" class="text_box" name="" type="text" value="1">
		                <a class="increase/index.html">+</a>
                     </div>
                </div>
                <b class="shop-list-price">￥169 </b>
                <div class="del"><i class="am-icon-trash"></i></div>
	    	</li>
	    	<li>
	    		<label class="am-checkbox am-warning">
                 <input type="checkbox" checked="checked" value="" data-am-ucheck checked>
                </label>
                <a href="detail.html"><img src="style/images/test3.png" class="shop-pic" /></a>
                <div class="shop-list-mid">
                	<div class="tit"><a href="detail.html">法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮</a></div>
                	<div class="d-stock">
		                <a class="decrease/index.html">-</a>
		                <input id="num" readonly="" class="text_box" name="" type="text" value="1">
		                <a class="increase/index.html">+</a>
                     </div>
                </div>
                <b class="shop-list-price">￥169 </b>
                <div class="del"><i class="am-icon-trash"></i></div>
	    	</li>
	    	<div style="height: 10px; background: #eee;"></div>
	    </ul>
	    
	    <div class="shop-fix">
	    	
	    	<label class="am-checkbox am-warning">
               <input type="checkbox" checked="checked" value="" data-am-ucheck checked>
            </label>
            <a class="del/index.html">批量删除</a>
            <a href="tureorder.html" class="js-btn">去结算</a>
            <div class="js-text">
            	<P>合计：<b>￥217.80</b></P>
            	<p class="js-car">免费配送</p>
            </div>
	    </div>
	    
<!--底部-->
        <?php use yii\widgets\ActiveForm;?>
        <?php $form = ActiveForm::begin(); ?>
        <?php $this->beginContent('@frontend/views/index/pub.php')?>
        <?php $this->endContent();?>
        <?php ActiveForm::end(); ?>



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
