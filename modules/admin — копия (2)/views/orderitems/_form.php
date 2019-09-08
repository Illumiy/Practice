<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderItems */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
$items = ArrayHelper::map($book,'id','id'); 
$params = [ 
'prompt' => '' 
]; 
$items2 = ArrayHelper::map($order,'id','id'); 
$params = [ 
'prompt' => '' 
]; 
?>

<div class="order-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_orderes')->dropdownList($items2, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'id_book')->dropdownList($items, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'qty_item')->textInput() ?>

    <?= $form->field($model, 'sum_item')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
