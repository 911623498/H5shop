<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckType extends BaseCheck
{


    /**
     * 检测分类接口是否缺少参数
     */
    public function type($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'table' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }
    /**
     * 检测分类添加接口是否缺少参数
     */
    public function typeadd($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'type_name' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'type_img' => array(
                'type' => 's',
                'is_must' => 1 ,
            ),'type_pid' => array(
                'type' => 's',
                'is_must' => 1 ,
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }

    /**
     * 检测分类列表接口是否缺少参数
     */
    public function typelist($data)
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
            ),'search' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }
    /**
     * 检测分类删除接口是否缺少参数
     */
    public function typedels($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'type_id' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }
    /**
     * 检测分类修改接口是否缺少参数
     */
    public function typeupd($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'type_name' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'type_img' => array(
                'type' => 's',
                'is_must' => 1 ,
            ),'type_pid' => array(
                'type' => 's',
                'is_must' => 1 ,
            ),'type_id' => array(
                'type' => 's',
                'is_must' => 1 ,
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }


}