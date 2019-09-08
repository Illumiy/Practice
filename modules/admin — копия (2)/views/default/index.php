<?php 
use yii\helpers\Html;
use yii\helpers\Url;?>
<div class="content">
    <ol class="square">
  <li><a href="<?=Url::to(['book/index'])?>">Книга</a></li>
  <li><a href="<?=Url::to(['author/index'])?>">Автор</a></li>
  <li><a href="<?=Url::to(['authorbook/index'])?>">Связь Книга-Автор</a></li>
  <li><a href="<?=Url::to(['order/index'])?>">Заказы</a></li>
  <li><a href="<?=Url::to(['orderitems/index'])?>">Предметы заказа</a></li>
  <li><a href="<?=Url::to(['shops/index'])?>">Магазин</a></li>
  <li><a href="<?=Url::to(['shopsbook/index'])?>">Связь Магазин-Книга</a></li>
</ol>
</div>
