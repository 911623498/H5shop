<?php
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
    public $_data = '';
    public $_action=array(
        'User/user_list',
        'User/test_user',
        'Index/verify',
        'Index/test_vef',
        'Index/nuion',
        'Spec/special',
        'Spec/reds',
        'Info/shop_list'


    );
    public function __construct()
    {
        $this->_action=array_map('strtolower',$this->_action);
        //var_dump( $this->_action);die;
        $all_data = array_merge( $_POST , $_GET , $_REQUEST );
        unset( $_POST );
        unset( $_GET );
        unset( $_REQUEST );

        $this -> _data  = html_encode( $all_data );

        //参数过滤【 必须要的，防止XSS攻击以及SQL注入等 】

        //获取当前请求的控制器
        $Controller = ucwords(str_replace( __MODULE__ . '/' , '' , __CONTROLLER__ ) );

        //当前请求的方法
        $Action = ucwords(str_replace( __CONTROLLER__ . '/' , '' , __ACTION__ ) );

        //判断参数是不是缺少

        if( !in_array( $Controller ,array( 'Base' , 'Common' ) ) )
        {
            if(!in_array(strtolower($Controller.'/'.$Action),$this->_action))
            {
                //拼装格式化类
                $Check_Controller = 'Check' .$Controller;

                //反射格式化类
                $ReflectionClass = new \ReflectionClass('Home\CheckParam\\'.$Check_Controller);

                //获取格式化类的方法
                $ReflectionMethod = $ReflectionClass->getMethod($Action);

                //实例化格式化类
                $Instance = $ReflectionClass->newInstance();

                //格式化数据类型
                $error_info = $ReflectionMethod->invokeArgs( $Instance , array(   $this -> _data ) );

                //提示参数错误
                if( !empty( $error_info ) && $error_info['mark'] != 0 ){

                    $this -> failure( $error_info['mark'] , $error_info['msg'] );die;
                }
            }

        }

    }


    /**
     * 失败输出
     */
    public function failure( $error_status = 1 , $error_msg = 'ERROR' , $error_data = array()  ){

        //拼装数据
        $error_arr = array();

        //失败的状态码
        $error_arr['status'] = $error_status;

        //失败的提示信息
        $error_arr['msg'] =$error_msg;

        //失败返回的错误数据
        $error_arr['data'] = $error_data;
        echo   $json_str = json_encode( $error_arr );


    }
    /**
     * 成功输入
     */
    public function success($data = array() , $success_msg = 'success' , $success_status = 0 ){

        //拼装数据
        $error_arr = array();

        //成功的状态码
        $error_arr['status'] = $success_status;

        //成功的提示信息
        $error_arr['msg'] = $success_msg;

        //成功返回的错误数据
        $error_arr['data'] = $data;

        echo   $json_str = json_encode( $error_arr );

    }


}