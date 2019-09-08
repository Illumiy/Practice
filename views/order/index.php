<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'Мои заказы';
?>
<div class="content" style="padding:10px;">
    <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Номер заказа</th>
                    <th>Время создания</th>
                    <th>Время обновления</th>
                    <th>Адрес</th>
                    <th>Статус</th>
                    <th>Вид оплаты</th>
                    <th>Кол-во товаров</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($model as $id=>$item):?>
                <tr>
                    <td><?=$item['id']?></td>
                    <td><?=$item['creates_at']?></td>
                    <td><?=$item['updated_at']?></td>
                    <td><?=$item['address']?></td>
                    <td>
                        <?php if($item['status']==0){
                            echo 'Собирается';
                        }elseif($item['status']==1){
                                echo 'Отправлен';
                            }else{
                                echo 'Доставлен';
                            }
                        ?></td>
                        <td><?php if($item['pay']==0){
                            echo 'Наличными';
                        }else{
                                echo 'Картой';
                            }
                        ?>
                    </td>
                    <td>
                        <a href="<?=Url::toRoute('order/items/'.$item['id']);?>" style="text-decoration: underline;color: #e3821b;">
                        <?php $qty=0;
                        foreach($item->orderItems as $item_qty){
                            $qty=$qty+$item_qty['qty_item'];
                        }
                        echo $qty;
                        ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
</div>
