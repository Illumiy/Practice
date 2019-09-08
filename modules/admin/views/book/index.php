<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin" >
    <div class="book-index">

        <p>
            <?= Html::a('Создать книгу', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'tag',
                'price',
                'description',
                'imagines',
                'old_price',
                [
                    'attribute'=>'new',
                    'value'=> function($data){
                        return !$data->new ? 'Старое' : 'Новое';
                    },
                ],
                [
                    'attribute'=>'sale',
                    'value'=> function($data){
                        return !$data->sale ? 'Без скидки' : 'Со скидкой';
                    },
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>
