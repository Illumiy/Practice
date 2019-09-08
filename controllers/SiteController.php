<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\data\Pagination;
use app\models\Allbook;
use app\models\Author;
use app\models\Genre;
use app\models\Rating;
use app\models\Shopsbook;
use app\models\Book;

class SiteController extends Controller
{
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()//Главная страница
    {
        $query= Allbook::find()->orderBy(new Expression('rand()')); //Случаянные книги
        $pages =new Pagination(['totalCount'=>$query->count(),'pageSize'=>6]);
        $allbooks=$query->offset($pages->offset)->limit($pages->limit)->all();
        $queryNew= Allbook::find()->where(['new'=>1]);//Новые книги
        $pagesNew =new Pagination(['totalCount'=>$queryNew->count(),'pageSize'=>6]); 
        $allbooksNew=$queryNew->offset($pagesNew->offset)->limit($pagesNew->limit)->all();
        $querySale= Allbook::find()->where(['sale'=>1]);//Скидки
        $pagesSale =new Pagination(['totalCount'=>$querySale->count(),'pageSize'=>6]);
        $allbooksSale=$querySale->offset($pagesSale->offset)->limit($pagesSale->limit)->all();
       
        return $this->render('index',compact('allbooks','pages','pagesSale','allbooksSale','pagesNew','allbooksNew'));
    }
    public function actionBookpage($id)//Страница книги
    {   if(\Yii::$app->request->isAjax){        //Рейтинг
            $je=Rating::find()->where(['id_book'=>$id ,'id_user'=>\Yii::$app->user->id])->one();
            if(empty($je)){
                $insert=new Rating;
                $insert->rating=$_POST['stars'];
                $insert->id_book=$id;
                $insert->id_user=\Yii::$app->user->id;
                $insert->insert();
            }else{
                $je->rating=$_POST['stars'];
                $je->save();
            }  
        }else{
            $model = new Allbook;          //Данные о книге
            $onebook=Allbook::find()->where(['id'=>$id])->one();
            $shop=Shopsbook::find()->where(['id_book' => $id])->joinWith('shops')->asArray()->all();
            $authors=$onebook->author;
            $genres=$onebook->genre;
            $quantity=Rating::find()->where(['id_book' =>$id])->count();
            if($quantity>0){
                $sum=Rating::find()->where(['id_book' =>$id])->sum('rating');
                $rate=$sum/$quantity;
            }else{
                $rate=0;
            }
            return $this->render('bookpage',compact('onebook','shop','model','authors','genres','rate'));
            }
    }
    public function actionRating(){
        return true;
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
