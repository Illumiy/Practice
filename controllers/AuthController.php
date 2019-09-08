<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\AuthForm;
use app\models\RegForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookController implements the CRUD actions for Usver model.
 */
class AuthController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionAuth()//Вход
    {	
        if (!Yii::$app->user->isGuest) {//Проверка на гостя
         return $this->goHome();
        }
        $model = new AuthForm();
        if ($model->load(Yii::$app->request->post()) && $model->auth()) {// Получение данных и сам вход
             return $this->goBack();
        }
        $model->password = '';
        return $this->render('auth', [
             'model' => $model,
    ]);
    }
    public function actionLogout()//Выход
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    public function actionReg()//Регистрация
    {   
        if (!Yii::$app->user->isGuest) //Проверка на гостя
            {
                return $this->goHome();
            }

            $model = new RegForm();
            if ($model->load(Yii::$app->request->post()) && $model->validate())//Проверка данных и регистрация
                {
                $user = new user();
                $user->username = $model->username;
                $user->password = Yii::$app->security->generatePasswordhash($model->password);
                $user->email =  $model->email;
                $user->phone =  $model->phone;
                $user->address =  $model->address;
                if($user->save()){
                    return $this->goHome();
                }
                }
                return $this->render('reg', compact('model'));
    }
}
