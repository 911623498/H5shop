<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

header("content-type:text/html;charset=utf-8");

class IndexController extends Controller
{
	/**
	 * 首页显示
	 * @return [type] [description]
	 */
	public function index()
	{
		return view('admin.index');
	}

	/**
	 * 登录页面
	 * @return [type] [description]
	 */
	public function login()
	{

        //echo 55;die;
		return view('admin.log');
	}

    /**
     * 获取用户信息
     * @return [type] [description]
     */

    function reuser(Request $request)
    {
        $name=$request->input('name');
        $pwd=$request->input('pwd');
        $uri = 'http://www.aaa.net/H5/TP/index.php/Home/Index/index';
        $data = ['user_name'=>$name,'user_password'=>$pwd];
        $json_user =$this->curl_post($uri,$data);
        $arr = json_decode($json_user,true);
        print_r($arr);

    }
    /*
     * curl 调用接口
     * */
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


	/**
	 * 头部
	 * @return [type] [description]
	 */
	public function head()
	{
		return view('admin.head');
	}

	/**
	 * 左边
	 * @return [type] [description]
	 */
	public function left()
	{
		return view('admin.left');
	}

	/**
	 * 右边
	 * @return [type] [description]
	 */
	public function right()
	{
		return view('admin.right');
	}
}