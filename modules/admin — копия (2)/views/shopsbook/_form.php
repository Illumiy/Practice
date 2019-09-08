<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Shopsbook */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
$items = ArrayHelper::map($book,'id','id'); 
$params = [ 
'prompt' => '' 
]; 
$items2 = ArrayHelper::map($shop,'id','id'); 
$params = [ 
'prompt' => '' 
]; 
?>

<div class="shopsbook-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_book')->dropdownList($items, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'id_shops')->dropdownList($items, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
