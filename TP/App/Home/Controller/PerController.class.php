<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;


class PerController extends CommonController {
	/**
	 * 品牌添加接口
	 */
	public function peradd(){
		$pre_name= is_set($this -> _data , 'pre_name' );
		$img_name= is_set($this -> _data , 'img_name' );
		
		
		if (empty($pre_name)) {
            return $this -> failure( error::PINPAI_MAME ,error::PINPAI_MAME_MSG );
        }
        if (empty($img_name)) {
            return $this -> failure( error::PINPAI_IMG ,error::PINPAI_IMG_MSG );
        }
        	$data['pre_name']=$pre_name;
        	$data['pre_img']=$img_name;
        	$User = D("prefecture"); // 实例化User对象
        	$res=$User->add($data);
        	if($res){
        		return $this -> failure( success::PINPAI_SUCCESS ,success::PINPAI_SUCCESS_MSG );
        	}
	}
	public function perlist(){
	     $page= is_set($this -> _data , 'page' );
	     $page_size=empty($_REQUEST['page_size']) ? 2 : $_REQUEST['page_size'];
        //echo $num;die;
        $type = M('prefecture');
        // 查询满足要求的总记录数
        $count      = $type->count();
        //每页显示条数
        $num=5;
        // 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page       = new \Think\Page($count,$num);
        // 分页显示输出
        $max_page=ceil($count/$num);
        //计算偏移量
        $limit=($page-1)*$num;
        $res['list']=$type->limit($limit,$num)->select();
        $res['count']=$count;
        $res['num']=$num;
        $res['page']=$page;
        $res['max_page']=$max_page;
        if(!empty($res))
        {
            return $this -> success($res, success::PERLIST_SUCCESS ,success::PERLIST_SUCCESS_MSG );


		}
	}
	public function perdel(){
		$pre_id= is_set($this -> _data , 'id' );
        //查询数据库该品牌下是否有商品
        $sas=M('goods')->query("select pre_id from goods");
        $rea_name="";
        foreach ($sas as $k => $v) {
            foreach ($v as $kk => $vv) {
                $rea_name[$k] = $vv;
            }
        }
        if(in_array($pre_id,$rea_name)){
            return $this->failure(error::PINPAI_DEL,error::PINPAI_DEL_MSG);
        }else{
            $user=M('prefecture');
            $res=$user->where("pre_id='$pre_id'")->delete();
            if($res){
                return $this -> failure(success::PERDEL_SUCCESS ,success::PERDEL_SUCCESS_MSG );
            }
        }

	}
}