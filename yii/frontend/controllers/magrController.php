<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;


class MagrController extends Controller{

    public $layout=false;
    public function actionIndex()
    {
        return $this->render('detail');
    }

    public function actionSeckill()
    {

        $id= \Yii::$app->request->get('id');
        $uri = 'http://www.aaa.net/H5shop/TP/index.php/Home/spec/seckill';
        $data['id']=$id;
        $json_user =$this->curl_post($uri,$data);
        $arr = json_decode($json_user,true);
        $result = new \Redis();
        $result->connect('127.0.0.1', 6379);
            //$result->flushdb();die;

        $res= $result->exists($id);
        if($res)
        {
            $num=$result->get($id);
            $arr['data']['goods_num']=$num;
        }
      //  print_r($arr);die;
        return $this->render('detail2',['goods'=>$arr['data']]);
    }

    public function actionShop_seckill()
    {
         $id= \Yii::$app->request->get('id');
         $num= \Yii::$app->request->get('num');
        $session = Yii::$app->session;
        $session->open();
        $session->set('user',['user_id'=>3]);
        $user = $session->get('user');
        $uid=$user['user_id'];
        $session->close();
            /*************链接redis************/
        $result = new \Redis();
        $result->connect('127.0.0.1', 6379);
        // $result->flushdb();die;
        // $result->flushdb();die;
        $res= $result->exists($id);

      if(!$res)
      {
          $reg= $result->set($id,$num);
          if($reg)
          {
              $result->lpush("'$id'",$uid);
             $num= $result->get($id);
              $num=$num-1;
              $a=$result->set($id,$num);

              if($a)
              {
                  echo '1';
              }
          }
      }
     else
     {
         $reg=$result->get($id);
         if($reg!=0)
         {
             $result->lpush("'$id'",$uid);
             $num= $result->get($id);
             $num=$num-1;
             $a=$result->set($id,$num);
             if($a)
             {
                 echo '1';
             }
         }
         else
         {
           echo  false;
         }
     }


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


