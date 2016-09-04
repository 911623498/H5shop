<?php
namespace Home\CheckParam;
/**
 * 缺少参数的提示
 */
class CheckIndex extends BaseCheck
{
    /**
     * 检测登录接口是否缺少参数
     */
    public function index($data)
    {
        $check_param_template = array(
            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'userName' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'password' => array(
                'type' => 's',
                'is_must' => 1 ,
                'enum_array' => array(
                )
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }

    /**
     * 邮箱验证唯一
     */
    public function email($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'email' => array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }


    /**
     * 用户注册
     */
    public function add_user($data)
    {

        $check_param_template = array(

            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'email' => array(
                'type' => 's',
                'is_must' => 1,
                'enum_array' => array(

                )
            ),
            'password' => array(
                'type' => 's',
                'is_must' => 1 ,
                'enum_array' => array(
                ),
                'code'=>array(
                    'type' => 's',
                    'is_must' => 1,
                    'enum_array' => array(
                        1,2
                    )

                )
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }


    /*
     * 激活用户
     * */

    public function test_email($data)
    {

        $check_param_template = array(
            /**
             * type 表示类型
             * is_must 表示是否必须[1、必须]
             * enum 表示参数必须在数组的值之中
             */
            'email' => array(
                'type' => 's',
                'is_must' => 1
            ),
                'code'=>array(
                    'type' => 's',
                    'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );

    }



    //修改密码
    public function up_pwd($data)
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
            ),
            'old_pwd' => array(
                'type' => 's',
                'is_must' => 1
            ),
            'new_pwd'=>array(
                'type' => 's',
                'is_must' => 1
            )
        );

        return $this -> checkParam( $data , $check_param_template );
    }

}