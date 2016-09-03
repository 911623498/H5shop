<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

class SystemController extends Controller
{
	/**
	 * 用户信息
	 * @return [type] [description]
	 */
	public function changepwd()
	{
		$uri = 'http://www.aaa.net/TP/index.php/Home/System/changepwd';
		//session_start();
		$name=$_SESSION['user'];
		$name_id=$_SESSION['user_id'];
		//echo $name_id;die;
        $data = ['user_name'=>$name];
        $json_user =$this->curl_post($uri,$data);
        $arr = json_decode($json_user,true);
        //print_r($arr);die;
		return view('system.changepwd',['name'=>$name,'name_id'=>$name_id]);
	}
	/**
	 * 验证密码
	 * 
	 */
	public function change(Request $request){
		$pwd=$request->input('pwd');
		$name_id=$_SESSION['user_id'];
		$data = ['adm_pwd'=>$pwd,'name_id'=>$name_id];
		$uri = 'http://www.aaa.net/TP/index.php/Home/System/changepwd';
		$json_user =$this->curl_post($uri,$data);
        $arr = json_decode($json_user,true);
		return ($arr);
	}
	/**
	 * 修改密码
	 *
	 */
	public function changepwds(Request $request){
		$name_id=$_SESSION['user_id'];
		$pwd=$request->input('pwd');
		$new_pwd=$request->input('new_pwd');
		$data = ['adm_pwd'=>$pwd,'name_id'=>$name_id,'new_pwd'=>$new_pwd];
		$uri = 'http://www.shop.com/H5shop/TP/Home/System/changepwds';
		$json_user =$this->curl_post($uri,$data);
        //$arr = json_decode($json_user,true);
		return ($json_user);
	}
	/**
	 * 退出登陆
	 * 
	 */
	public function tuichu(){
        unset($_SESSION['user']);
        unset($_SESSION['user_id']);
        return redirect('/');
	}
	
	//接口
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