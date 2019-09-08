<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Book */

$this->title = 'Update Book: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contentAdmin" >
<div class="book-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
