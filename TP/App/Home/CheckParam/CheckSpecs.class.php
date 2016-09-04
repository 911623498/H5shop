<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckSpecs extends BaseCheck
{

   function Sel_Newshop($data)
   {

       $check_param_template = array(
       /**
        * type 表示类型
        * is_must 表示是否必须[1、必须]
        * enum 表示参数必须在数组的值之中
        */
       'goods_id' => array(
           'type' => 'I',
           'is_must' => 1
       )
   );
       return $this -> checkParam( $data , $check_param_template );
   }

}