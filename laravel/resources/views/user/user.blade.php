<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理-有点</title>
<link rel="stylesheet" type="text/css" href="{{URL::asset('')}}style/css/css.css" />
<script type="text/javascript" src="{{URL::asset('')}}style/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="{{URL::asset('')}}style/img/coin02.png" /><span><a href="{{url('index/index')}}">首页</a>&nbsp;-&nbsp;-</span>&nbsp;管理员列表
			</div>
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform">
					
						<div class="cfD">
							<input class="userinput" type="text" id="sou" placeholder="输入用户名" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<button class="userbtn" onclick="sumsou()" >搜索</button>
						</div>
					
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0" >
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="400px" class="tdColor">用户名</td>
						</tr>
						<tbody id="list"></tbody>
					</table>
					<div class="paging">
					<div id="pagecount"></div></div>
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
var curPage = 1; //当前页码
var total,pageSize,totalPage;
//获取数据
function getData(page,sou){ 
	$.ajax({
		type: 'POST',
		url: '{{url('User/pages')}}',
		data: {'pageNum':page-1,'sou':sou},
		dataType:'json',
		beforeSend:function(){
			$("#list ul").append("<li id='loading'>loading...</li>");
		},
		success:function(json){
			//alert(json)
			//console.log( eval("["+list+"]" ));
			//alert(json.0.user_id)
			$("#list ul").empty();
			total = json.total; //总记录数
			pageSize = json.pageSize; //每页显示条数
			curPage = page; //当前页
			//alert(curPage)
			totalPage = json.totalPage; //总页数
			//alert(totalPage);
			var li = "";
			var list = json.list;
			$.each(list,function(index,array){ //遍历json数据列
				li += "<tr height='40px'><td>"+array['user_id']+"</td><td>"+array['user_name']+"</td></tr>";
			});
			$("#list").html(li);
		},
		complete:function(){ //生成分页条
			getPageBar();
		},
		error:function(){
			alert("数据加载失败");
		}
	});
}

//获取分页条
function getPageBar(){
	//页码大于最大页数
	//alert(totalPage)
	//alert(curPage)
	if(curPage>totalPage) curPage=totalPage;
	//页码小于1
	//alert(totalPage)
	//alert(curPage)
	if(curPage<1) curPage=1;
	pageStr = "<span>共"+total+"条</span><span>"+curPage+"/"+totalPage+"</span>";
	
	//如果是第一页
	if(curPage==1){
		pageStr += "<span onclick='pagenums(1)'>首页</span><span onclick='pagenums(1)'>上一页</span>";
	}else{
		pageStr += "<span><a href='javascript:void(0)' onclick='pagenums(1)' rel='1'>首页</a></span><span><a href='javascript:void(0)' onclick='pagenums(1)' rel='"+(curPage-1)+"'>上一页</a></span>";
	}
	
	//如果是最后页
	if(curPage>=totalPage){
		pageStr += "<span onclick='pagenums(totalPage)'>下一页</span><spanonclick='pagenums(totalPage)'>尾页</span>";
	}else{
		pageStr += "<span><a href='javascript:void(0)' onclick='pagenums(totalPage)' rel='"+(parseInt(curPage)+1)+"'>下一页</a></span><span><a href='javascript:void(0)' onclick='pagenums(totalPage)' rel='"+totalPage+"'>尾页</a></span>";
	}
		
	$("#pagecount").html(pageStr);
}
function pagenums(nums){
	if(nums){
		getData(nums);
	}
}

$(function(){
	getData(1);
	
});
function sumsou(){
	son=$("#sou").val();
	getData(1,son)
}
</script>
</html>