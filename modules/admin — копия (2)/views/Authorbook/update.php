<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Authorbook */

$this->title = 'Update Authorbook: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Authorbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contentAdmin">
    <div class="authorbook-update">

        <?= $this->render('_form',compact('model','authorbook','authorbook2')) ?>

    </div>
</div>

