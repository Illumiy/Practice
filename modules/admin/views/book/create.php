<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Book */

$this->title = 'Создать книгу';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="contentAdmin">

    <div class="book-create">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
