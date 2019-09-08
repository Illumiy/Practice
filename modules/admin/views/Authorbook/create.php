<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Authorbook */

$this->title = 'Create Authorbook';
$this->params['breadcrumbs'][] = ['label' => 'Authorbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin">
    <div class="authorbook-create">
        <?= $this->render('_form',compact('model','authorbook','authorbook2')) ?>
    </div>
</div>
