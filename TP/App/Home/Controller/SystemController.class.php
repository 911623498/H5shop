<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;


class SystemController extends CommonController {
	//验证密码
	public function changepwd(){
		$user_pwd = is_set($this -> _data , 'adm_pwd' );
		$name_id = is_set($this -> _data , 'name_id' );
		$User = M("admin"); // 实例化User对象
		$data = $User->where("adm_id='$name_id' and adm_pwd=md5('$user_pwd')")->find();
		/* if($data){
			return  $this -> success($data,success::USER_MSG,success::USER_PWD_MSG);
		}else{
			return   $this -> failure(parm::USER_PWD ,parm::USER_PWD_MSG);
		} */
		echo json_encode( $data );
	}
	//修改密码
	public function changepwds(){
		$user_pwd = is_set($this -> _data , 'adm_pwd' );
		$name_id = is_set($this -> _data , 'name_id' );
		$new_pwd = is_set($this -> _data , 'new_pwd' );
		$User = M("admin"); 
		$User->adm_pwd = md5($new_pwd);
		$data = $User->where("adm_id='$name_id' and adm_pwd=md5('$user_pwd')")->save();
		//echo json_encode( $data );
		if($data){
			echo json_encode( ['msg'=>"修改成功！",'status'=>0] );
		}else{
			echo json_encode( ['msg'=>"修改失败！",'status'=>1] );
		}
		
	}
}