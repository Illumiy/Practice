<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ShopsbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shopsbooks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin" >
<div class="shopsbook-index">

    <p>
        <?= Html::a('Создать связь книга-магазин', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_book',
            'id_shops',
            'qty',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
