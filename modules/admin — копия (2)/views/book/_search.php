<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tag') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'imagines') ?>

    <?php // echo $form->field($model, 'old_price') ?>

    <?php // echo $form->field($model, 'new') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
