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
    ]); 
    $items = ArrayHelper::map($book,'id','fullname'); 
    $params = [ 
    'prompt' => '' 
    ]; 
    $items2 = ArrayHelper::map($order,'id','id'); 
    $params = [ 
    'prompt' => '' 
    ]; 
    $items3 = ArrayHelper::map($shop,'id','addres'); 
    $params = [ 
    'prompt' => '' 
    ]; 
    ?>

<?= $form->field($model, 'id_orderes')->dropdownList($items2, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

<?= $form->field($model, 'id_book')->dropdownList($items, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

<?= $form->field($model, 'id_shops')->dropdownList($items3, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

<?= $form->field($model, 'qty_item')->textInput() ?>

    <?php // echo $form->field($model, 'sum_item') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
