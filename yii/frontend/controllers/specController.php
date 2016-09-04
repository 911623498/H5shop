<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;

header("Content-type: text/html; charset=utf-8");
class SpecController extends Controller{



    public $layout=false;
    /*
     * 特价商品
     *
     * */
    public function actionIndex()
    {
        $uri = 'http://www.aaa.net/H5shop/TP/index.php/Home/spec/special';
         $json_user =$this->curl_post($uri);
        $arr = json_decode($json_user,true);
        // print_r($arr);die;
             $one=$arr['data']['one'];
             $two=$arr['data']['two'];
             return $this->render('specialprice',['one'=>$one,'two'=>$two]);


    }


    /*
    * 新商品
    *
    * */
    public function actionNewshop()
    {
        return $this->render('newproduct');
    }

    /*
   *预定商品
   * */
    public function actionCopshop()
    {

        $uri = 'http://www.aaa.net/H5shop/TP/index.php/Home/spec/reds';
             $json_user =$this->curl_post($uri);
         $arr = json_decode($json_user,true);
       //  print_r($arr);die;
        return $this->render('reserve',['goods'=>$arr['data']]);
    }

    /*
      *商品详情
      * */
    public function actionDetail()
    {
        $id= \Yii::$app->request->get('id');
        $uri = 'http://www.aaa.net/H5shop/TP/index.php/Home/spec/detail';
        $data['id']=$id;
        $json_user =$this->curl_post($uri,$data);
//        echo $json_user;die;
        $arr = json_decode($json_user,true);
     //  print_r($arr);die;
        return $this->render('goods',['goods'=>$arr['data']]);
    }


    /*
     *商品详情
     * */
    public function actionGoods()
    {

        $uri= \Yii::$app->request->get('url');
        $homepage = file_get_contents($uri);
        $a= iconv("UTF-8","GB2312//IGNORE",$homepage) ;
        echo    $content = mb_convert_encoding($a,'UTF-8','GBK');

    }

    /*
     * 预订商品
     * */
    public function actionReds()
    {

        $id= \Yii::$app->request->get('id');
        $money= \Yii::$app->request->get('money');
        $new_money=$money/2;

        return $this->render('myreserve',['id'=>$id,'money'=>$new_money]);

    }

    /*
     *添加预订商品信息
     * */

    public function actionAdd_shop()
    {

        $session = Yii::$app->session;
        $session->open();
        $session->set('user',['user_id'=>1]);
        $user = $session->get('user');
        $session->close();
        $arr= \Yii::$app->request->post();
        $arr['user_id']=$user['user_id'];
        unset($arr['_csrf']);
        $uri = 'http://www.aaa.net/H5shop/TP/index.php/Home/spec/add_shop';

        $json_user =$this->curl_post($uri,$arr);

        $arr = json_decode($json_user,true);
       // print_r($arr);
        if($arr['status']==0)
        {
            echo '0';
        }
    }

    /*
     * 我的预订列表
     * */

    public function actionShop_list()
    {
        $session = Yii::$app->session;
        $session->open();

        $user=$session->get('user');
        $session->close();
        //print_r($user);die;
        $uri = 'http://www.aaa.net/H5shop/TP/index.php/Home/spec/shop_list';
        $json_user =$this->curl_post($uri,$user);
       // echo $json_user;die;
        $arr = json_decode($json_user,true);
         // print_r($arr);die;
        return $this->render('memberreserve',['arr'=>$arr['data']]);

    }

    public function actionShop()
    {

        $id= \Yii::$app->request->get('id');
        $uri = 'http://www.aaa.net/H5shop/TP/index.php/Home/spec/shop';
        $data['id']=$id;
        $json_user =$this->curl_post($uri,$data);

        $arr = json_decode($json_user,true);
        //print_r($arr);die;
        return $this->render('newproduct',['arr'=>$arr['data']['goods'],'shop'=>$arr['data']['shop']]);

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


