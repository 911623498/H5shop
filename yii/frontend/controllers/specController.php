<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;

header("content-type:text/html;charset=utf-8");
class SpecController extends CommonController{

    public $layout=false;

    /*
    * 新商品
    */
    public function actionNewshop()
    {
        //接口地址
        $url = "http://www.aaa.net/TP/Home/specs/NewShop";
        //调用方法 查询接口
        $output = $this->curl_Api($url);
        $goods= json_decode($output,true);
        if($goods['status'] == 1){
            echo "<script>alert('暂无新品上线');location.href='?r=index/index'</script>";
        }else{
            $data['goods'] = $goods['data'];
            return $this->render('newproduct',$data);
        }
    }



    /**
     * 商品信息
     * @return string
     */
    public function actionGoods_info()
    {
        //接受商品id
        $request = \Yii::$app->request;
        $data['goods_id'] = $request->get('goods_id');
        //调用接口查询数据
        $url = "http://www.aaa.net/TP/Home/specs/sel_Newshop";
        $output = $this -> curl_Api( $url , $data );
        $goods_info = json_decode($output,true);
//        print_r($goods_info);die
        if($goods_info['status'] == 0){
            $data['goods'] = $goods_info['data'];
            return $this->render('goods_info',$data);
        }else{
            echo "<script>alert('请稍后重试！');location.href='?r=spec/newshop'</script>";
        }

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





        /*
     * 特价商品
     *
     * */
    public function actionIndex()
    {
        return $this->render('specialprice');
    }

   /*
    *预定商品
    * 
    */
    public function actionCopshop()
    {
        return $this->render('reserve');
    }

}

?>


