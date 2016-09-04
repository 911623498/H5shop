<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2016/9/3
 * Time: 9:38
 */
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckCar extends BaseCheck
{

    function index($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]传值
             * enum 表示参数必须在数组的值之中
             */
            'user_id' => array(
                'type' => 'i',
                'is_must' => 1
            )
        );
        return $this -> checkParam( $data , $check_param_template );
    }
    function del($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]传值
             * enum 表示参数必须在数组的值之中
             */
            'user_id' => array(
                'type' => 'i',
                'is_must' => 1
            ),
            'tell_id' => array(
                'type' => 'i',
                'is_must' => 1
            )
        );
        return $this -> checkParam( $data , $check_param_template );
    }
}