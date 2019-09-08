<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orderes */

$this->title = 'Update Orderes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orderes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contentAdmin" >
<div class="orderes-update">

    <?= $this->render('_form', compact('model','user','status')) ?>

</div>
</div>
