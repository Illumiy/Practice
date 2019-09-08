<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderItems */

$this->title = 'Create Order Items';
$this->params['breadcrumbs'][] = ['label' => 'Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin" >
<div class="order-items-create">

    <?= $this->render('_form', compact('model','order','book')
    ); ?>

</div>
</div>
