<?php

namespace app\controllers;
use Yii;
use yii\web\AssetBundle;
use yii\base\BootstrapInterface;
use app\models\Orderes;
use app\models\OrderItems;
use app\models\user;

class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {   if (Yii::$app->user->isGuest) {//Проверка на гостя
        return $this->goHome();
       }
        $model=Orderes::find()->where(['id_user'=>\Yii::$app->user->id])->all();
        return $this->render('index',compact('model'));
    }
    public function actionItems($id)
    {   if (Yii::$app->user->isGuest) {//Проверка на гостя
        return $this->goHome();
       }
        $model=OrderItems::find()->where(['id_orderes'=>$id])->all();
        if(!$model){
            return $this->goHome();
        }
        return $this->render('items',compact('model'));
    }

}
