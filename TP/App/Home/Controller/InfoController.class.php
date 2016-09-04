<?php
/**
 * Created by PhpStorm.
 * User: 远方
 * Date: 2016/7/15
 * Time: 20:49
 */

namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;

Class InfoController extends CommonController
{
        /*
         *首页商品展示
         * */
    public function shop_list()
    {


        $prefecture = M('prefecture')->order('pre_id asc')->select();

       foreach($prefecture as $k=>$v)
       {
        if($v['pre_id']==5)
        {
          unset($prefecture[$k]);
        }
         else
           {
               $prefecture[$k]['son']= M('goods')->where("is_show=2 and pre_id=".$v['pre_id']."")->order('goods_id desc')->select();

           }
       }

         $beginThismonth=mktime(0,0,0,date('m'),date('d'),date('Y'));

        //echo date("Y-m-d H:i:s",$beginThismonth);$beginThismonth;die;
        $endThismonth=mktime(23,59,59,date('m'),date('d'),date('Y'));
        $pref = M('prefecture')->where("pre_id=5")->order('pre_id asc')->find();
        $pref['son']= M('goods')->where("is_show=2 and pre_id=".$pref['pre_id']." and add_time BETWEEN '$beginThismonth' AND '$endThismonth'")->order('goods_id desc')->select();

        $data['seckill']=$pref;


        // print_r($prefecture);die;

        $data['goods']=$prefecture;
        $shop = M('shop')->order('shop_id desc')->limit(8)->select();
       // print_r($shop);
        $data['shop']=$shop;
        return  $this -> success($data,success::SPEC_SUCCESS_MSG,success::SPEC_SUCCESS);

    }

}
?>