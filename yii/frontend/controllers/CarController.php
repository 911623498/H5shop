<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;


class CarController extends Controller{

    public $layout=false;
    public function init(){
        $this->enableCsrfValidation = false;
    }
    public function actionIndex()
    {
        $session = Yii::$app->session;
        //$user = $session->get('user');
        $session['user']=1;
        if(empty($session['user'])){
            return    $this->redirect(array('index/login'),true);
        }else{
            $data['user_id'] = 1;
            $uri = "http://www.aaa.net/TP/Home/Car/index";
            //调取
            $arr = curl_post($uri,$data);
            //分类的数据
            $list = json_decode($arr,true);
            //获取当前时间戳
            $time = time();
             return $this->render('shopcart',['data'=>$list['data'],'time'=>$time]);
        }
    }
    public function actionDel(){
        $session = Yii::$app->session;
        //$user = $session->get('user');
        $user_id = 1;
        $tell_id = \Yii::$app->request->post('tell_id');
        $data['user_id']=$user_id;
        $data['tell_id']=$tell_id;
        $uri = "http://www.aaa.net/TP/Home/Car/del";
        //调取
        $arr = curl_post($uri,$data);
        //分类的数据
        $list = json_decode($arr,true);
        if($list['status'] == 0){
            echo true;
        }else{
            echo false;
        }
    }
}
function curl_post($uri,$data=array())
{
    //开启curl;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    if (!empty($data)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $return = curl_exec($ch);
    //关闭curl
    curl_close($ch);
    return $return;
}
?>


