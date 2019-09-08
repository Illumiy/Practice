<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AuthorbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authorbooks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin">
    <div class="authorbook-index">


        <p>
            <?= Html::a('Создать связь Книга-Автор', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'id_book',
                'id_author',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>