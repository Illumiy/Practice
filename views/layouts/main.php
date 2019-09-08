<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <style>
        .bookimg{ width: 450px;height:300px;}
        .imgcart{height:100px;width:70px;}
	</style>
    <?php $this->head() ?>
</head>
<body  class="page1">
<?php $this->beginBody() ?>
<div class="wrap">
<?php
    NavBar::begin([
        'brandLabel' => '<img src="/images/fox.jpg" class="logo"/>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'my-navbar navbar-fixed-top ',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Html::beginTag('li', ['class' => 'search_box searchbox']),
                Html::beginForm([Url::to(['/book/index'])], 'get'),
                    Html::input('text', 'BookSearch[tag]', '', ['style' => "color: #e3821b; padding: 10px;width: 120px;",'placeholder'=>'Поиск']),
                Html::endForm(),
            Html::endTag('li'),
            ['label' => 'Корзина', 'options' => ['class' => 'fontnav','onclick'=>' getCart()']],
            ['label' => 'Мои заказы', 'url' => ['/order/index'],'options' => ['class' => 'fontnav',]],
            ['label' => 'Жанры','options' => ['id' => 'down_history'], 'items'=>[
                ['label' => 'Фэнтези', 'url' => ['/book/index?genre=2'],'options' => ['id' => 'wn_history']],
                ['label' => 'Фантастика', 'url' => ['/book/index?genre=4'],'options' => ['id' => 'wn_history']],
                ['label' => 'Детектив', 'url' => ['/book/index?genre=5'],'options' => ['id' => 'wn_history']],
                ['label' => 'Космическая опера', 'url' => ['/book/index?genre=6'],'options' => ['id' => 'wn_history']],
                ['label' => 'Исторический роман', 'url' => ['/book/index?genre=7'],'options' => ['id' => 'wn_history']],
                ['label' => 'Все жанры', 'url' => ['/category/genres'],'options' => ['id' => 'wn_history']],
            ]],
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/auth/auth'],'options' => ['class' => 'fontnav',]]
            ) : (
                '<li>'
                . Html::beginForm(['/auth/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    ?>
    <?php
    NavBar::end();
    ?>
    
<!-- Корзина -->
<?php \yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id'=>'cart',
    'size'=>'modal-lg',
    'footer'=>'
    <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить</button>
    <a href="'.Url::to(['cart/view']).'" class="btn btn-primary">Оформить</a>
    <button type="button" class="btn btn-danger"onclick="clearCart()">Очистить</button>'
]);
\yii\bootstrap\Modal::end();
?>

   

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!--==============================footer=================================-->
<footer>    
  <div class="container_12">
    <div class="grid_12">
    <div class="socials">
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
    </div>
      <div class="copy">
      Текст (C) 2013 |Emai для связи:  <a href="#">Email@google.com</a> Текст Текст Текст Текст <a href="#" rel="nofollow">ТекстТекст</a>
      </div>
    </div>
  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
