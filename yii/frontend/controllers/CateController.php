<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;


class CateController extends Controller{

    public $layout=false;
    public function actionIndex()
    {
        return $this->render('category');
    }
}

?>


