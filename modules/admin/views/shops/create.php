<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Shops */

$this->title = 'Create Shops';
$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin" >
<div class="shops-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>