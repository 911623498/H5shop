<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品添加</title>
<link rel="stylesheet" type="text/css" href="{{URL::asset('')}}style/css/css.css" />
<script type="text/javascript" src="{{URL::asset('')}}style/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('')}}js/laydate.js"></script>
</head>

<style type="text/css">
    *{margin:0;padding:0;list-style:none;}
    html{background-color:#E3E3E3; font-size:14px; color:#000; font-family:'微软雅黑'}
    h2{line-height:30px; font-size:20px;}
    a,a:hover{ text-decoration:none;}
    pre{font-family:'微软雅黑'}
    .box{width:600px; padding:10px 20px; background-color:#fff; margin-left:70px;}
    .box a{padding-right:20px;}
    .demo1,.demo2,.demo3,.demo4,.demo5,.demo6{margin:25px 0;}
    h3{margin:10px 0;}
    .layinput{height: 22px;line-height: 22px;width: 150px;margin: 0;}
</style>
<body>

	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="{{URL::asset('')}}style/img/coin02.png" /><span><a href="{{url('index/index')}}">首页</a>&nbsp;-&nbsp;<a
					href="{{url('Advert/advert')}}">商品管理</a>&nbsp;-</span>&nbsp;商品添加
			</div>
		</div>
        <form action="{{url('Goods/add_data')}}" method="post" enctype="multipart/form-data">
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>商品添加</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						商品名称：<input type="text" class="input1" name = "goods_name"/>
					</div>
					<div class="bbD">
						商品图片：
							<input type="file" name="goods_img"/>
					</div>

                    <div class="bbD">
                        &nbsp;&nbsp;专区： &nbsp; &nbsp;
                        <select name="pre_id" class="input1" style="width: 180px;">
                            <?php
                                foreach($zq as $k=>$v){
                            ?>
                            <option value="<?php echo $v['pre_id']?>" class="input1" style="width: 180px;"><?php echo $v['pre_name']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;分类： &nbsp; &nbsp;
                        <select name="type_id" class="input1">
                            <?php
                                foreach($lx as $k=>$v){
                            ?>
                            <option value="<?php  echo $v['type_id']?>" class="input1"><?php echo $v['type_name']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;店铺： &nbsp; &nbsp;
                        <select name="shop_id" class="input1">
                            <?php
                            foreach($dp as $k=>$v){
                            ?>
                            <option value="<?php  echo $v['shop_id']?>" class="input1"><?php echo $v['shop_name']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="bbD">
                        商品路径：<input type="text" class="input1" name = "goods_url"/>
                    </div>
                    <div class="bbD">
                        商品价格：<input type="text" class="input1" name = "goods_price"/>
                    </div>
                    <div class="bbD">
                        商品返利：<input type="text" class="input1" name = "goods_rebate"/>
                    </div>
                    <div class="bbD">
                        秒杀价格：<input type="text" class="input1" name = "goods_seckill"/>
                    </div>
                    <div class="bbD">
                        秒杀时间：
                        <div class="box">
                        <div class="demo2">
                            开始时间：<input placeholder="请输入日期" name="add_time" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                            结束时间：<input placeholder="请输入日期" name="end_time" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                        </div>
                        </div>
                    </div>
                    <div class="bbD">
                        商品描述：<input type="text" class="input1" style="width: 400px ;" name = "goods_desc"/>
                    </div>
                    <div class="bbD">
                        商品数量：<input type="text" class="input1" style="width: 230px ;" name = "goods_num"/>
                    </div>
					<div class="bbD">
						是否显示：<label><input type="radio" name="is_hot" checked="checked" value="1"/>是</label> <label><input
							type="radio" name="is_hot" value="2"/>否</label>
					</div>
                    <div class="bbD">
                        商品状态：<label><input type="radio" name="is_show" checked="checked" value="1"/>未上架</label> <label><input
                                    type="radio" name="is_show" value="3"/>下架</label><label><input
                                    type="radio" name="is_show" value="2"/>上架</label>
                    </div>
                    <div class="bbD">
                        <p class="bbDP">
                            <input type="submit" class="btn_ok btn_yes" value="提交" id="tj"/>
                            <input type="reset" class="btn_ok btn_no" value="取消"/>
                        </p>
                    </div>
				</div>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
        </form>
	</div>

</body>
</html>
<script src="{{URL::asset('')}}js/jquery-1.8.3.js"></script>

<script type="text/javascript">
    !function(){
        laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
        laydate({elem: '#demo'});//绑定元素
    }();

    //日期范围限制
    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD',
        min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16', //最大日期
        istime: true,
        istoday: false,
        choose: function(datas){
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };

    var end = {
        elem: '#end',
        format: 'YYYY-MM-DD',
        min: laydate.now(),
        max: '2099-06-16',
        istime: true,
        istoday: false,
        choose: function(datas){
            start.max = datas; //结束日选好后，充值开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);

    //自定义日期格式
    laydate({
        elem: '#test1',
        format: 'YYYY年MM月DD日',
        festival: true, //显示节日
        choose: function(datas){ //选择日期完毕的回调
            alert('得到：'+datas);
        }
    });

    //日期范围限定在昨天到明天
    laydate({
        elem: '#hello3',
        min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
        max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
    });
</script>