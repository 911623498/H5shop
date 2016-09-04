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
        <a href="" class="">商品列表</a>
    </h1>
</header>
<div style="height: 49px;"></div>
<ul class="list-nav">
    <li class="current"><a href="">综合</a></li>
    <li><a href="">销量</a></li>
    <li><a href=""><i class="list-price">价格</i></li>
    <li><a href="">新品</a></li>
</ul>
<input type="hidden" id="sum" value="<?php echo $list['sum'];?>"/>
<input type="hidden" id="page1" value="<?php echo $list['page'];?>"/>
<input type="hidden" id="search" value="<?php echo $search;?>"/>
<ul class="list-pro" id="page">
    <?php
    if(!empty($list['list'])){
        foreach($list['list'] as $k=>$v){
            ?>
            <li>
                <a href="<?php echo $v['goods_url']?>"><img src=" style/images/test10.png" class="list-pic" /></a>
                <div class="shop-list-mid" style="width: 65%;">
                    <div class="tit"><a href="detail.html"><?php echo $v['goods_name']?></a></div>
                    <div class="am-gallery-desc">价格   ：  ￥<?php echo $v['goods_price']?></div>
                    <div class="am-gallery-desc">返回   ：  ￥<?php echo $v['goods_rebate']?></div>
                    <p>销量：<?php echo $v['sale_num']?>件</p>
                </div>
            </li>
        <?php
        }
    }else{
        echo "<span>&nbsp;</span><br/><center>此类商品已售空</center>";
    }
    ?>
</ul>
<center id="fy" onclick="fy('<?echo $list['sum']?>')">加载更多</center>
<!--	   <div class="fix-bot">-->
<!--	   	  <div class="fix-bot-cart"><i>8</i></div>-->
<!--	   	  <a href="tureorder.html" class="list-js">去结算</a>-->
<!--	   	  <div class="js-text">-->
<!--            	<p><b>￥217.80</b></p>-->
<!--            	<p class="js-car">购物满50元免运费</p>-->
<!--          </div>-->
</div>

<script src="style/js/jquery.min.js"></script>
<script src="style/js/amazeui.min.js"></script>
<script>
    //        sum =$("#sum").val();
    //        if(sum == 0){
    //            $("#fy").hide();
    //        }

    //购物数量加减
    $(function(){

        $('.increase').click(function(){
            var self = $(this);
            var current_num = parseInt(self.siblings('input').val());
            current_num += 1;
            if(current_num > 0){
                self.siblings(".decrease").fadeIn();
                self.siblings(".text_box").fadeIn();
            }
            self.siblings('input').val(current_num);
            update_item(self.siblings('input').data('item-id'));
        })
        $('.decrease').click(function(){
            var self = $(this);
            var current_num = parseInt(self.siblings('input').val());
            if(current_num > 0){
                current_num -= 1;
                if(current_num < 1){
                    self.fadeOut();
                    self.siblings(".text_box").fadeOut();
                }
                self.siblings('input').val(current_num);
                update_item(self.siblings('input').data('item-id'));
            }
        })
    });
    function fy(sum){
        var page=$("#page1").val();
        var search=$("#search").val();
        $.ajax({
            type: "POST",
            url: "?r=cate/sea",
            data: "sum="+sum+"&page="+page+"&search="+search,
            success: function(msg){
                if(msg ==1){

                }else if(msg == 2){

                }else{
                    var str="";
                    $("#page").append(msg);
                    $("#page1").val(parseInt(page)+1);
                }
            }
        });
        if(page == sum){
            $("#fy").hide();
        }
    }
</script>

</body>
</html>
