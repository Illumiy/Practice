<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Genre;
use app\models\Allbook;
use app\models\Bookgenre;



class CategoryController extends Controller
{
    public function actionGenres()//Отображение страницы со всеми жанрами
    {
        $genres= Genre::find()->asArray()->all();
       
        return $this->render('genres',compact('genres'));
    }
}