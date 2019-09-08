<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Shops */

$this->title = 'Update Shops: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contentAdmin" >
<div class="shops-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>