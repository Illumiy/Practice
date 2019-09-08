<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Authorbook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="authorbook-form">
<?php 
$items = ArrayHelper::map($authorbook,'id','fullname'); 
$params = [ 
]; 
$items2 = ArrayHelper::map($authorbook2,'id','fullname'); 
?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_book')->dropdownList($items, $params,['class'=>'form-input', 'data-constraints'=>'@Required'])?>

    <?= $form->field($model, 'id_author')->dropdownList($items2, $params,['class'=>'form-input', 'data-constraints'=>'@Required'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
