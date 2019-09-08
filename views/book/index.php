<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поиск книг';
?>
<div class="content" style="padding:10px;">
<h3><?= Html::encode($this->title) ?></h3>
    <div class="book-index">
    
        <?php Pjax::begin(); ?>
        <?php echo $this->render('_search', ['model' => $searchModel ]); ?>
        <div class="row">
            <div class="row" style="text-align:center">
        <div class="sorting col-xs-4 col-sm-4 col-md-4 col-lg-4" ><span class="supaspanother"><?= $dataProvider->sort->link('tag')?></span></div>
        <div class="sorting col-xs-4 col-sm-4 col-md-4 col-lg-4" ><span class="supaspanother"><?= $dataProvider->sort->link('release_date')?></span></div>
        <div class="sorting col-xs-4 col-sm-4 col-md-4 col-lg-4" ><span class="supaspanother"><?= $dataProvider->sort->link('price')?></span></div>
        </div>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {
                echo Html::beginTag('div', ['class' => 'icon col-xs-12 col-sm-6 col-md-4 col-lg-4']);
                    echo Html::beginTag('a', ['href' => Url::toRoute('site/bookpage/'.$model['id']), 'class'=>'bookone']);
                        echo Html::img( '/'.'images'.'/'.$model->imagines, ['class' => 'bookimg']);
                        echo Html::beginTag('div', ['class' => 'title']);
                            echo Html::tag('pre', Html::encode($model->tag), ['class' => 'bookone']);
                        echo Html::endTag('div');
                    echo Html::endTag('a');
                echo Html::endTag('div');
            },
        ]) ?>

        <?php Pjax::end(); ?>
        </div>
    </div>
</div>
