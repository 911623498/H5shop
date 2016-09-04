<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告-有点</title>
<link rel="stylesheet" type="text/css" href="{{URL::asset('')}}style/css/css.css" />
<script type="text/javascript" src="{{URL::asset('')}}style/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="{{URL::asset('')}}style/img/coin02.png" /><span><a href="{{url('index/index')}}">首页</a>&nbsp;-&nbsp;-</span>&nbsp;商品列表
        </div>
    </div>

    <div class="page">
        <!-- user页面样式 -->
        <div class="connoisseur">
            <div class="conform">

            </div>
            <!-- user 表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">序号</td>
                        <td width="435px" class="tdColor">商品名称</td>
                        <td width="400px" class="tdColor">商品图片</td>
                        <td width="400px" class="tdColor">店铺</td>
                        <td width="400px" class="tdColor">专区</td>
                        <td width="400px" class="tdColor">类型</td>
                        <td width="400px" class="tdColor">路径</td>
                        <td width="400px" class="tdColor">商品价格</td>
                        <td width="400px" class="tdColor">秒杀价格</td>
                        <td width="400px" class="tdColor">返利价格</td>
                        <td width="400px" class="tdColor">商品描述</td>
                        <td width="400px" class="tdColor">库存</td>
                        <td width="400px" class="tdColor">秒杀开始时间</td>
                        <td width="400px" class="tdColor">秒杀结束时间</td>
                        <td width="400px" class="tdColor">是否显示</td>
                        <td width="400px" class="tdColor">商品状态</td>
                        <td width="400px" class="tdColor">销量</td>
                        <td width="130px" class="tdColor">操作</td>
                    </tr>
                    <?php
                    foreach($res['data']['list'] as $k=>$v){
                    ?>
                    <tr height="40px" id="<?php echo $v['pre_id']?>">
                        <td width="66px" class="tdColor tdC"><?php echo $v['goods_id']?></td>
                        <td width="435px" class="tdColor"><?php echo $v['goods_name']?></td>
                        <td width="400px" class="tdColor">
                            <img src="{{URL::asset('')}}img/shop/<?php echo $v['goods_img']?>" width="80px" height="50px"/>
                        </td>
                        <td width="435px" class="tdColor"><?php echo $v['shop_name']?></td>
                        <td width="435px" class="tdColor"><?php echo $v['pre_name']?></td>
                        <td width="435px" class="tdColor"><?php echo $v['type_name']?></td>
                        <td width="435px" class="tdColor"><?php echo $v['goods_url']?></td>
                        <td width="435px" class="tdColor"><?php echo $v['goods_price']?></td>
                        <td width="435px" class="tdColor"><?php echo $v['goods_seckill']?></td>
                        <td width="435px" class="tdColor"><?php echo $v['goods_rebate']?></td>
                        <td width="435px" class="tdColor"><?php echo $v['goods_desc']?></td>
                        <td width="435px" class="tdColor"><?php echo $v['goods_num']?></td>
                        <td width="435px" class="tdColor"><?php echo date("Y-m-d H:i:s",$v['add_time'])?></td>
                        <td width="435px" class="tdColor"><?php echo date("Y-m-d H:i:s",$v['end_time'])?></td>
                        <td width="435px" class="tdColor"><?php
                            if($v['is_show'] == 1){
                                echo "未上架";
                            }else if($v['is_show'] == 2){
                                echo "上架";
                            }else{
                                echo "下架";
                            }
                            ?></td>
                        <td width="435px" class="tdColor"><?php
                            if($v['is_hot'] == 1){
                                echo "是";
                            }else{
                                echo "否";
                            }
                            ?></td>

                        <td width="435px" class="tdColor"><?php echo $v['sale_num']?></td>
                        <td width="130px" class="tdColor">
                            <a href="javascript:void(0)" onclick="sc()">删除</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <CENTER><div class="paging"><?php echo $res['str']?></div></CENTER>
            </div>
            <!-- user 表格 显示 end-->
        </div>
        <!-- user页面样式end -->
    </div>

</div>


<!-- 删除弹出框 -->
<div class="banDel">
    <div class="delete">
        <div class="close">
            <a><img src="{{URL::asset('')}}style/img/shanchu.png" /></a>
        </div>
        <p class="delP1">你确定要删除此条记录吗？</p>
        <p class="delP2">
            <a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
        </p>
    </div>
</div>
<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end

function del(){
    var input=document.getElementsByName("check[]");
    for(var i=input.length-1; i>=0;i--){
       if(input[i].checked==true){
           //获取td节点
           var td=input[i].parentNode;
          //获取tr节点
          var tr=td.parentNode;
          //获取table
          var table=tr.parentNode;
          //移除子节点
          table.removeChild(tr);
        }
    }     
}
</script>
</html>