<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理员管理-有点</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('')}}style/css/css.css" />
    <script type="text/javascript" src="{{URL::asset('')}}style/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>
<style>
    #list{width:680px; height:530px; margin:2px auto; position:relative}
    #list ul li{float:left;width:220px; height:260px; margin:2px}
    #list ul li img{width:220px; height:220px}
    #list ul li p{line-height:22px}
    #pagecount{width:500px; margin:10px auto; text-align:center}
    #pagecount span{margin:4px; font-size:14px}
    #list ul li#loading{width:120px; height:32px; border:1px solid #d3d3d3;
        position:absolute; top:35%; left:42%; text-align:center; background:#f7f7f7
    url(loading.gif) no-repeat 8px 8px;-moz-box-shadow:1px 1px 2px rgba(0,0,0,.2);
        -webkit-box-shadow:1px 1px 2px rgba(0,0,0,.2); box-shadow:1px 1px 2px rgba(0,0,0,.2);}
</style>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="{{URL::asset('')}}style/img/coin02.png" /><span><a href="{{url('index/index')}}">首页</a>&nbsp;-&nbsp;-</span>&nbsp;分类管理
        </div>
    </div>

    <div class="page">
        <!-- user页面样式 -->
        <div class="connoisseur">
            <div class="conform">
                <form>
                    <div class="cfD">
                        <input type="text" style="width: 150px;height: 35px" id="search" placeholder="请输入分类名字"/>
                        <input type="button"  onclick="changepage(1)" value="搜索" style="margin-left: 10px;margin-top:10px" class="userbtn"/>
                        <input type="submit" value="添加" style="margin-left: 10px;margin-top:10px" class="userbtn"/>
                    </div>
                </form>
            </div>
            <!-- user 表格 显示 -->
            <div class="conShow" style="margin-top: 10px">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">序号</td>
                        <td width="435px" class="tdColor">分类名称</td>
                        <td width="400px" class="tdColor">分类logo</td>
                        <td width="400px" class="tdColor">编辑</td>
                    </tr>
                    <tbody>
                    </tbody>
                </table>
                <div id="pagecount"></div>
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
    var total,pageSize,totalPage; //总记录数，每页显示数，总页数
    //获取数据
    function getData(page,search){
        $.ajax({
            type: 'POST',
            url: '{{url('Type/typelists')}}',
            data: {'page':page,"search":search},
            dataType:'json',
            beforeSend:function(){
                $("#list tr").append("<td id='loading'>loading...</td>");//显示加载动画
            },
            success:function(json){
                console.log(json.data);
                $("#list tr").empty();//清空数据区
                total = json.count; //总记录数
                pageSize = json.num; //每页显示条数
                curPage = page; //当前页
                totalPage = json.max_page; //总页数
                var td = "";
                var list = json.data;
                $.each(list,function(index,array){ //遍历json数据列
                    td += "<tr id='trs"+array.type_id+"'>"+"<td>"+array.type_id +"</td>"+"<td>"+array.type_name +"</td>"+"<td>"+"<img style='width:50px;height: 50px;' src='uploads/"+array.type_img+"'/>"+"</td>"+"<td>"+'<a href="{{url('Type/typeupd?type_id=')}}'+array.type_id+'"><img class="operation" src="http://www.aaa.net/laravel/public/style/img/update.png"></a>'+ '<a href="javascript:void(0)" onclick="dels('+array.type_id+')"><img class="operation delban" src="http://www.aaa.net/laravel/public/style/img/delete.png"></a>'+"</td>"+"</tr>";
                });
                $("tbody").eq(1).html(td);
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
        if(curPage>totalPage) curPage=totalPage;
        //页码小于1
        if(curPage<1) curPage=1;
        pageStr = "<span>共"+total+"条</span><span>"+curPage
        +"/"+totalPage+"</span>";

        //如果是第一页
        if(curPage==1){
            pageStr += "<span>首页</span><span>上一页</span>";
        }else{
            pageStr += "<span><a href='javascript:void(0)' onclick='changepage(1)' rel='1'>首页</a></span>" +
            "<span><a href='javascript:void(0)' onclick='changepage(curPage-1)' rel='"+(curPage-1)+"'>上一页</a></span>";
        }

        //如果是最后页
        if(curPage>=totalPage){
            pageStr += "<span>下一页</span><span>尾页</span>";
        }else{
            pageStr += "<span><a href='javascript:void(0)' onclick='changepage(parseInt(curPage)+1)' rel='"+(parseInt(curPage)+1)+"'>下一页</a></span><span><a href='javascript:void(0)' onclick='changepage(totalPage)'  rel='"+totalPage+"'>尾页</a> </span>";
        }

        $("#pagecount").html(pageStr);
    }
    $(function(){
        getData(1);
    });
    function changepage(rel){
        var search=$("#search").val();
        if(rel){
            getData(rel,search);
        }
    }
    function dels(type_id)
    {
        var state=window.confirm("你确认要删除么");
        if(state)
        {
            var data={"type_id":type_id};
            var url="{{url('Type/typedels')}}";
            $.get(url,data,function(msg){
                if(msg==0)
                {
                    $("#trs"+type_id).remove();
                }else
                {
                    alert("删除失败")
                }
            })
        }
    }
</script>
</html>