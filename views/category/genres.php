<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Жанры';
?>

<div class="content">
    <ol class="square">
    <?php foreach($genres as $genre): ?>
    <li><a href="<?=Url::to(['/book/index?genre='.$genre['id']])?>"><?= $genre['genre']?></a></li>
    <?php endforeach;?>
    </ol>
</div>