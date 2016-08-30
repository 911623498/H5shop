<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckNew extends BaseCheck
{

   function new_type($data)
   {

       $check_param_template = array(

           /**
            * type 表示类型
            * is_must 表示是否必须[1、必须]
            * enum 表示参数必须在数组的值之中
            */
           'type' => array(
               'type' => 's',
               'is_must' => 1
           )
       );

       return $this -> checkParam( $data , $check_param_template );
   }


    function new_list($data)
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
            ),
            'page_num' => array(
                'type' => 's',
                'is_must' => 0
            ),
            'tid' => array(
                'type' => 's',
                'is_must' => 1
            ),

        );

        return $this -> checkParam( $data , $check_param_template );
    }



}