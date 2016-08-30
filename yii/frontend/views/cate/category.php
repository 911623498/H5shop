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
  	            <a href="" class="">商品分类</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <div class="cate-search">
	    	<input type="text" class="cate-input" placeholder="请输入您要的搜索的产品关键词" />
	    	<input type="button" class="cate-btn" />
	    </div>
	    <div class="content-list">
	    	<div class="list-left">
	    		<li><a href="">生鲜熟食</a></li>
	    		<li class="current"><a href="">粮油大米</a></li>
	    		<li><a href="">烟酒饮料</a></li>
	    		<li><a href="">休闲食品</a></li>
	    		<li><a href="">个人洗护</a></li>
	    		<li><a href="">家居家纺</a></li>
	    	</div>
	    	<div class="list-right">
	    		<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-2 am-avg-lg-4 am-gallery-default am-no-layout">
				      <li>
				        <div class="am-gallery-item">
				            <a href="index.php?r=list/index" class="">
				              <img src=" style/images/test6.png">
				                <h3 class="am-gallery-title">米面粮油</h3>
				            </a>
				        </div>
				      </li>
				      <li>
				        <div class="am-gallery-item">
				            <a href="list.html" class="">
				              <img src=" style/images/test7.png">
				                <h3 class="am-gallery-title">食用油</h3>
				            </a>
				        </div>
				      </li>
				      <li>
				        <div class="am-gallery-item">
				            <a href="list.html" class="">
				              <img src=" style/images/test8.png">
				                <h3 class="am-gallery-title">厨房调料</h3>
				            </a>
				        </div>
				      </li>
				      <li>
				        <div class="am-gallery-item">
				            <a href="list.html" class="">
				              <img src=" style/images/test9.png">
				                <h3 class="am-gallery-title">特色干货</h3>
				            </a>
				        </div>
				      </li>
				      
				</ul>
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
