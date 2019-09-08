<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Авторизация';
/* @var $this yii\web\View */
/* @var $model app\models\AuthForm */
/* @var $form ActiveForm */
?>
<div class="auth-auth container">
<h1 class="h1auth"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Авторизироваться', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Зарегистрироваться', ['/auth/reg'], ['class'=>'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    
</div><!-- book-auth -->
