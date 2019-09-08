<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orderes */

$this->title = 'Create Orderes';
$this->params['breadcrumbs'][] = ['label' => 'Orderes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin" >
<div class="orderes-create">

    <?= $this->render('_form', compact('model','user')) ?>

</div>
</div>

