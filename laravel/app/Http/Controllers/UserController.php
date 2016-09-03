<?php
namespace App\Http\Controllers;

use Validator,DB,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Input;
use App\Http\Models\Role_type;

class UserController extends Controller
{
	/**
	 * 管理员列表
	 * @return [type] [description]
	 */
	public function user(Request $request)
	{
		/*$pageNum=$request->input('pageNum')?$request->input('pageNum'):0;
		$sou=$request->input('sou')?$request->input('pageNum'):'';
		$uri = 'http://www.shop.com/H5shop/TP/Home/user/user';
        $data = ['pageNum'=>$pageNum,'sou'=>$sou];
        $json_user =$this->curl_post($uri,$data);
		 $arr = json_decode($json_user,true);*/
		//print_r($arr);die;
		return view('user.user');
	}
	
	public function pages(Request $request){
		$pageNum=$request->input('pageNum')?$request->input('pageNum'):0;
		$sou=$request->input('sou')?$request->input('pageNum'):'';
		$sou=$request->input('sou');
		$uri = 'http://www.aaa.net/TP/index.php/Home/user/user';
        $data = ['pageNum'=>$pageNum,'sou'=>$sou];
        $json_user =$this->curl_post($uri,$data);
		 $arr = json_decode($json_user,true);
		 //print_r($arr);die;
		return $json_user;
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