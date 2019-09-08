<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Author */

$this->title = 'Создать автора';
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentAdmin">

    <div class="author-create">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
