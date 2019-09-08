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
            ['label' => 'Главная администратора', 'url' => ['/admin'],'options' => ['id' => 'wn_history']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/auth/auth'],'options' => ['class' => 'fontnav',]]
            ) : (
                '<li>'
                . Html::beginForm(['/auth/logout'], 'post')
                . Html::submitButton(
                    'Разлогиниться (' . Yii::$app->user->identity->username . ')',
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
<div class="wrap">
   

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
      Текст (C) 2013 | <a href="#">Текст Текст</a> Текст Текст Текст Текст <a href="#" rel="nofollow">ТекстТекст</a>
      </div>
    </div>
  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
