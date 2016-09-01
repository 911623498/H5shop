<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckSystem extends BaseCheck
{


    /**
     * 检测登录接口是否缺少参数
     */
    public function changepwd($data)
    {
		$check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'adm_pwd' => array(
                'type' => 's',
                'is_must' => 1  
            ),
			'name_id' => array(
                'type' => 's',
                'is_must' => 1  
            )
        );

        return $this -> checkParam( $data , $check_param_template );
	}
	
	 public function changepwds($data)
    {
		$check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'adm_pwd' => array(
                'type' => 's',
                'is_must' => 1  
            ),
			'name_id' => array(
                'type' => 's',
                'is_must' => 1  
            ),
			'new_pwd' => array(
                'type' => 's',
                'is_must' => 1  
            )
        );

        return $this -> checkParam( $data , $check_param_template );
	}
	
}