<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ShopsbookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shopsbook-search">
<?php 
$items = ArrayHelper::map($book,'id','fullname'); 
$params = [ 
'prompt' => '' 
]; 
$items2 = ArrayHelper::map($shop,'id','id'); 
$params = [ 
'prompt' => '' 
]; 
?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_book')->dropdownList($items, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'id_shops')->dropdownList($items, $params,['class'=>'form-input', 'data-constraints'=>'@Required']);?>

    <?= $form->field($model, 'qty') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
