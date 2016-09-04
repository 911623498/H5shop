<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckUser extends BaseCheck
{


    /**
     * 检测登录接口是否缺少参数
     */
    public function user($data)
    {
		$check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'pageNum' => array(
                'type' => 's',
                'is_must' => 1  
            ),'sou' => array(
                'type' => 's',
                'is_must' => 1  
            )
        );

        return $this -> checkParam( $data , $check_param_template );
	}
	
	
}