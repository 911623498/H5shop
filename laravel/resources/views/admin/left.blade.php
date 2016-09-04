<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页左侧导航</title>
<link rel="stylesheet" type="text/css" href="{{URL::asset('')}}style/css/public.css" />
<script type="text/javascript" src="{{URL::asset('')}}style/js/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::asset('')}}style/js/public.js"></script>
<head></head>

<body id="bg">
	<!-- 左边节点 -->
	<div class="container">

		<div class="leftsidebar_box">
			<a href="{{url('index/right')}}" target="right"><div class="line">
					<img src="{{URL::asset('')}}style/img/coin01.png" />&nbsp;&nbsp;首页
				</div></a>
			<!-- <dl class="system_log">
			<dt><img class="icon1" src="../img/coin01.png" /><img class="icon2"src="../img/coin02.png" />
				首页<img class="icon3" src="../img/coin19.png" /><img class="icon4" src="../img/coin20.png" /></dt>
		</dl> -->
			<dl class="system_log">
				<dt>
					<img class="icon1" src="{{URL::asset('')}}style/img/coin03.png" /><img class="icon2"
						src="{{URL::asset('')}}style/img/coin04.png" /> 用户管理<img class="icon3"
						src="{{URL::asset('')}}style/img/coin19.png" /><img class="icon4"
						src="{{URL::asset('')}}style/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"
						src="{{URL::asset('')}}style/img/coin222.png" /><a class="cks" href="{{url('User/user')}}"
						target="right">用户列表</a><img class="icon5" src="{{URL::asset('')}}style/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="{{URL::asset('')}}style/img/coin05.png" /><img class="icon2"
						src="{{URL::asset('')}}style/img/coin06.png" /> 店铺管理<img class="icon3"
						src="{{URL::asset('')}}style/img/coin19.png" /><img class="icon4"
						src="{{URL::asset('')}}style/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"
						src="{{URL::asset('')}}style/img/coin222.png" /><a class="cks" href="{{url('Shop/shopadd')}}"
						target="right">店铺添加</a><img class="icon5" src="{{URL::asset('')}}style/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"
						src="{{URL::asset('')}}style/img/coin222.png" /><a class="cks" href="{{url('Shop/shoplist')}}"
						target="right">店铺列表</a><img class="icon5" src="{{URL::asset('')}}style/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="{{URL::asset('')}}style/img/coin07.png" /><img class="icon2"
						src="{{URL::asset('')}}style/img/coin08.png" /> 分类管理<img class="icon3"
						src="{{URL::asset('')}}style/img/coin19.png" /><img class="icon4"
						src="{{URL::asset('')}}style/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"
						src="{{URL::asset('')}}style/img/coin222.png" /><a href="{{url('Type/typeadd')}}" target="right"
						class="cks">分类添加</a><img class="icon5" src="{{URL::asset('')}}style/img/coin21.png" />
				</dd>
                <dd>
                    <img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22" src="{{URL::asset('')}}style/img/coin222.png" />
                    <a href="{{url('Type/typelist')}}" target="right" class="cks">分类列表</a><img class="icon5" src="{{URL::asset('')}}style/img/coin21.png" />
                </dd>

			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="{{URL::asset('')}}style/img/coin10.png" /><img class="icon2"
						src="{{URL::asset('')}}style/img/coin09.png" /> 商品管理<img class="icon3"
						src="{{URL::asset('')}}style/img/coin19.png" /><img class="icon4"
						src="{{URL::asset('')}}style/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"
						src="{{URL::asset('')}}style/img/coin222.png" /><a href="{{url('Goods/goodsadd')}}"
						target="right" class="cks">商品添加</a><img class="icon5"
						src="{{URL::asset('')}}style/img/coin21.png" />
				</dd>
                <dd>
                    <img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"
                          src="{{URL::asset('')}}style/img/coin222.png" /><a href="{{url('Goods/goodslist')}}"
                          target="right" class="cks">商品列表</a><img class="icon5"
                          src="{{URL::asset('')}}style/img/coin21.png" />
                </dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="{{URL::asset('')}}style/img/coin11.png" /><img class="icon2"
						src="{{URL::asset('')}}style/img/coin12.png" /> 品牌管理<img class="icon3"
						src="{{URL::asset('')}}style/img/coin19.png" /><img class="icon4"
						src="{{URL::asset('')}}style/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"
						src="{{URL::asset('')}}style/img/coin222.png" /><a href="{{url('Brand/brandadd')}}" target="right"
						class="cks">品牌添加</a><img class="icon5" src="{{URL::asset('')}}style/img/coin21.png" />
				</dd>
                <dd>
                    <img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"
                          src="{{URL::asset('')}}style/img/coin222.png" /><a href="{{url('Brand/brandlist')}}" target="right"
                          class="cks">品牌列表</a><img class="icon5" src="{{URL::asset('')}}style/img/coin21.png" />
                </dd>
			</dl>
			{{--<dl class="system_log">--}}
				{{--<dt>--}}
					{{--<img class="icon1" src="{{URL::asset('')}}style/img/coin14.png" /><img class="icon2"--}}
						{{--src="{{URL::asset('')}}style/img/coin13.png" /> 热词管理<img class="icon3"--}}
						{{--src="{{URL::asset('')}}style/img/coin19.png" /><img class="icon4"--}}
						{{--src="{{URL::asset('')}}style/img/coin20.png" />--}}
				{{--</dt>--}}
				{{--<dd>--}}
					{{--<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"--}}
						{{--src="{{URL::asset('')}}style/img/coin222.png" /><a href="{{url('Search/search')}}" target="right"--}}
						{{--class="cks">热词列表</a><img class="icon5" src="{{URL::asset('')}}style/img/coin21.png" />--}}
				{{--</dd>--}}
			{{--</dl>--}}
			{{--<dl class="system_log">--}}
				{{--<dt>--}}
					{{--<img class="icon1" src="{{URL::asset('')}}style/img/coin15.png" /><img class="icon2"--}}
						{{--src="{{URL::asset('')}}style/img/coin16.png" /> 管理员管理<img class="icon3"--}}
						{{--src="{{URL::asset('')}}style/img/coin19.png" /><img class="icon4"--}}
						{{--src="{{URL::asset('')}}style/img/coin20.png" />--}}
				{{--</dt>--}}
				{{--<dd>--}}
					{{--<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"--}}
						{{--src="{{URL::asset('')}}style/img/coin222.png" /><a href="{{url('User/user')}}"--}}
						{{--target="right" class="cks">管理员列表</a><img class="icon5"--}}
						{{--src="{{URL::asset('')}}style/img/coin21.png" />--}}
				{{--</dd>--}}
			{{--</dl>--}}
			<dl class="system_log">
				<dt>
					<img class="icon1" src="{{URL::asset('')}}style/img/coinL1.png" /><img class="icon2"
						src="{{URL::asset('')}}style/img/coinL2.png" /> 系统管理<img class="icon3"
						src="{{URL::asset('')}}style/img/coin19.png" /><img class="icon4"
						src="{{URL::asset('')}}style/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"
						src="{{URL::asset('')}}style/img/coin222.png" /><a href="{{url('System/changepwd')}}"
						target="right" class="cks">修改密码</a><img class="icon5"
						src="{{URL::asset('')}}style/img/coin21.png" />
				</dd>
<dd>
					<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"
						src="{{URL::asset('')}}style/img/coin222.png" /><a href="{{url('System/tuichu')}}"  target='_parent' class="cks">退出</a><img
						class="icon5" src="{{URL::asset('')}}style/img/coin21.png" />
				</dd>
				{{--<dd>--}}
					{{--<img class="coin11" src="{{URL::asset('')}}style/img/coin111.png" /><img class="coin22"--}}
						{{--src="{{URL::asset('')}}style/img/coin222.png" /><a class="cks">退出</a><img--}}
						{{--class="icon5" src="{{URL::asset('')}}style/img/coin21.png" />--}}
				{{--</dd>--}}
			</dl>

		</div>

	</div>
</body>
</html>
