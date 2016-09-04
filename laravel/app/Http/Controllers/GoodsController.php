<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

class GoodsController extends Controller
{
	/**
	 * 商品列表
	 * @return [type] [description]
	 */
	public function goodslist()
	{
        @$data['page']=$_REQUEST['page']?$_REQUEST['page']:1;
        if($data['page'] == 0){
            $data['page'] = 1;
        }
        $url="http://www.aaa.net/TP/index.php/Home/Goods/goodslist";
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr,true);
//        print_r($res);die;
        $last=$res['data']['page']-1<1?1:$res['data']['page']-1;
        $next=$res['data']['page']+1>$res['data']['max_page']?$res['data']['max_page']:$res['data']['page']+1;

        $res['str']="<a href='goodslist?page=1'>首页</a>";
        $res['str'].="<a href='goodslist?page=".$last."'>上一页</a>";
        $res['str'].="<a href='goodslist?page=".$next."'>下一页</a>";
        $res['str'].="<a href='goodslist?page=".$res['data']['max_page']."'>尾页</a>";

        return view('goods.goodslist',['res'=>$res]);
	}

	/**
	 * 商品添加页面
	 * @return [type] [description]
	 */
	public function goodsadd()
	{
        $sql="select pre_id,pre_name from prefecture";
        $zq=DB::select($sql);
        $sqls="select type_id,type_name from type_list";
        $lx=DB::select($sqls);
        $sql2="select shop_id,shop_name from shop";
        $dp=DB::select($sql2);
//        print_r($dp);die;
		return view('goods.goodsadd',['zq'=>$zq,'lx'=>$lx,'dp'=>$dp]
        );
	}

    /**
     * 添加商品
     */
    public function add_data(){
        $data['goods_name']=$_POST['goods_name'];
        $data['pre_id']=$_POST['pre_id'];
        $data['type_id']=$_POST['type_id'];
        $data['shop_id']=$_POST['shop_id'];
        $data['goods_url']=$_POST['goods_url'];
        $data['goods_price']=$_POST['goods_price'];
        $data['goods_rebate']=$_POST['goods_rebate'];
        $data['goods_seckill']=$_POST['goods_seckill'];
        $data['add_time']=$_POST['add_time'];
        $data['end_time']=$_POST['end_time'];
        $data['goods_desc']=$_POST['goods_desc'];
        $data['goods_num']=$_POST['goods_num'];
        $data['is_hot']=$_POST['is_hot'];
        $data['is_show']=$_POST['is_show'];
        $data['add_time']=strtotime($data['add_time']);
        $data['end_time']=strtotime($data['end_time']);
        $files=$_FILES['goods_img'];
        //图片的保存路径
        $path="img/shop/";
        $path=$path.$files['name'];
        $tmp_name=$files['tmp_name'];
        $data['goods_img']=$files['name'];
        $tool=move_uploaded_file($tmp_name,$path);
        if($tool){
            $url="http://www.aaa.net/TP/index.php/Home/Goods/goodsadd";
            $arr=$this->curl_post($url,$data);
            $res=json_decode($arr,true);
            if($res['status'] == 1){
                echo "<script>alert('添加成功');location.href='goodslist'</script>";
            }
        }
    }


    /**
     * @param $url
     * @param $data
     * @return mixed
     * CURL
     */
    public function curl_post($url,$data)
    {
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS,$data);
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        return $return;
    }
}