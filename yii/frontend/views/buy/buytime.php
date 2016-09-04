<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>限时抢购</title>
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
        <a href="" class="">限时抢购</a>
        <span id="aaa"></span>
    </h1>
</header>
<div style="height: 49px;"></div>
<div class="whitebar">
    <div data-am-widget="tabs" class="am-tabs am-tabs-d2">
        <ul class="am-tabs-nav am-cf">
            <li class="am-active"><a href="[data-tab-panel-0]/index.html"><?php echo $k[0]?><span style="color: #dcdcdc; font-size: 10px;"><?php echo $arr['oTime']?></span></a></li>
            <li class=""><a href="[data-tab-panel-1]/index.html"><?php echo $k[1]?><span style="color: #dcdcdc; font-size: 10px;"><?php echo $arr['tTime']?></span></a></li>
            <?php
                if(!empty($k[2])){
                    ?>
                    <li class=""><a href="[data-tab-panel-2]/index.html"><?php echo $k[2]?><span style="color: #dcdcdc; font-size: 10px;"><?php echo $arr['sTime']?></span></a></li>
            <?php
                }
            ?>
        </ul>
        <div class="am-tabs-bd">
            <div data-tab-panel-0 class="am-tab-panel am-active">
                <ul class="exchange">
                    <?php
                    if(!empty($data[$k[0]])){

                        foreach($data[$k[0]] as $kk=>$v){
                            ?>
                            <li>
                                <img src="style/images/tele.png" />
                                <div class="excha">
                                    <p><?php echo $v['goods_name']?></p>
                                    <p style="font-size: 1.2rem;">价格：<?php echo $v['goods_price']?></p>
                                    <p style="font-size: 1.2rem;">返利：<?php echo $v['goods_rebate']?></p>
                                </div>
                                <a href="<?php echo $v['goods_url']?>"><input value="马上抢" type="button" class="intra-btn"/></a>
                            </li>
                    <?php
                        }
                    }else{
                        echo "<span>&nbsp;</span><br/><center>商品已下架</center>";
                    }
                    ?>
            </div>
            <div data-tab-panel-1 class="am-tab-panel ">
                <ul class="exchange">
                    <?php
                    if(!empty($data[$k[1]])){
                    foreach($data[$k[1]] as $kk=>$v){
                        ?>
                        <li>
                            <img src="style/images/tele.png" />
                            <div class="excha">
                                <p><?php echo $v['goods_name']?></p>
                                <p style="font-size: 1.2rem;">价格：<?php echo $v['goods_price']?></p>
                                <p style="font-size: 1.2rem;">返利：<?php echo $v['goods_rebate']?></p>
                            </div>
                            <span>
                            <a href="JavaScript:void (0)"  tell = "<?php echo $v['tell']?>"  name ="<?php echo $v['add_time']?>"  id="<?php echo $v['goods_id']?>" class = 'tell '>
                                <?php
                                if($k[1] == '20:00'){
                                    ?>
                                    <a href="<?php echo $v['goods_url']?>"><input value="马上抢" type="button" class="intra-btn"/></a>
                                <?php
                                }else{
                                if($v['tell'] == 1){
                                    ?>
                                    <input value="取消提醒" type="button" class="intra-btn"/>
                                <?php
                                }else{
                                    ?>
                                    <input value="提醒我" type="button" class="intra-btn"/>
                                <?php
                                }
                            }
                                ?>
                            </a>
                            </span>
                        </li>
                    <?php
                        }
                    }else{
                        echo "<span>&nbsp;</span><br/><center>商品未上架，请等待</center>";
                    }

                    ?>
                </ul>
            </div>
            <?php

                if(!empty($k[2])){
                    ?>
                    <div data-tab-panel-1 class="am-tab-panel ">
                        <ul class="exchange">
                            <?php
                        if(!empty($data[$k[2]])){
                            foreach($data[$k[2]] as $kk=>$v){
                                ?>
                                <li>
                                    <img src="style/images/tele.png" />
                                    <div class="excha">
                                        <p><?php echo $v['goods_name']?></p>
                                        <p style="font-size: 1.2rem;">价格：<?php echo $v['goods_price']?></p>
                                        <p style="font-size: 1.2rem;">返利：<?php echo $v['goods_rebate']?></p>
                                    </div>
                                    <span>
                                    <a href="JavaScript:void (0)" tell = "<?php echo $v['tell']?>" name ="<?php echo $v['add_time']?>"  id="<?php echo $v['goods_id']?>" class = 'tell'>
                                        <?php
                                            if($v['tell'] == 1){
                                                ?>
                                                <input value="取消提醒" type="button" class="intra-btn"/>
                                                <?php
                                            }else{
                                                ?>
                                                <input value="提醒我" type="button" class="intra-btn"/>
                                                <?php
                                            }
                                        ?>
                                    </a>
                                    </span>
                                </li>
                            <?php
                                }
                            } else{
                                echo "<span>&nbsp;</span><br/><center>商品未上架，请等待</center>";
                            }
                            ?>
                        </ul>
                    </div>
            <?php
            }
            ?>
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
        $(document).on('click','.tell',function(){
             var ts = $(this);
             var g_id = $(this).attr("id");
             var time = $(this).attr("name");
             var tell = $(this).attr("tell");
            $.ajax({
                type: "POST",
                url: "?r=buy/tell",
                data: "g_id="+g_id+"&time="+time+"&tell="+tell,
                success: function(msg){
                    if(msg == 0){
                        window.location.href = '?r=index/login';
                    }else{
                        var str ="";
                        if(msg == '1'){
                            str += '<a href="JavaScript:void (0)" tell = "1" name ="'+time+'" id="'+g_id+'" class = "tell">';
                                    str+="<input value='取消提醒' type='button' class='intra-btn'/>";
                                 str+="</a>";
                            ts.parents('span').html(str);
                        }else if(msg =='2'){
                            var str1 = "";
                            str1 += '<a href="JavaScript:void (0)" tell = "2" name ="'+time+'" id="'+g_id+'" class = "tell">';
                            str1+="<input value='提醒我' type='button' class='intra-btn'/>";
                            str1+="</a>";

                            ts.parents('span').html(str1);

                        }
                    }
                }
            });
        });
    });
</script>

<script src="style/js/jquery.min.js"></script>
<script src="style/js/amazeui.min.js"></script>
</body>
</html>
