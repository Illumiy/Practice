<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagines')->textInput(['maxlength' => true, 'placeholder'=>'images/']) ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'new')->dropDownList([
    '0' => 'Не Новое',
    '1' => 'Новое',
]); ?>

    <?= $form->field($model, 'sale')->dropDownList([
    '0' => 'Без скидки',
    '1' => 'Со скидкой',
]); ?>

    <?= $form->field($model, 'release_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
