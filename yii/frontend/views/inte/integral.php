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
	</head>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
			<h1 class="am-header-title">
  	            <a href="" class="">积分管理</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <div class="whitebar">
	    	<h2>当前剩余积分：500</h2>
	    	 <div data-am-widget="tabs" class="am-tabs am-tabs-d2">
			      <ul class="am-tabs-nav am-cf">
			          <li class="am-active"><a href="[data-tab-panel-0]/index.html">积分规则</a></li>
			          <li class=""><a href="[data-tab-panel-1]/index.html">积分兑换</a></li>
			          <li class=""><a href="[data-tab-panel-2]/index.html">消费记录</a></li>
			      </ul>
			      <div class="am-tabs-bd">
			          <div data-tab-panel-0 class="am-tab-panel am-active">
			             <p class="text">【青春】那时候有多好，任雨打湿裙角。忍不住哼起，心爱的旋律。绿油油的树叶，自由地在说笑。燕子忙归巢，风铃在舞蹈。经过青春的草地，彩虹忽然升起。即使视线渐渐模糊，它也在我心里。就像爱过的旋律，没人能抹去。因为生命存在失望，歌唱，所以才要歌唱。</p>
			          </div>
			          <div data-tab-panel-1 class="am-tab-panel ">
			             <ul class="exchange">
			             	<li>
			             		<img src="style/images/tele.png" />
			             		<div class="excha">
			             				<p>多功能笔记本</p>
			             				<p style="font-size: 1.2rem;">积分：5000</p>
			             			<div class="excha-right">
			             				<div class="d-stock">
							                <a class="decrease/index.html">-</a>
							                <input id="num" readonly="" class="text_box" name="" type="text" value="1">
							                <a class="increase/index.html">+</a>
					                    </div>
			             			</div>
			             		</div>
			             		<a href="integralexchange.html"><input value="立即兑换" type="button" class="intra-btn"/></a>
			             	</li>
			             	<li>
			             		<img src="style/images/tele.png" />
			             		<div class="excha">
			             				<p>多功能笔记本</p>
			             				<p style="font-size: 1.2rem;">积分：5000</p>
			             			<div class="excha-right">
			             				<div class="d-stock">
							                <a class="decrease/index.html">-</a>
							                <input id="num" readonly="" class="text_box" name="" type="text" value="1">
							                <a class="increase/index.html">+</a>
					                    </div>
			             			</div>
			             		</div>
			             		<a href="integralexchange.html"><input value="立即兑换" type="button" class="intra-btn"/></a>
			             	</li>
			             </ul>
			          </div>
			          <div data-tab-panel-2 class="am-tab-panel ">
			             <ul class="integral-table">
			             	<li class="tit">
			             		<span>时间</span>
			             		<span> 收入/支出</span>
			             		<span>类型</span>
			             		<span>说明</span>
			             	</li>
			             	<li class="for">
			             		<span>2016-01-02</span>
			             		<span>-200 </span>
			             		<span>换礼品</span>
			             		<span>兑换了一个手机</span>
			             	</li>
			             </ul>
			          </div>
			      </div>
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
