<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Book */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contentAdmin" >
<div class="book-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалть это?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'release_date',
        ],
    ]) ?>

</div>
</div>
