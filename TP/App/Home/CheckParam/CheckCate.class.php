<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckCate extends BaseCheck
{

    function index($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]传值
             * enum 表示参数必须在数组的值之中
             */
            'type' => array(
                'type' => 's',
                'is_must' => 0
            )
        );

        return $this -> checkParam( $data , $check_param_template );
    }
    function  show($data){
        $check_param_template = array(

            /**
             * type表示类型
             * is_must 表示是否必须【1，是必须】传值
             * enum via哦是参数必须在数组的值之间
             */
            'type_id'=>array(
                'type'=>'i',
                'is_must'=>1
            ),
            'page'=>array(
                'type'=>'i',
                'is_must'=>0
            ),
            'pageNum'=>array(
                'type'=>'i',
                'is_must'=>0
            )
        );
        return $this->checkParam($data , $check_param_template);
    }
    function  search($data){
        $check_param_template = array(
            /**
             * type表示类型
             * is_must 表示是否必须【1，是必须】传值
             * enum via哦是参数必须在数组的值之间
             */
            'sh'=>array(
                'type'=>'s',
                'is_must'=>1
            )
        );
        return $this->checkParam($data , $check_param_template);
    }






}