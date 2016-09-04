<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use App\Http\Requests;

class CateController extends Controller{


    public $layout=false;
    public function init(){
        $this->enableCsrfValidation = false;
    }
    public function actionIndex()
    {
        //url地址
        $uri = "http://www.aaa.net/TP/Home/Cate/index";
        //调取
        $arr = curl_post($uri);
        //分类的数据
        $data = json_decode($arr,true);
        if($data['status']==1){
            echo "<script>alert('$data[msg]')</script>";exit;
        }
        $list=array();
        $i = 0 ;
        //print_r($data);die;
        foreach($data['data'] as $k=>$v ){
            if($v['type_pid']==0){
                $list[$i]=$v;
            }
            $i++;
        }
        $j = 0;
       foreach($list as $k=>$v){
           foreach($data['data'] as $kk=>$vv ){
               if($v['type_id'] == $vv['type_pid']){
                   $list[$k]['son'][$j]=$vv;
                   $j++;
               }
           }
       }
        $session = Yii::$app->session;
        $session->set('type',$list);

        return $this->render('category',array('type'=>$list));
    }
    /**
     *ajax请求子类
     */
    public function actionSon(){
        $session = Yii::$app->session;
        $type= $session->get('type');
        $pid =\Yii::$app->request->post('pid');
        return $this->render('son',array('type'=>$type,'pid'=>$pid));
    }
    /**
     * 点击商品分类显示商品
     */
    public function actionShow(){
        $type_id = \Yii::$app->request->get('son');
        //url地址
        $uri = "http://www.aaa.net/TP/Home/Cate/show";
        $data['type_id']=$type_id;
        $arr= curl_post($uri,$data);
        //解析json
        $list = json_decode($arr,true);
        //print_r($list['data']['list']);
        return $this->render('list',array('list'=>$list['data'],'type_id'=>$type_id));
    }
    /**
     * 点击商品分类分页显示商品
     */
    public function actionFy(){
        $page = \Yii::$app->request->post('page');
        $sum = \Yii::$app->request->post('sum');
        $type_id = \Yii::$app->request->post('type_id');
        //echo $type_id;die;
        if($sum == 1){
            echo '2';
        }elseif($page<=$sum){
            //url地址
                $uri = "http://www.aaa.net/TP/Home/Cate/show";
                $data['type_id']=$type_id;
            $data['page']=$page;
            $arr= curl_post($uri,$data);
            //解析json
            $list = json_decode($arr,true);
            //print_r($list);die;
            return $this->render('page',array('list'=>$list['data'],'type_id'=>$type_id));
        }else{
            echo '1';
        }
    }
    /**
     * 搜索商品显示商品
     */
    public function actionSearch(){
        $search = \Yii::$app->request->get('search');
        //url地址
        $uri = "http://www.aaa.net/TP/Home/Cate/search";
       // $a=urlencode('aaaa');
        $data['sh']=$search;
        $arr= curl_post($uri,$data);
        //解析json
        $list = json_decode($arr,true);
        return $this->render('search',array('list'=>$list['data'],'search'=>$search));
    }
    /**
     * 点击商品搜索分页显示商品
     */
    public function actionSea(){
        $page = \Yii::$app->request->post('page');
        $sum = \Yii::$app->request->post('sum');
        $search = \Yii::$app->request->post('search');
        //echo $type_id;die;
        if($sum == 1){
            echo '2';
        }elseif($page<=$sum){
            //url地址
            $uri = "http://www.aaa.net/TP/Home/Cate/search";
            $data['sh']=$search;
            $data['page']=$page;
            $arr= curl_post($uri,$data);
            //解析json
            $list = json_decode($arr,true);
            return $this->render('page',array('list'=>$list['data'],'search'=>$search));
        }else{
            echo '1';
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