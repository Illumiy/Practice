<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrderesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orderes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'creates_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute'=>'status',
                'value'=>function($data){
                    return !$data->status ? 'В процессе':'Завершён';
                },
            ],
            'address',
            //'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
