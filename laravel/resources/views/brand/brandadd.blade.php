<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>品牌添加</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('')}}style/css/css.css" />
    <script type="text/javascript" src="{{URL::asset('')}}style/js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="{{URL::asset('')}}style/img/coin02.png" /><span><a href="{{url('index/index')}}">首页</a>&nbsp;-&nbsp;<a
                        href="{{url('Advert/advert')}}">品牌管理</a>&nbsp;-</span>&nbsp;品牌添加
        </div>
    </div>
    <div class="page ">
        <form action="{{url('Brand/add_data')}}" method="post" enctype="multipart/form-data"  onsubmit="return sub()">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>品牌添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    品牌名称：<input type="text" class="input1" id="pre_name" name="pre_name" onblur="sq()"/><span id="sss"></span>
                </div>
                <div class="bbD">
                    品牌图片：
                        <input type="file" name="pre_img"/>
                </div>

                <div class="bbD">
                    <p class="bbDP">
                        <input type="submit" class="btn_ok btn_yes" value="提交" id="tj"/>
                        <input type="reset" class="btn_ok btn_no" value="取消"/>
                    </p>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</body>
</html>
<script src="{{URL::asset('')}}js/jquery-1.8.3.js"></script>

<script type="text/javascript">
    flag=false;
    function sq(){

        var pre_name=$("#pre_name").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{url('Brand/yz')}}",
            data: "pre_name="+pre_name,
            success: function(msg){
               if(msg==0){
                   $("#sss").html('ok');
                   flag=true;
               }else{
                   var ss="该品牌已添加";
                    $("#sss").html(ss);
                   flag=false;
               }
            }

        });
        return flag;
    }
    function sub(){
        if(sq())
        {
           return true;
        }else{
            return false;
        }
    }
</script>