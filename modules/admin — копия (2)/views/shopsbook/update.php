<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Shopsbook */

$this->title = 'Update Shopsbook: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shopsbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contentAdmin" >
<div class="shopsbook-update">

    <?= $this->render('_form', compact('model','book','shop')); ?>

</div>
</div>