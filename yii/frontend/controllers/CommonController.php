<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Session;
use yii\db\ActiveRecord;
//use Db;
use yii\base\InvalidParamException;
class CommonController extends Controller
{
    /**
     * 构造方法
     * 判断用户是否在其他地方登录
     */
    public function init()
    {
        $session = Yii::$app->session;
        $session->open();
        $user = $session->get('user');
        if (!empty($user)) {
            $sql = "select user_token from users where user_id = '" .$user['user_id'] ."'";
            $token = \yii::$app->db->createCommand($sql)->queryOne();
            if ($user['user_token'] != $token['user_token']) {
                $session->destroy();
                echo "<script>alert('您的账号已在别处登录 请重新登录');location.href='index.php?r=user/index'</script>";
            }
        }
        $session->close();
    }
}


?>