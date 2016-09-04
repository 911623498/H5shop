<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckBuy extends BaseCheck
{

    function index($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]传值
             * enum 表示参数必须在数组的值之中
             */
            'newTime' => array(
                'type' => 's',
                'is_must' => 0
            ),
            'user_id' => array(
                'type' => 'i',
                'is_must' => 0
            )
        );

        return $this -> checkParam( $data , $check_param_template );
    }
    function tell($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]传值
             * enum 表示参数必须在数组的值之中
             */
            'goods_id' => array(
                'type' => 'i',
                'is_must' => 1
            ),
            't_time' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'user_id' => array(
                'type' => 'i',
                'is_must' => 1
            )
        );
    }
        function tellDel($data)
        {
            $check_param_template = array(
                /**
                 * type 表示类型
                 * is_must 表示是否必须[1、必须]传值
                 * enum 表示参数必须在数组的值之中
                 */
                'goods_id' => array(
                    'type' => 'i',
                    'is_must' => 1
                ),
                't_time' => array(
                    'type' => 's',
                    'is_must' => 0
                ),
                'user_id' => array(
                    'type' => 'i',
                    'is_must' => 1
                )
            );
        return $this -> checkParam( $data , $check_param_template );
    }
}