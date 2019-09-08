<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Предметы заказа';
?>
<div class="content" style="padding:10px;">
    <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Название книг</th>
                    <th>Сумма книг</th>
                    <th>Кол-во книг</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($model as $id=>$item):?>
                <tr>
                    <td><a href="<?=Url::to(['/site/bookpage/'.$item->book['id']])?>" style="text-decoration: underline;color: #e3821b;"><?=$item->book['tag']?></td>
                    <td><?=$item->book['price']*$item['qty_item']?></td>
                    <td><?=$item['qty_item']?></td>
                </tr>
            <?php endforeach?>

            </tbody>
        </table>
</div>
