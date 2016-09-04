<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\CommController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

header("content-type:text/html;charset=utf-8");

class LoginController extends CommController
{
	
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
        $uri = 'http://www.aaa.net/TP/index.php/Home/index/index';
        $data = ['user_name'=>$name,'user_password'=>$pwd];
        $json_user =$this->curl_post($uri,$data);
        $arr = json_decode($json_user,true);
		if($arr['status']==0){
			session_start();
			$_SESSION['user'] = $name;
			$_SESSION['user_id'] = $arr['data']['adm_id'];
		}
        print_r($json_user);die;
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

}
