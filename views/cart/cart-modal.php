<?php 
use yii\helpers\Html;
use yii\helpers\Url;?>
<!-- Проверка на пустоту -->
<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
            <!-- Вывод товров -->
                <?php foreach($session['cart'] as $id=>$item):?>
                <tr>
                    <td><img src="/images/<?=$item['img']?>" class="imgcart"></td>
                    <td><a href="<?=Url::to(['site/bookpage/'.$id])?>"><?=$item['name']?></a></td>
                    <td><?=$item['qty']?></td>
                    <td><?=$item['price']?></td>
                    <td><?=$item['price']*$item['qty']?></td>
                    <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></td>
                </tr>
                <?php endforeach?>
                <tr>
                    <td colspan="5">Итого:</td>
                    <td><?= $session['cart.qty']?></td>
                </tr>
                <tr>
                    <td colspan="5">На сумму:</td>
                    <td><?= $session['cart.sum']?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php else : ?>
    <h3>Корзина пуста</h3>
    <?php endif;?>