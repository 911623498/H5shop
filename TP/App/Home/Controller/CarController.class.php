<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2016/9/3
 * Time: 9:38
 */
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;

class CarController  extends CommonController
{
    public function index()
    {
        //接收user_id
        $user_id= is_set($this -> _data , 'user_id' );
        $goods = M("tellme");
        $data = $goods->where(['user_id'=>$user_id])->join('goods ON tellme.goods_id = goods.goods_id')->order('tell_id desc')->select();
        return  $this -> success($data,success::CATE_SUCCESS_MSG,success::CATE_SUCCESS);
    }
    public function del(){
        $data['user_id']= is_set($this -> _data , 'user_id' );
        $data['tell_id']= is_set($this -> _data , 'tell_id' );
        $tellMe = M("tellme");
        $re = $tellMe->where($data)->delete();
        if($re){
            return  $this -> success($re,success::TELLDEL_SUCCESS_MSG,success::TELLDEL_SUCCESS);
        }else{
            return $this -> failure( parm::TELLME_DEL ,parm::TELLME_DEL_MSG );
        }
    }

}