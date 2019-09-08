<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderItems */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
$items = ArrayHelper::map($book,'id','fullname'); 
$params = [ 
]; 
$items2 = ArrayHelper::map($order,'id','id'); 
$items3 = ArrayHelper::map($shop,'id','addres'); 
?>

<div class="order-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_orderes')->dropdownList($items2, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'id_book')->dropdownList($items, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'id_shops')->dropdownList($items3,$params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'qty_item')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
