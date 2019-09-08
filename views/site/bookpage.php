<?php
use yii\helpers\ArrayHelper;
use kartik\rating\StarRating;
use yii\bootstrap\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Bookpage';
?>
<div class="content">
<img src="/images/<?= $onebook['imagines']?>"class="pagebookimg">
    <div class="pagebookdesc" style="float: left;">
        <div class="pagebooktag">
            <span class="supaspantag"><?= $onebook['tag']?></span>
        </div>
        <div class="pagebooktag">
            <span class="supaspantag">Год выхода:<?= $onebook['release_date']?></span>
        </div>
        <div class="pagebooktag">
            <?php foreach($authors as $author): ?>
            <span class="supaspantag">Автор:<?= $author['name']?></span>
            <?php endforeach;?> 
        </div>
        <div class="pagebooktag"><span class="supaspantag"> Жанры:
            <?php foreach($genres as $genre): ?>
            <a href="<?=Url::toRoute('/book/index?genre='.$genre['id']);?>" style="color:#e3821b"><?= $genre['genre']?>,</a>
            <?php endforeach;?> 
            </span>
        </div>
        <div class="pagebooktag">
            <?php 
            echo '<label class="control-label">'.round($rate/0.5)*0.5.'</label>';
            echo StarRating::widget([
                'name' => 'rating_19', 
                'value'=>round($rate/0.5)*0.5,
                'pluginOptions' => [
                    'step' => 1,
                    'disabled' => Yii::$app->user->isGuest ? true : false,//для гостя блокируем кнопки
                    'showCaption' => false,
                    'showClear' => false,
                    'min'=>0,
                    'max'=>5,
                
                ],
                'pluginEvents' => [
                    'rating:change' => "function(event, value, caption) {
                    $.ajax({
                        url:'/site/bookpage/".$onebook['id']."',
                        method:'post',
                        data:{
                            stars:value,
                        },
                        dataType:'json',
                        success:function(data){
                        console.log('dds');
                        },
                        error:function(data){
                            console.log('32dds');
                            },
                    });
                }"
                ]
                ]);
                ?>
        </div>
        <div class="pagebooktag"><span class="supaspantag"> Стоимость:<?=$onebook['price']?> Рублей</span>
        </div>
        <?php if($onebook['sale']==1){echo'
        <div class="pagebooktag"><span class="supaspantag"> Старая цена:
       <span style="text-decoration:line-through;" >'.$onebook['old_price'].'</span> 
        <span>Рублей</span></span>
        </div>';}?>
        <div class="pagebooktag">
            <form class="form-inline">
                <label for="exampleInputName2" style="margin-top:15px">Колличество</label>
                <input type="text" class="form-control qty" id="qty" value="1">
                <button data-id="<?= $onebook['id'] ?>"class="btn btn-primary add-to-cart"><i class="fa fa-shoping-cart"></i>Добавить в корзину</button>    
            </form>
        </div>
<?php
foreach($shop as $shopOne){
  $sho[$shopOne['id_shops']]="Кол-во: " .$shopOne['qty'].", Адрес: ".$shopOne['shops']['addres'];
}
$params = [ 
'prompt' => 'Просмотреть список магазинов с этой книгой'
];
$form = Activeform::begin();
    echo $form->field($model, 'id')->label('Магазин')->dropDownList($sho,$params);
    Activeform::end();
?>
        <div class="pagebooktag">
            <span class="supaspantag">Описание: <? echo $onebook['description']?></span>
        </div>
    </div>
</div>
