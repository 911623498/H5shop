<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckSpec extends BaseCheck
{

    function detail($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'id' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );
    }

    function add_shop($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'u_name' =>array(
                'type' => 's',
                'is_must' => 1
            ),
            'areas' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'goods_id' => array(
                'type' => 'i',
                'is_must' => 1
            ),
            'moneys' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'phones' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'poss' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'new_money' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'user_id' => array(
                'type' => 's',
                'is_must' => 1
            )

        );

        return $this -> checkParam( $data , $check_param_template );
    }

    function shop_list($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'user_id' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );
    }
    function seckill($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'id' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );
    }

    function shop($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'id' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );
    }

}
