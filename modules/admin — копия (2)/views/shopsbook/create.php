<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Shopsbook */

$this->title = 'Create Shopsbook';
$this->params['breadcrumbs'][] = ['label' => 'Shopsbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin" >
<div class="shopsbook-create">

    <?= $this->render('_form', compact('model','book','shop'));?>

</div>
</div>
