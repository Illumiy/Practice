<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_orderes') ?>

    <?= $form->field($model, 'id_book') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'qty_item') ?>

    <?php // echo $form->field($model, 'sum_item') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
