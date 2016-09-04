<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use App\Http\Requests;

class BuyController extends \yii\web\Controller
{
    public $layout=false;
    public function init(){
        $this->enableCsrfValidation = false;
    }
    public function actionIndex()
    {
        //用户id
        $session = Yii::$app->session;
        //$user = $session->get('user');
        //$user_id = $user['user_id'];
        $use=array();
        //$use['user_id'] = 1;
        //获取当前的时间看时间是不是大于10：00
        //小于10点 上期爆款 其他马上抢购  大于10点是下期预告 抢购中 马上抢购
        //大于20点下期预告 抢购结束 抢购中
        //获取当前时间
        $newTime=time();
        //url地址
        $uri = "http://www.aaa.net/TP/Home/Buy/index";
        //调取
        $arr = curl_post($uri,$use);
        //分类的数据
        $data = json_decode($arr,true);
        $buy = $data['data'];
        $k = array_keys($buy);
        //算长度

        $count = count($buy);
        //echo $count;
        if($count == 2){
            $array = array(
                'oTime' => '抢购中',
                'tTime' => '即将抢购'
            );
            if(!empty($user_id)){

            }
        }else{
            if(in_array('上期爆款',$k)){
                $array = array(
                    'oTime' => '抢购中',
                    'tTime' => '即将抢购',
                    'sTime' => ''
                );
            }else{
                $array = array(
                    'oTime' => '可抢购',
                    'tTime' => '抢购中',
                    'sTime' => ''
                );
            }
        }
        return $this->render('buytime',array('data'=>$buy,'arr'=>$array,'k'=>$k));
    }

    /**
     * 提醒我
     */
    public function actionTell(){
        $session = Yii::$app->session;
        //$user = $session->get('user');
        if(empty($session['user'])){
            echo false;
        }else{
            $g_id = \Yii::$app->request->post('g_id');
            $time = \Yii::$app->request->post('time');
            $tell = \Yii::$app->request->post('tell');
            //$user_id = $user['user_id'];
            $user_id = 1;
            $data = array('goods_id'=>$g_id,'t_time'=>$time,'user_id'=>$user_id);
            if($tell == 2){
                $uri = "http://www.aaa.net/TP/Home/Buy/tell";
                //调取
                $arr = curl_post($uri,$data);
                //分类的数据
                $list = json_decode($arr,true);
                if($list['status'] == 0){
                    echo '1';
                }else{
                    echo '3';
                }
            }else{
                $uri = "http://www.aaa.net/TP/Home/Buy/tellDel";
                //调取
                $arr = curl_post($uri,$data);
                //分类的数据
                $list = json_decode($arr,true);
                if($list['status'] == 0){
                    echo '2';
                }else{
                    echo '3';
                }
            }

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