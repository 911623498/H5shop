<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<title>管理员管理-有点</title>
<link rel="stylesheet" type="text/css" href="{{URL::asset('')}}style/css/css.css" />
<script type="text/javascript" src="{{URL::asset('')}}style/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="{{URL::asset('')}}style/img/coin02.png" /><span><a href="{{url('index/index')}}">首页</a>&nbsp;-&nbsp;-</span>&nbsp;文章列表
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
							<td width="435px" class="tdColor">品牌名称</td>
							<td width="400px" class="tdColor">LOGO</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
                        <?php
                            foreach($res['data']['list'] as $k=>$v){
                        ?>
						<tr height="40px" id="<?php echo $v['pre_id']?>">
                            <td width="66px" class="tdColor tdC"><?php echo $v['pre_id']?></td>
                            <td width="435px" class="tdColor"><?php echo $v['pre_name']?></td>
                            <td width="400px" class="tdColor">
                                <img src="{{URL::asset('')}}/img/prefecture/<?php echo $v['pre_img']?>" width="80px" height="50px"/>
                            </td>
                            <td width="130px" class="tdColor">
                                <a href="javascript:void(0)" onclick="sc(<?php echo $v['pre_id']?>)">删除</a>
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
<script src="{{URL::asset('')}}js/jquery-1.8.3.js"></script>
<script type="text/javascript">
    function sc(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{url('Brand/predel')}}",
            data: "id="+id,
            success: function(msg){
                if(msg == 1){
                    alert("删除成功");
                    location.href="{{url('Brand/brandlist')}}";
                }else{
                    alert("该分类下有商品，不可以删除")
                }
            }
        });
    }
</script>
</html>