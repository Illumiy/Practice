<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = 'Офрмление';
?>
<div class="container">

<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Обложка</th>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($session['cart'] as $id=>$item):?>
                <tr>
                    <td><img src="/images/<?=$item['img']?>" class="imgcart"></td>
                    <td><a href="<?=Url::to(['site/bookpage/'.$id])?>"><?=$item['name']?></a></td>
                    <td><?=$item['qty']?></td>
                    <td><?=$item['price']?></td>
                    <td><?=$item['price']*$item['qty']?></td>
                    <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove glyphicon-removeOrder text-danger" aria-hidden="true"></span></td>
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
    
    <?php if(!Yii::$app->user->isGuest):?>
        <?php $form = ActiveForm::begin() ?>
        <?php $order->pay='0';?>
        <?= $form->field($order, 'address')->textInput(['value' => $inf['address']]) ?>
        <?= $form->field($order, 'descr')->textArea() ?>
        <?php if($pay==1):?>
        <?=$form->field($order, 'pay')->radioList(['0' => 'Оплата картой' ]);?>
        <?=$form->field($order, 'card')->textInput()->label('Номер карты');?>
            <?php else : ?>
            <?=$form->field($order, 'pay')->radioList(['0' => 'Оплата наличными','1' => 'Оплата картой', ]);?>
            <?php endif; ?>
            <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary']) ?>
            <?php ActiveForm::end(); ?>
            <?php print_r($postt);?>
           
         <?php else : ?>
            </div >
            <div class="container">
                <a href=<?=Url::to(['auth/reg'])?>><h3 class="aReg">Только зарегестрированные пользователи могут оформлять заказы<h3></a>
            </div>  
         <?php endif; ?>
<?php else : ?>
    <h3>Корзина пуста</h3>
<?php endif;?>
</div>
