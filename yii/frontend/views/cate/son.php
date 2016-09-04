<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-2 am-avg-lg-4 am-gallery-default am-no-layout">
    <?php
    /**
     * Created by PhpStorm.
     * User: yao
     * Date: 2016/8/31
     * Time: 11:00
     */
    foreach($type as $k=>$v){
        if($v['type_id']==$pid){
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