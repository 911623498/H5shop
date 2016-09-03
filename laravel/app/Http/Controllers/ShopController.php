<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;
class ShopController extends Controller
{
	/**
	 * 店铺列表
	 */
	public function shoplist()
	{
        return view('shop.list');
	}
    /**
     * 店铺列表
     */
    public function shoplists()
    {
        $url="www.aaa.net/TP/index.php/Home/Shop/shoplist";
        @$data['page']=$_REQUEST['page']?$_REQUEST['page']:1;
        @$data['search']=$_REQUEST['search']?$_REQUEST['search']:"";
        $json=$this->curl_post($url,$data);
//        echo $json;
//        var_dump($arr);die;
        $res=json_decode($json,true);
        $new_arr['count']=$res['data']['count'];
        $new_arr['num']=$res['data']['num'];
        $new_arr['page']=$res['data']['page'];
        $new_arr['max_page']=$res['data']['max_page'];
        unset($res['data']['count']);
        unset($res['data']['num']);
        unset($res['data']['page']);
        unset($res['data']['max_page']);
        $new_arr['data'] = $res['data'];
        echo json_encode($new_arr);

    }
    /**
     * 店铺添加页面
     */
    public function shopadd()
    {
        return view('shop.shopadd');
    }
    /**
     * 店铺验证唯一
     */
    public function shopweiyi(Request $request)
    {
        //接值
        $data['shop_name']=$request->input('shop_name');
        $url="www.aaa.net/TP/index.php/Home/Shop/shopweiyi";
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr);
        //var_dump($res);die;
        if($res->status==1)
        {
            echo 1;
        }else{
            echo 0;
        }
    }
    /**
     * 店铺添加
     */
    public function shoptianjia(Request $request)
        {
       //接值
        $data['shop_name']=$request->input('shop_name');
        $file =$request->file('shop_img');
        //var_dump($file);die;
        $data['shop_desc']=$request->input('shop_desc');
        $data['shop_url']=$request->input('shop_url');
        if($file -> isValid()){
            $data['shop_img'] = $file -> getClientOriginalName();
//            echo $data['shop_img'];die;
            $entension = $file -> getClientOriginalExtension();
            $newName = md5(date('ymdhis').$data['shop_img']).'.'.$entension;
            $path = $file -> move('Shop/uploads',$newName);
        }
        $data['shop_img']=$newName;
        $url="www.aaa.net/TP/index.php/Home/Shop/shopadd";
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr);
        //var_dump($res);die;
        if($res->status==0)
        {
            echo "<script>alert('添加成功');location.href='shopadd'</script>";
        }else{
            echo "<script>alert('添加失败')</script>";
        }
    }
    /**
     * 删除店铺
     * [add description]
     */
    public function shopdels(Request $request)
    {
        //接值
        $data['shop_id']=$request->input('shop_id');
        $url="www.aaa.net/TP/index.php/Home/Shop/shopdels";
        $arr=$this->curl_post($url,$data);
        $res=json_decode($arr);
        //var_dump($res);die;
        if($res->status==0)
        {
            echo 0;
        }else{
            echo 1;
        }

    }
    public function curl_post($uri,$data)
    {
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $uri );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        return $return;
    }

}
