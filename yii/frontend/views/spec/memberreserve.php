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
	</head>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
			<h1 class="am-header-title">
  	            <a href="" class="">我的预定</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <ul class="list-pro" style="padding-bottom: 10px; ">
            <?php
            foreach($arr as $k=>$v) {
                ?>
                <li>
                    <div style="overflow: hidden;">
                        <a href="detail.html" style="display: block;">
                            <img src="style/images/test10.png" class="list-pic">
                            <div class="shop-list-mid" style="width: 65%;">
                                <p class="mxtit">名称：<?php echo $v['goods_name']?></p>

                                <p>商品价格：￥<?php echo $v['moneys']?>  </p>
                                <p>已付价格：￥<?php echo $v['new_money']?>  </p>

                            </div>
                        </a>
                    </div>
                    <div class="beizhu">备注：<?php echo $v['areas']?>&nbsp;&nbsp;&nbsp;地址：<?php echo $v['poss']?>&nbsp;&nbsp;&nbsp;电话：<?php echo $v['phones']?></div>
                </li>
            <?php
            }
            ?>
		</ul>
		
	     <!--底部-->
        <?php use yii\widgets\ActiveForm;?>
        <?php $form = ActiveForm::begin(); ?>
        <?php $this->beginContent('@frontend/views/index/pub.php')?>
        <?php $this->endContent();?>
        <?php ActiveForm::end(); ?>

 
<script src="js/jquery.min.js"></script>
<script src="js/amazeui.min.js"></script>
	</body>
</html>
