
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
    <?php error_reporting(0);?>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
			<h1 class="am-header-title">
  	            <a href="" class="">特价商品</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	     <div class="whitebar">
	    	 <div data-am-widget="tabs" class="am-tabs am-tabs-d2">
			      <ul class="am-tabs-nav am-cf" style="position: fixed; top: 49px;">
			          <li class="am-active"><a href="[data-tab-panel-0]/index.html">正在热卖</a></li>
			          <li class=""><a href="[data-tab-panel-1]/index.html">即将上线</a></li>
			      </ul>
			      <div style="height: 49px;"></div>
			      <div class="am-tabs-bd">
			          <div data-tab-panel-0 class="am-tab-panel am-active">
                         <ul data-am-widget="gallery" class="am-gallery special am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default" >
                             <?php
                            foreach($one as $k=>$v){
                             ?>
						      <li>
						        <div class="am-gallery-item">
						            <a href="?r=spec/detail&id=<?php echo $v['goods_id']?>" class="">
						              <img src="style/images/test10.png"/>
						                <h3 class="am-gallery-title"><?php echo $v['goods_name']?></h3>
						                <div class="am-gallery-desc">购买金额：<?php echo $v['goods_price']?>&nbsp;&nbsp;&nbsp;返利金额：<?php echo $v['goods_rebate']?></div>
						            </a>
						        </div>
						      </li>
                             <?php
                             }
                             ?>
						 </ul>
			          </div>
			          <div data-tab-panel-1 class="am-tab-panel ">
			             <ul data-am-widget="gallery" class="am-gallery special am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default" >
                             <?php
                             foreach($two as $k=>$v){
                                 ?>
                                 <li>
                                     <div class="am-gallery-item">
                                         <a href="?r=spec/detail&id=<?php echo $v['goods_id']?>" class="">
                                             <img src="style/images/test10.png"/>
                                             <h3 class="am-gallery-title"><?php echo $v['goods_name']?></h3>
                                             <div class="am-gallery-desc">购买金额：<?php echo $v['goods_price']?>&nbsp;&nbsp;&nbsp;返利金额：<?php echo $v['goods_rebate']?></div>
                                         </a>
                                     </div>
                                 </li>
                             <?php
                             }
                             ?>
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

        <script src="style/js/jquery.min.js"></script>
        <script src="style/js/amazeui.min.js"></script>
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	</body>
</html>
