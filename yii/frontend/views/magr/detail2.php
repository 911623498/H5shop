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
	    <!--图片轮换-->
		<div class="am-slider am-slider-default" data-am-flexslider id="demo-slider-0">
		  <ul class="am-slides">
		    <li><img src="style/images/pic.png" /></li>
		    <li><img src="style/images/pic.png" /></li>
		  </ul>
		</div>
		<div class="detal-info">
			<p><?php echo $goods['goods_name']?></p>
			<h2>商城价：<span><del>￥<?php echo $goods['goods_price']?></del></span></h2>
			<h2>秒杀价：<span><?php echo $goods['goods_seckill']?></span></h2>
            <p id="checks"></p>
            <h2>开始时间：<?php echo date("Y-m-d H:i:s",$goods['add_time'])?><br/>结束时间：<?php echo date("Y-m-d H:i:s",$goods['end_time'])?></h2>
            <h2 id="jie">剩余时间： <span id="check"></span>   <strong id="RemainH">XX</strong>:<strong id="RemainM">XX</strong>:<strong id="RemainS">XX</strong></h2>
        </div>
		<div class="d-amount">
        	<h4>数量：</h4>
            <div class="d-stock">
             <span id="num"><?php echo $goods['goods_num']?></span>
               <span id="dprice" class="price" style="display:none"> </span>
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
		            <p>商品源:<?php echo $goods['goods_url']?></p>
                    <p>商品描述：<?php echo $goods['goods_desc']?></p>
                    <p>返利: <?php echo $goods['goods_rebate']?></p>
                    <img src="style/images/test11.png" />
		    </div>

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
 	<li id="ying">
        <?php if($goods['is_show'] ==2&&$goods['goods_num']!='0') { ?>
            <a href="javascript:void(0);" onclick="seckill('<?php echo $goods['goods_id']?>','<?php echo $goods['goods_num']?>')" class="imm-buy">立即秒杀</a>
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


     function seckill(g_id,num)
     {
        var num1= $("#num").html();
         $.get("index.php?r=magr/shop_seckill", { id:g_id,num:num},
             function(msg){
              //   alert(msg);
            if(msg==false)
            {
                alert("秒杀已结束");
            }
                 else
            {
                alert("秒杀成功");
                num1--;
                if(num1==0)
                {
                    $("#checks").html("<font color='red'>商品已被抢空啦！</font>");
                    $("#ying").hide();
                    $("#jie").hide();
                    $("#num").html("0");
                }
                else
                {
                    $("#num").html(num1);
                    location.href='<?php echo $goods['goods_url']?>';
                }



            }
           });
     }
</script>


        <?php
        /**
         * php的时间是以秒算。js的时间以毫秒算
         */

        //date_default_timezone_set("Asia/Hong_Kong");//地区
        date_default_timezone_set('PRC');

        //配置每天的活动时间段
        $starttimestr = $goods['add_time'];
        $endtimestr = $goods['end_time'];

       $a=  date("Y-m-d H:i:s",$goods['add_time']);
       $b=  date("Y-m-d H:i:s",$goods['end_time']);

        //活动时间段时间戳
        $starttime = $goods['add_time'];
        $endtime = $goods['end_time'];

        //现在时间
        $nowtime = time();

        //判断是否到活动时间
        if ($nowtime<$starttime){
            die("活动还没开始,活动时间是：{$starttimestr}至{$endtimestr}");
        }

        //实际剩下的时间（秒）
        $lefttime = $endtime-$nowtime;
        //echo $lefttime;
        ?>
<!--        <h4><strong id="RemainH">XX</strong>:<strong id="RemainM">XX</strong>:<strong id="RemainS">XX</strong></h4>-->
        <script language="JavaScript">
            var runtimes = 0;
            function GetRTime(){

                if(<?=$starttimestr?>+parseInt(5*60*1000)<<?php echo $nowtime?>)
                {
//                    alert("活动还没开始,活动时间是");
                    $("#checks").html("<font color='red'>活动还没开始</font>");
                    $("#ying").hide();
                }
                else if(<?=$endtime?><<?php echo $nowtime?>)
                {

                    $("#checks").html("<font color='red'>活动已结束</font>");
                    $("#ying").hide();
                    $("#jie").hide();
                }

                var nMS = <?=$lefttime?>*1000-runtimes*1000; //剩余时间
                var nH=Math.floor(nMS/(1000*60*60))%24; //剩余 时
                var nM=Math.floor(nMS/(1000*60)) % 60;//剩余 分
                var nS=Math.floor(nMS/1000) % 60;//剩余 秒
                document.getElementById("RemainH").innerHTML=nH;
                document.getElementById("RemainM").innerHTML=nM;
                document.getElementById("RemainS").innerHTML=nS;
                if(nMS>5*59*1000&&nMS<=5*60*1000)
                {
//                    alert("还有最后五分钟！");
                    $("#check").html("<font color='red'>还有最后五分钟！</font>");
                }
                runtimes++;
                //setTimeout("GetRTime()",1000);
            }

            setInterval("GetRTime()",1000);
            window.onload=GetRTime;
        </script>




        <script src="style/js/jquery.min.js"></script>
<script src="style/js/amazeui.min.js"></script>
	</body>
</html>
