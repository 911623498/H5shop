<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;


class IndexController extends Controller{

    public $layout=false;
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }
}

?>


