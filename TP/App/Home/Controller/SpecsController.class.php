<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;

Class SpecsController extends CommonController
{
	/**
	 * 查询新品数据
	 * [Newshop description]
	 */
	public function Newshop()
	{
		//实例化表
		$goods = M('goods');
		//查询
		$list = $goods->where('is_show=2')->order('add_time','desc')->limit(20)->select();
		//返回
		if(empty($list)){
			$this->failure( error::EMPTY_DATA , error::EMPTY_DATA_MSG  , $list );
		}else{
			$this->success( $list , success::SPECS_SUCCESS_MSG , success::SPECS_SUCCESS );			
		}
	}


	public function sel_Newshop()
	{
        //接受查询商品ID
        $goods_id = $title = is_set( $this->_data,'goods_id' );
		//实例化表
		$goods = M('goods');
		//查询
		$list = $goods->where(array(['goods_id='.$goods_id,'is_show'=>2]))->select();
        if(empty($list)){
            $this->failure( error::EMPTY_DATA , error::EMPTY_DATA_MSG  , $list );
        }else{
            $this->success( $list , success::SPECS_SUCCESS_MSG , success::SPECS_SUCCESS );
        }
	}

}
?>