<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2016/9/1
 * Time: 13:58
 */
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;

class BuyController  extends CommonController
{
    public function index(){
        //获取当前时间戳
        $newTime= is_set($this -> _data , 'newTime' )?is_set($this -> _data , 'newTime' ):time();
        $user_id= is_set($this -> _data , 'user_id' );
        if(!empty($user_id)){
            $goods = M("tellme");
            $arr = $goods->where(['user_id'=>$user_id])->select();
            foreach($arr as $k=>$v){
                $arr1[$k] = $v['goods_id'];
            }

        }else{
            $arr1=array();
        }
        //获取当前的时间看时间是不是大于10：00
        //小于10点 上期爆款 其他马上抢购  大于10点是下期预告 抢购中 马上抢购
        //大于20点下期预告 抢购结束 抢购中
        //查询当前时间戳的商品
        //计算今天10:00 及20:00
        $y = date("Y");
        $m = date("m");
        $d = date("d");
        $zTime= mktime(10,0,0,$m,$d,$y);
        $wTime= mktime(20,0,0,$m,$d,$y);
        $goods = M("goods");
        if($newTime<$zTime){
            $oTime= mktime(0,0,0,$m,$d,$y)-4*3600;
            $tTime= $zTime;
            $sTime= $wTime;
            $data['上期爆款'] = $goods->where(['pre_id'=>1,'add_time'=>$oTime])->select();
            $data['10:00'] = $goods->where(['pre_id'=>1,'add_time'=>$tTime])->select();
            $data['20:00'] = $goods->where(['pre_id'=>1,'add_time'=>$sTime])->select();
        }elseif($newTime>$zTime&&$newTime<$wTime){
            $oTime= $zTime;
            $tTime= $wTime;
            $data['10:00'] = $goods->where(['pre_id'=>1,'add_time'=>$oTime])->select();
            $data['20:00'] = $goods->where(['pre_id'=>1,'add_time'=>$tTime])->select();
        }elseif($newTime>$wTime){
            $oTime= $zTime;
            $tTime= $wTime;
            $sTime= mktime(24,0,0,$m,$d,$y)+10*3600;
            $data['10:00'] = $goods->where(['pre_id'=>1,'add_time'=>$oTime])->select();
            $data['20:00'] = $goods->where(['pre_id'=>1,'add_time'=>$tTime])->select();
            $data['下棋预告'] = $goods->where(['pre_id'=>1,'add_time'=>$sTime])->select();
        }
        //echo  $tTime;
        foreach($data as $k=>$v){
            foreach($v as $kk=>$vv){
                if(in_array($vv['goods_id'],$arr1)){
                    //1是已提醒 2是未提醒
                    $data[$k][$kk]['tell']=1;
                }else{
                    $data[$k][$kk]['tell']=2;
                }
            }
        }
        return  $this -> success($data,success::CATE_SUCCESS_MSG,success::CATE_SUCCESS);
    }
    public function tell(){

        $data['goods_id']= is_set($this -> _data , 'goods_id' );
        $data['t_time']= is_set($this -> _data , 't_time' );
        $data['user_id']= is_set($this -> _data , 'user_id' );
        $tellMe = M("tellme");
        $re = $tellMe->add($data);
        if($re){
            return  $this -> success($re,success::TELLME_SUCCESS_MSG,success::TELLME_SUCCESS);
        }else{
            return $this -> failure( parm::TELLME_ADD ,parm::TELLME_ADD_MSG );
        }
    }
    public function tellDel(){

        $data['goods_id']= is_set($this -> _data , 'goods_id' );
        $data['t_time']= is_set($this -> _data , 't_time' );
        $data['user_id']= is_set($this -> _data , 'user_id' );
        $tellMe = M("tellme");
        $re = $tellMe->where($data)->delete();
        if($re){
            return  $this -> success($re,success::TELLDEL_SUCCESS_MSG,success::TELLDEL_SUCCESS);
        }else{
            return $this -> failure( parm::TELLME_DEL ,parm::TELLME_DEL_MSG );
        }
    }

}