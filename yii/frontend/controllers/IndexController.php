<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
header("content-type:text/html;charset=utf-8");

class IndexController extends Controller{

    public $enableCsrfValidation = false;
    public $layout=false;

    public function actionIndex()
    {

        $session = Yii::$app->session;
        $session->open(); //开启session


        //获取客户端IP地址 如果未获取到 默认地址北京
        //$ip = $_SERVER["REMOTE_ADDR"] ? $_SERVER["REMOTE_ADDR"] : '114.249.238.66';

        $url = "http://api.k780.com:88/?app=ip.get&ip=114.249.238.66&appkey=19063&sign=eca58e312f6b158324ad580411b2c8bf&format=json";
        //①创建CURL句柄
        $ch = curl_init();
        //设置CURL
        curl_setopt($ch,CURLOPT_URL,$url);
        //捕获内容但不输出
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //模拟POST请求
        curl_setopt($ch,CURLOPT_POST,1);
        //禁止服务器端效验SSL
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        //执行CURL
        $output = curl_exec($ch);
        //print_r($output);die;
        if($output === false) {
            echo curl_error($ch);
        }else{
            $city = json_decode($output,true);
        }
        //关闭CURL
        curl_close($ch);
        $city_s = explode(',',$city['result']['att']);
        
        //用户所在地
        $client_city = $city_s[1];

        //位置存入session
        $session->set('client_city',$client_city);

        $info['client_city'] = $client_city;

        return $this->render('index',$info);
    }

    /**
     * @return mixed
     */
    public function actionLogin()
    {
        return $this->render('login');
    }
  
}

?>


