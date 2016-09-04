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
    echo "<span>&nbsp;</span><br/><center>没有了</center>";
}
?>