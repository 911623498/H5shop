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
            <img src="{{URL::asset('')}}style/img/coin02.png" /><span><a href="{{url('index/index')}}">首页</a>&nbsp;-&nbsp;-</span>&nbsp;分类管理
        </div>
    </div>

    <div class="page">
        <!-- user页面样式 -->
        <div class="connoisseur">
            <div class="conform">
                <form action="{{url('Type/typetianjia')}}" onsubmit="return typeadd()" enctype="multipart/form-data" method="post">
                    <div class="cfD">
                        分类名称:<input style="margin-top: 20px;margin-left: 30px;width: 300px" name="type_name" id="type_name" class="userinput" onblur="yan_name()" type="text" placeholder="分类名称" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="type_names" style="color: red;"></span><br/>
                        上级分类:
                        <select style="margin-top: 20px;margin-left: 30px" name="type_pid" id="type_pid">
                            <option value="0">请选择</option>
                            <?php foreach($re as $vv){?>
                            <option value="{{$vv['type_id']}}">{{$vv['type_name']}}</option>
                            <?php } ?>
                        </select>
                        <span id="type_pids"></span>
                        <br/>
                        分类logo: <input type="file" style="margin-top: 20px;margin-left: 30px" onblur="yan_img()" name="type_img" id="type_img" />
                        <span id="type_imgs" style="color: red;"></span><br/>
                        <button   style="margin-top: 30px;margin-left: 100px" class="userbtn">添加</button>
                    </div>
                </form>
            </div>
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
    function yan_name()
    {
        var type_name=$("#type_name").val();
        if(type_name=="")
        {
            $("#type_names").html("分类名称不能为空");
        }else
        {
            $("#type_names").html("");
        }
    }
    function yan_img()
    {
        var type_img=$("#type_img").val();
        if(type_img=="")
        {
            $("#type_imgs").html("分类logo不能为空");
        }else
        {
            $("#type_imgs").html("");
        }
    }

    function typeadd() {
        var type_name=$("#type_name").val();
        var type_img=$("#type_img").val();
        if(type_name=="")
        {
            $("#type_names").html("分类名称不能为空");
            return false;
        }else if(type_img=="")
        {
            $("#type_imgs").html("请选择分类logo");
            return false;
        }else
        {
            return true;
        }
    }
    // 广告弹出框 end
</script>
</html>