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
    <input type="text" class="cate-input" id="content" placeholder="请输入您要的搜索的产品关键词" />
    <input type="button" class="cate-btn" id="search" />
</div>
<div class="content-list">
    <div class="list-left" >
        <ul style="height:98%; overflow:auto;">
            <?php
            if(!empty($type)) {
                foreach ($type as $k => $v) {
                    if ($k == 0) {
                        ?>
                        <li id="<?php echo $v['type_id']?>" class="current"><a href="javascript:void (0)"
                                                                               class="pid"><?php echo $v['type_name']?></a>
                        </li>
                    <?php
                    } else {
                        ?>
                        <li id="<?php echo $v['type_id']?>"><a href="javascript:void (0)"
                                                               class="pid"><?php echo $v['type_name']?></a></li>
                    <?php
                    }
                }
            }
            ?>
        </ul>
    </div>
    <div class="list-right" id="son">
        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-2 am-avg-lg-4 am-gallery-default am-no-layout">
            <?php

            foreach($type as $k=>$v){
                if($v['type_id']==1){
                    foreach($v['son'] as $kk=>$vv){
                        ?>
                        <li>
                            <div class="am-gallery-item">
                                <a href="index.php?r=cate/show&son=<?php echo $vv['type_id']?>">
                                    <img src=" style/images/test6.png">
                                    <h3 class="am-gallery-title"><?php echo $vv['type_name']?></h3>
                                </a>
                            </div>
                        </li>
                    <?php

                    }
                }
            }
            ?>

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
<script>
    $(function(){
        $(".pid").click(function(){
            $(this).parent().siblings().removeClass();
            $(this).parent().attr("class","current");
            var pid = $(this).parent().attr("id");
            $.ajax({
                type: "POST",
                url: "?r=cate/son",
                data: "pid="+pid,
                success: function(msg){
                    $("#son").html(msg);
                }
            });
        });
        $("#search").click(function(){
            var search = $("#content").val();
            self.location="?r=cate/search&search="+search;
        });
    });
</script>
