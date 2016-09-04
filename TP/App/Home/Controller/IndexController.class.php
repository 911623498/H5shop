<?php
namespace Home\Controller;
use Think\Controller;
use Home\status\parm;
use Home\status\error;
use Home\status\success;

class IndexController extends CommonController {


    /**
     * d登录
     * [index description]
     * @return [type] [description]
     */
    public function index(){
        //用户名不能为空
        $user_name = is_set($this -> _data , 'userName' );
        if (empty($user_name)) {
            return $this -> failure( parm::PARAM_MISS ,parm::PARAM_MISS_MSG );
        }

        //密码不能为空
        $user_password = is_set( $this -> _data , 'password' );
        if (empty($user_password)) {
            return   $this -> failure(parm::PARAM_ERROR ,parm::PARAM_ERROR_MSG);
        }

        //获取密码
        $user_model = M('users');
        $where = array(
            'user_name' => $user_name
        );

        //查询用户信息
        $user_info = $user_model->where($where)->find();

        if (empty($user_info)) 
        {
            return  $this -> failure( error::USER_NOT_FOUND, error::USER_NOT_FOUND_MSG );
        }

        //验证密码
        if (md5($user_password) != $user_info['user_pwd'])
        {
            return  $this -> failure( error::USER_PASSWORD_ERROR,error::USER_PASSWORD_ERROR_MSG );
        }


        $rand=mt_rand();
        $token=md5($rand);
        $time=date("Y-m-d H:i:s",time());

        $data['user_token'] =$token;
        $user_id = $user_info['user_id'];
        $re = $user_model->where('user_id='.$user_id)->save($data);

        $name_pwd = array(
                'user_name' => $user_name,
                'user_pwd'=>md5($user_password) ,
            );
        $user_info1 = $user_model->where($where)->find();

        if($re){
            return  $this -> success($user_info1,success::LOGIN_SUCCESS_MSG,success::LOGIN_SUCCESS);
        }else{
            return  $this -> success($user_info1,success::LOGIN_SUCCESS_MSG,success::LOGIN_SUCCESS);
        }
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
     * 用户注册
     */

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



    /**
     * 修改密码
     * [up_pwd description]
     * @return [type] [description]
     */
    public function up_pwd()
    {
        /**
         * 接受数据
         */
        //接受用户ID
        $user_id = is_set($this -> _data , 'user_id' );

        //查询用户是否存在
        $users = M('users');
        $user_info = $users -> where(array('user_id' => $user_id))-> find();
// print_r($user_info);die;
        //接受原密码
        $old_pwd = is_set($this -> _data , 'old_pwd' );

        if(md5($old_pwd ) != $user_info['user_pwd']){
            return  $this ->failure(error::ERROR_PWD,error::ERROE_CHECK_PWD );
        }



        //接受新密码
        $new_pwd = is_set($this -> _data , 'new_pwd' );
        //判断新密码长度
        $len = strlen($new_pwd);

        if( $len<6 || $len>12 ){
            return  $this ->failure(error::ERROR_LEN,error::ERROE_PWD_STRLEN );
        }

        $data['user_pwd'] = md5($new_pwd);
        $res = $users->where(array('user_id' => $user_id))->save($data);
        if($res){
            return  $this ->success(array(),success::PWD_SUCCESS_MSG,success::PWD_SUCCESS);
        }
    }



}