<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orderes */
/* @var $form yii\widgets\ActiveForm */
?>
<? 
$items = ArrayHelper::map($user,'id','username'); 
$params = [ 
]; 
?>
<div class="orderes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropdownList([
    '0' => 'Собирается',
    '1' => 'Отправилось',
    '2' => 'Прибыло',
    ], $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->dropdownList($items, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'pay')->dropDownList([
    '0' => 'Наличными',
    '1' => 'Картой',
    ]); ?>

    <?= $form->field($model, 'card')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
