<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Session;
class UserController extends CommonController{
    public $enableCsrfValidation = false;
    public $layout=false;


    /**
     * 登录
     * [actionLogin description]
     * @return [type] [description]
     */
//    public function actionLogin()
//    {
//        return $this->render('login');
//    }

    /*
     * 用户中心
     *  登录
     */
    public function actionIndex()
    {
        //判断用户是否登录
        $session = Yii::$app->session;
        $session->open();
        $user = $session->get('user');
//        print_r($user);die;
        $session->close();
        if(empty($user)){
            return $this->render('login');
        }else{
            return $this->render('member');
        }
    }


    /**
     * 登录
     */
    public function actionLogin_ok()
    {

        $url = "http://www.aaa.net/TP/Home/index/index";

        //接受用户账号密码
        $request = \Yii::$app->request;
        $data = $request->post();
        $output = $this->curl_Api($url , $data);
        // print_r($output);die;
        $user_info = json_decode($output,true);
        // print_r($user_info);die;
        if($user_info['status'] == 0){
            $session = Yii::$app->session;
            $session->open();
            $session->set('user',$user_info['data']);
            $session->close();
            $user_info['status'];
        }
        echo json_encode($user_info);
    }

    /**
     * 安全设置
     */
    public function actionAecurity()
    {
        return $this->render('saftystep');
    }

    /**
     * 修改密码
     */
    public function actionPwd()
    {
        $post = $_SERVER['REQUEST_METHOD']=='POST';

        if($post){
            //取出哪个用户修改密码
            $session = Yii::$app->session;
            $session->open();
            $user = $session->get('user');
            $session->close();
            //接口URL地址
            $url = "http://www.aaa.net/TP/Home/index/up_pwd";
            $request = \Yii::$app->request;

            //接受传递过来的数据
            $data = $request->post();
            $data['user_id'] = $user['user_id'];
//print_r($data);die;
            //使用curl传值 调用接口修改密码
            $output = $this->curl_Api($url,$data);
//            print_r($output);die;
            $result = json_decode($output,true);
            if($result['status'] == 0){
                $session = \Yii::$app->session;
                $session->open();
                $session->destroy();
                $session->close();
                //echo "<script>alert('修改成功，请重新登录');location.href='index.php?r=user/index'</script>";
            }
            echo $output;
        }else{
            return $this->render('password');
        }
    }

    /**
     * 退出
     */
    public function actionLogin_out()
    {
        $session = \Yii::$app->session;
        $session->open();
        $session->destroy();
        $session->close();
        echo "<script>alert('退出成功');location.href='index.php?r=index/index'</script>";
    }

  /*
   * 设置中心
   */
    public function actionSys()
    {
        return $this->render('saftystep');
    }

    /*
    * 绑定手机号
    *
    */
    public function actionPhone()
    {
        return $this->render('boundphone');
    }


   /*
    * 账号余额
    */
    public function actionMoney()
    {
        return $this->render('records');
    }



    /**
     * 接口调用
     * [curl_Api description]
     * @param  [type]  $url  [description]
     * @param  integer $data [description]
     * @return [type]        [description]
     */
    private function curl_Api($url,$data=1)
    {
        //模拟POST请求(使用CURL);
        //①创建CURL句柄
        $ch = curl_init();
        //设置CURL
        curl_setopt($ch,CURLOPT_URL,$url);
        //捕获内容但不输出
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //模拟POST请求
        curl_setopt($ch,CURLOPT_POST,1);
        //发送POST请求是传递数据
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        //执行CURL
        $output = curl_exec($ch);
        if($output === false) {
            return curl_error($ch);
        }else{
            return $output;
        }
        //关闭CURL
        curl_close($ch);
    }
}

?>


