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
        <link rel="icon" type="style/style/image/png" href="style/theme/default/images/favicon.png">
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
  	            <a href="" class="">预定列表</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <div class="whitebar">
	    <div data-am-widget="tabs" class="am-tabs am-tabs-d2">
			      <ul class="am-tabs-nav am-cf" style="position: fixed; top: 49px;">
			          <li class="am-active"><a href="[data-tab-panel-0]/index.html">预定列表</a></li>
			          <li class=""><a href="[data-tab-panel-1]/index.html">采购建议</a></li>
			      </ul>
			      <div style="height: 49px;"></div>
			      <div class="am-tabs-bd">
			          <div data-tab-panel-0 class="am-tab-panel am-active">
                          <ul class="list-pro">
                              <?php
                              foreach($goods as $k=>$v){
                              ?>
					    	<li>
					    		<a href="?r=spec/reds&id=<?php echo $v['goods_id']?>"><img src="style/images/test10.png" class="list-pic" /></a>
					    		<div class="shop-list-mid" style="width: 65%;">
				                	<div class="tit" ><a href="?r=spec/reds&id=<?php echo $v['goods_id']?>"><?php echo $v['goods_name']?></a></div>
                                    <div class="tit" ><a href="?r=spec/reds&id=<?php echo $v['goods_id']?>">预售金额：<?php echo $v['goods_rebate']?></a></div>
				                	<a href="?r=spec/reds&id=<?php echo $v['goods_id']?>&money=<?php echo $v['goods_rebate']?>"  class="reserve-btn">立即预订</a>
				                </div>
					    	</li>
                              <?php
                              }
                              ?>
					    </ul>
			          </div>
			          <div data-tab-panel-1 class="am-tab-panel ">
			              <div class="intergral">
						    	<input type="text"  placeholder="请输入昵称" class="login-password">
						    	<textarea placeholder="您有好的采购建议请给我们留言！" class="integ-text"></textarea>
						    	<div class="yzm" style="margin-top: 1.5rem;">
						    		<input type="text" class="reg-yzm" />
						    		<img src="style/images/yzm.png" class="yzmimg" />
						    	</div>
						        <input type="button" class="login-btn" value="提交留言">
						  </div>
			          </div>
			      </div>
        </div>
	   </div>
	  
	 

<script src="style/js/jquery.min.js"></script>
<script src="style/js/amazeui.min.js"></script>


	</body>
</html>
