<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;


class IndexController extends CommonController {

    public function index(){
        //用户名不能为空
        $user_name = is_set($this -> _data , 'user_name' );
        if (empty($user_name)) {
            return $this -> failure( parm::PARAM_MISS ,parm::PARAM_MISS_MSG );
        }

        //密码不能为空
        $user_password = is_set( $this -> _data , 'user_password' );
        if (empty($user_password)) {
            return   $this -> failure(parm::PARAM_ERROR ,parm::PARAM_ERROR_MSG);
        }
         //获取用户登录类型
        $user_type = is_set($this -> _data , 'type' );
       // echo $user_type;die;

        //获取密码
        $user_model = M('z_user');
        $where = array(
            'u_name' => $user_name
        );

        //查询用户信息
        $user_info = $user_model->where($where)->find();
        if (empty($user_info)) {
            return  $this -> failure( error::USER_NOT_FOUND, error::USER_NOT_FOUND_MSG );
        }

        //验证密码
        if (md5($user_password) != $user_info['u_pwd'])
        {
            return  $this -> failure( error::USER_PASSWORD_ERROR,error::USER_PASSWORD_ERROR_MSG );
        }

        if($user_info['u_activate']==0)
        {
            return  $this -> failure( error::USER_IS_LOCKER,error::USER_IS_LOCKER_MSG );

        }

        $where1=array(
            'u_id'=>$user_info['u_id'],
            'type'=>$user_type
        );
        $res = M('add_type')->where($where1)->find();

       // print_r($res);die;
        $rand=mt_rand();
        $token=md5($rand);
        $time=date("Y-m-d H:i:s",time());
       // print_r($res);die;
        if(empty($res['token']))
        {

            //var_dump($User);die;
            $data['u_id'] =$user_info['u_id'];
            $data['token'] =$token;
            $data['add_time'] =$time;
            $data['type'] =$user_type;
            M('add_type')->add($data);
        }
        else
        {

            $data['u_id'] =$user_info['u_id'];
            $data['token'] =$token;
            $data['up_time'] =$time;
            // print_r($data);die;

            $where2=array(
                'u_id'=>$user_info['u_id'],
                'type'=>$user_type
            );

            $re = M('add_type')->where($where2)->save($data);
            if($re)
            {
                $user_info['token']=$token;
               // $user_info['u_id']=$user_info['u_id'];
                $user_info['type']=$user_type;
                return  $this -> success($user_info,success::LOGIN_SUCCESS_MSG,success::LOGIN_SUCCESS);
            }
        }
       // print_r($user_info);die;



    }

    public function email()
    {

           $email = is_set($this -> _data , 'email' );
        if (empty($email)) {
            return $this -> failure( parm::PARAM_MMEIAL ,parm::PARAM_MMEIAL_MSG );
        }

        //查询邮箱
        $user_model = M('z_user');
        $where = array(
            'u_email' => $email
        );

        //查询邮箱用户信息唯一
        $user_info = $user_model->where($where)->find();

        if (!empty($user_info))
        {
            return  $this -> failure( error::PARAM_MMEIAL, error::PARAM_MMEIAL_MSG );
        }

        return  $this -> success($user_info,success::EMAIL_SUCCESS_MSG,success::EMAIL_SUCCESS);

    }


    /*
     *
     * 用户注册
     * */

    public function add_user()
    {

        $email = is_set($this -> _data , 'email' );
        $password = is_set($this -> _data , 'password' );
        $code= is_set($this -> _data , 'code' );

       // echo $email;
        if (empty($password))
        {
            return $this -> failure( parm::PARAM_ERROR ,parm::PARAM_ERROR_MSG );
        }

        if (empty($code)) {
            return $this -> failure( parm::PARAM_USER ,parm::PARAM_USER_MSG );
        }

        $time=time();
        $IPaddress = $_SERVER["REMOTE_ADDR"];
        $tonken=base64_encode($email);
        $user_model = M('z_user');
        $where = array(
            'u_name' => $email,
            'u_email'=>$email,
            'u_pwd'=>md5($password),
            'u_identity'=>$code,
            'u_token_exptime'=>$time,
            'u_ip'=>$IPaddress,
            'u_activate'=>0,
            'u_lock'=>1
        );

        //用户添加
        $user_info = $user_model->add($where);
        $where['u_token']=$tonken;
        $where['u_id']=$user_info;
        //print_r($where);die;
        if($user_info)
        {

            return  $this -> success($where,success::EMAIL_SUCCESS_MSG,success::EMAIL_SUCCESS);

        }

    }

    /*
     * 激活用户
     * */

   public  function test_email()
    {

        $email = is_set($this -> _data , 'email' );
        $code = is_set($this -> _data , 'code' );
        if($email!=base64_decode($code))
        {
            return  $this ->failure(error::LOCK_MMEIAL,error::LOCK_MMEIAL_MSG );
        }
        $user_model = M('z_user');
        $where = array(
            'u_email' => $email
        );
            $re=array(
                'u_activate'=>1
            );
        $res = $user_model->where($where)->save($re);
        $arr = $user_model->where($where)->find();
        if($res)
        {
            return  $this -> success($arr,success::TEST_SUCCESS_MSG,success::TEST_SUCCESS);
        }

    }

    /*验证码*/
    function verify()
    {
        $Verify = new \Think\Verify();
        $Verify->fontSize = 30;
        $Verify->length   = 3;
        //$Verify->useNoise = false;
        $Verify->entry();


    }

    function test_vef()
    {

        $code = is_set($this -> _data , 'code' );

        $verify = new \Think\Verify();
        return $verify->check($code);

        //return  $this ->success($arr,success::TEST_SUCCESS_MSG,success::TEST_SUCCESS);

    }


    function nuion()
    {

       echo  5;

    }
}