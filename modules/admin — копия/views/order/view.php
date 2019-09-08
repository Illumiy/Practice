<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orderes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orderes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orderes-view">

    <h1>Заказа номер:<?= $model->id ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'creates_at',
            'updated_at',
            'qty',
            'sum',[
                'attribute'=>'status',
                'value'=>function($model){
                    return !$model->status ? 'В процессе':'Завершён';
                },
            ],
            'address',
            'id_user',
        ],
    ]) ?>
    <?php $items=$model->orderItems;?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($items as $item):?>
                <tr>
                    <td><a href="<?=Url::to(['/site/bookpage/'.$item['id_book']])?>"><?=$item['id_book']?></a></td>
                    <td><?=$item['qty_item']?></td>
                    <td><?=$item['price']?></td>
                    <td><?=$item['sum_item']?></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
    

</div>
