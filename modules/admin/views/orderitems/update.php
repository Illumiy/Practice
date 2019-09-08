<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderItems */

$this->title = 'Update Order Items: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contentAdmin" >
<div class="order-items-update">

    <?= $this->render('_form', compact('model','order','book','shop')
    ); ?>

</div>
</div>
