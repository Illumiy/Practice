<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrderesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin" >
<div class="orderes-index">

    <p>
        <?= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute'=>'status',
                'value'=> function($data){
                    if($data->status==0){
                        return 'Собирается';
                    }elseif($data->status==1){
                    return 'Отправился';
                    }elseif($data->status==2){
                    return 'Отдан';
                    }
                    
                },
            ],
            'address',
            //'id_user',
            //'pay',
            //'card',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>

