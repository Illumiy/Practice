<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class AppAdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return \Yii::$app->user->identity->status === 1;
                        }
                    ],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
}
