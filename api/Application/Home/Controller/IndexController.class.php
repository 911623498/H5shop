<?php
namespace Home\Controller;

use Home\Controller\CommonController;
use Home\Status\Status;

/**
 * Class IndexController
 * @package Home\Controller
 *
 * 考虑如何防止暴力破解密码
 *
 */
class IndexController extends CommonController
{
    /**
     * 最简单的接口 -- 80行代码
     * 重复的代码比较多
     */
    public function login1()
    {

        //用户名不能为空
        if (empty($_REQUEST['user_name'])) {
            $return_arr = array(
                'status' => 1,
                'msg' => 'account_name is null',
                'data' => array()
            );

            echo json_encode($return_arr);
            exit;
        } else {
            $user_name = $_REQUEST['user_name'];
        }


        //密码不能为空
        if (empty($_REQUEST['user_password'])) {
            $return_arr = array(
                'status' => 2,
                'msg' => 'password is null',
                'data' => array()
            );

            echo json_encode($return_arr);
            exit;
        } else {
            $user_password = $_REQUEST['user_password'];
        }

        //获取密码
        $user_model = M('user');

        $where = array(
            'user_name' => $user_name,
            'status' => 1
        );

        //查询用户信息
        $user_info = $user_model->where($where)->find();

        if (empty($user_info)) {
            $return_arr = array(
                'status' => 2,
                'msg' => 'not found user',
                'data' => array()
            );

            echo json_encode($return_arr);
            exit;
        }

        //验证密码
        if (make_password($user_password,$user_info['slat']) != $user_info['user_psd']) {
            $return_arr = array(
                'status' => 2,
                'msg' => 'password error',
                'data' => array()
            );
            echo json_encode($return_arr);
            exit;
        } else {
            $return_arr = array(
                'status' => 0,
                'msg' => 'success',
                'data' => array(
                    $user_info
                )
            );
            echo json_encode($return_arr);
            exit;
        }
    }

    /**
     * 抽出公共方法
     * 好处:
     *   同样的需求，少了一半的代码量，而且逻辑看起来也比较清晰
     *   就算后期要加需求，也方便管理  【比如接口要支持XML格式】
     *
     * 问题：
     *  1、如果要求修改提示怎么办？ 【友好的提示,这种需求在实际开发中会遇到很多的，大家考虑下怎么办才能做到我们尽量的少改动】
     *     统一加吗？去修改每一个文件吗？
     *  2、如果要求返回值格式怎么办？ 每个方法都手动去修改返回值吗？
     *  3、如果我们这个方法有10个参数要传递，我们需要手动的把10个参数全部判断一次吗？
     */
    public function login2()
    {

        //用户名不能为空
        $user_name = IsNaN($_REQUEST, 'user_name' );
        $user_password = IsNaN($_REQUEST, 'user_password');

        if ($user_name == '' || $user_password == '') {
            $this->failure(1, 'user_password or account_name is null');
        }

        //获取密码
        $user_model = M('user');

        $where = array(
            'user_name' => $user_name,
            'status' => 1
        );

        //查询用户信息
        $user_info = $user_model->where($where)->find();

        //没有找到对应的用户信息
        if (empty($user_info)) {
            $this->failure(1, 'not found user');
        }

        //判断密码
        if (make_password($user_password, $user_info['slat']) != $user_info['user_psd']) {
            $this->failure(1, 'password error');
        } else {
            $this->success($user_info);
        }
    }


    /**
     * 登录方法3
     * 经过抽象之后的方法
     */
    public function login3()
    {

        //用户名不能为空
        $user_name = IsNaN($_REQUEST, 'user_name');
        $user_password = IsNaN($_REQUEST, 'user_password');

        //获取密码
//        $user_model = M('user');

        $where = array(
            'user_name' => $user_name,
            'status' => 1
        );

        //查询用户信息
        //$user_info = $user_model->where($where)->find();

        //没有找到对应的用户信息
        if (empty($user_info)) {
            $this->failure( Status::USER_NOT_FOUND , Status::USER_NOT_FOUND_MSG );
        }

        //判断密码
        if (make_password($user_password, $user_info['slat']) != $user_info['user_psd']) {
            $this->failure(  Status::USER_PASSWORD_ERROR, Status::USER_PASSWORD_ERROR_MSG);
        } else {
            $this->success($user_info);
        }
    }


}