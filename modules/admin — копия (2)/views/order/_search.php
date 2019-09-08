<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'creates_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'pay') ?>

    <?php // echo $form->field($model, 'card') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
