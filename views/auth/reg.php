<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Регистрация';
/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
?>
<div class="auth-reg">
<h1 class="h1auth"><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'address') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- book-reg -->
