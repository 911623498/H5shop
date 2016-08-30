<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;


class UserController extends Controller{

    public $layout=false;

    /*
     * 用户中心
     * */
    public function actionIndex()
    {
        return $this->render('member');
    }

    /*
    * 设置中心
    * */
    public function actionSys()
    {
        return $this->render('saftystep');
    }

    /*
    * 绑定手机号
    * */
    public function actionPhone()
    {
        return $this->render('boundphone');
    }

    /*
    * 账号余额
    * */
    public function actionMoney()
    {
        return $this->render('records');
    }
}

?>


