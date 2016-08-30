<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;


class SpecController extends Controller{



    public $layout=false;
    /*
     * 特价商品
     *
     * */
    public function actionIndex()
    {
        return $this->render('specialprice');
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
        return $this->render('reserve');
    }

}

?>


