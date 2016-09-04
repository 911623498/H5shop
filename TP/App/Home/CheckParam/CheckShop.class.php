<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckShop extends BaseCheck
{


    /**
     * 检测店铺添加接口是否缺少参数
     */
    public function shopadd($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'shop_name' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'shop_img' => array(
                'type' => 's',
                'is_must' => 1 ,
            ),'shop_desc' => array(
                'type' => 's',
                'is_must' => 1 ,
            ),'shop_url' => array(
                'type' => 's',
                'is_must' => 1 ,
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }

    /**
     * 检测店铺列表接口是否缺少参数
     */
    public function shoplist($data)
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
            ), 'search' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }
    /**
     * 检测店铺删除接口是否缺少参数
     */
    public function shopdels($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'shop_id' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }
    /**
     * 验证店铺唯一接口是否缺少参数
     */
    public function shopweiyi($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'shop_name' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }




}