<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    <title>Admin<?= Html::encode($this->title) ?></title>
    <style>
        .bookimg{ width: 450px;height:250px;}
        .imgcart{height:100px;width:70px;}
	</style>
    <?php $this->head() ?>
</head>
<body  class="page1">
<?php $this->beginBody() ?>
<?php
    NavBar::begin([
        'brandLabel' => '<img src="/images/fox.jpg" class="logo"/>',
        'brandUrl' => Yii::$app->homeUrl,
    
        'options' => [
            'class' => 'my-navbar navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Корзина', 'options' => ['class' => 'fontnav','onclick'=>' getCart()']],
            ['label' => 'Библиотека', 'url' => ['/auth/library'],'options' => ['class' => 'fontnav',]],
            [
                'label' => 'kek',
                'url' => ['site/login'],
                'visible' => !Yii::$app->user->identity->status
            ],
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
    NavBar::end();
    ?>





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
      WebDesign (C) 2013 | <a href="#">Privacy Policy</a> | Website Template  designed by <a href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com</a>
      </div>
    </div>
  </div>
</footer>

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
<div class="wrap">
   

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
       <div class="container whiteback">
            <?= $content ?>
       </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
