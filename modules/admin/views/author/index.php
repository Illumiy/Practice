<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Автор';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin" >
    <div class="author-index">

        <p>
            <?= Html::a('Создать автора', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'email:email',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>