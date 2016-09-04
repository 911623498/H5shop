<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckGoods extends BaseCheck
{

   function goodsadd($data)
   {

       $check_param_template = array(

           /**
            * type 表示类型
            * is_must 表示是否必须[1、必须]
            * enum 表示参数必须在数组的值之中
            */
           'goods_name' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'pre_id' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'type_id' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'shop_id' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'goods_url' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'goods_price' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'goods_rebate' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'goods_seckill' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'add_time' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'end_time' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'goods_desc' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'goods_num' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'is_hot' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'is_show' => array(
               'type' => 's',
               'is_must' => 1
           ),
           'goods_img' => array(
               'type' => 's',
               'is_must' => 1
           ),
       );

       return $this -> checkParam( $data , $check_param_template );
   }
   
   function goodslist($data)
   {

       $check_param_template = array(

           /**
            * type 表示类型
            * is_must 表示是否必须[1、必须]
            * enum 表示参数必须在数组的值之中
            */
           'page' => array(
               'type' => 's',
               'is_must' => 1
           )
       );

       return $this -> checkParam( $data , $check_param_template );
   }

}