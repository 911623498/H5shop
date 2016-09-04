<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;

header("Content-type: text/html; charset=utf-8");
class IndexController extends Controller{


    public $layout=false;
    public function actionIndex()
    {
        error_reporting(0);
        $uri = 'http://www.aaa.net/H5shop/TP/index.php/Home/info/shop_list';
          $json_user =$this->curl_post($uri);
          $arr = json_decode($json_user,true);
        // print_r($arr);die;
        if(empty($arr['data']['seckill']['son']))
        {
            unset($arr['data']['seckill']);
        }

        return $this->render('index',['goods'=>$arr['data']['goods'],'shop'=>$arr['data']['shop'],'seckill'=>$arr['data']['seckill']]);
    }



    public function actionLogin()
    {
        return $this->render('login');
    }

    /*
    * curl 调用接口
    * */
    public function curl_post($uri,$data=1)
    {
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $uri );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        return $return;

    }
}

?>


