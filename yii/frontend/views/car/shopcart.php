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
  	            <a href="" class="">提醒我</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <!--购物车空的状态-->
        <?php
            if(empty($data)){
                ?>
                <div class="login-logo">
                    <img src="style/images/logo.png">
                    <p>亲、您的提醒还是空空的哦</p>
                    <a href="?r=index/index" class="goshopping">前去逛逛</a>
                </div>
        <?php
            }else{
                foreach($data as $k=>$v){

                ?>
                <ul class="shopcart-list list-pro" id="page">
                    <li style="font-size: 12px;" id="<?php echo 'd'.$v['tell_id']?>">
                        <a href=""><img src="style/images/test3.png" class="shop-pic" /></a>
                        <div class="shop-list-mid" style="width: 65%;">
                            <div class="tit"><a href="detail.html"><?php  echo $v['goods_name']?></a></div>
                            <p >价格   ：  ￥<?php  echo $v['goods_price']?></p>
                            <p >返回   ：  <span style="color: red;">￥<?php  echo $v['goods_rebate']?></span></p>
                            <p>销量：<?php  echo $v['sale_num']?>件</p>
                        </div>
                        <?php
                            if($time >$v['add_time'] && $time <=$v['end_time']){
                                ?>
                                <div class="del"> <a href="<?php echo $v['goods_url']?>" style="font-size: 12px;">马上抢</a></div>
                                <?php
                            }elseif($time<$v['add_time']){
                                ?>
                                <div class="del" id="<?php echo $v['tell_id']?>"> <a href="javascript:void(0)" style="font-size: 12px;">取消提醒</a></div>
                                <?php
                            }else{
                                ?>
                                <div class="del" id="<?php echo $v['tell_id']?>"> <a href="javascript:void(0)" style="font-size: 12px;">删除失效商品</a></div>
                                <?php
                            }
                        ?>
                    </li>
                </ul>

        <?php
                }
            }

        ?>

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
<script>
    $(function(){
        $(document).on('click','.del',function(){
            var tell_id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "?r=car/del",
                data: "tell_id="+tell_id,
                success: function(msg){
                    if(msg == true){
                        $("#d"+tell_id).remove();
                    }
                }
            });
        });
    });

</script>