<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'FoxBook';
?>

<div class="content">
      <h3><span>Популярные</span></h3>
      <div class="row">
        <?php foreach($allbooks as $onebook): ?>
              <div class="icon col-xs-12 col-sm-6 col-md-4 col-lg-4" >
              <a href="<?=Url::toRoute('site/bookpage/'.$onebook['id']);?>" class="bookone">
                <?php if($onebook['new']==1){
                  echo '<img src="/images/new.png" style="position: absolute;	height: 50px; width: 50px;">';
                  }
                  if($onebook['sale']==1){
                    echo '<img src="/images/sale.png" style="position: absolute;	height: 60px; width: 60px;">';
                    }?>
                <img src="/images/<? echo $onebook['imagines']?>" alt="" class="bookimg">
                <div class="title">
                    <pre class="bookone"><? echo $onebook['tag']?></pre>
                    
                </div>
                </a>
              </div>
            
        <?php endforeach;?>
        <?php
        echo LinkPager::widget([
        'pagination' => $pages,
        'options' => [
          'class' => 'pagination  grid_12',
          'style'=>'margin-left: 50px;',
        ]
        ]);
        ?>
    </div>
</div>

<div class="content">
      <h3><span>Новые</span></h3>
      <div class="row">
       <?php foreach($allbooksNew as $onebook): ?>
       <div class="icon col-xs-12 col-sm-6 col-md-4 col-lg-4" >
            <a href="<?=Url::toRoute('site/bookpage/'.$onebook['id']);?>" >
            <img src="/images/new.png" style="position: absolute;	height: 50px; width: 50px;">
            <?php
            if($onebook['sale']==1){
              echo '<img src="/images/sale.png" style="position: absolute;	height: 60px; width: 60px;">';
              }?>
            <img src="/images/<? echo $onebook['imagines']?>" alt="" class="bookimg">
            <div class="title">
                <pre class="bookone"><? echo $onebook['tag']?></pre>
            </div>
            </a>
           </div>
       <?php endforeach;?>
       <?php
            echo LinkPager::widget([
            'pagination' => $pagesNew,
            'options' => [
              'class' => 'pagination  grid_12',
              'style'=>'margin-left: 50px;',
            ]
            ]);
            ?>
    </div>
</div>

<div class="content">
  <div class="container_12">
    <div class="grid_12">
      <h3><span>Скидки</span></h3>
      <?php foreach($allbooksSale as $onebook): ?>
       <div class="grid_4">
        <div class="icon">
          <a href="<?=Url::toRoute('site/bookpage/'.$onebook['id']);?>" >
            <img src="/images/sale.png" style="position: absolute;	height: 60px; width: 60px;">
            <img src="/images/<? echo $onebook['imagines']?>" alt="" class="bookimg">
            <div class="title">
              <pre class="bookone"><? echo $onebook['tag']?></pre>
            </div>
          </a>
        </div>
      </div>
      <?php endforeach;?>
      <?php
            echo LinkPager::widget([
            'pagination' => $pagesSale,
            'options' => [
              'class' => 'pagination  grid_12',
              'style'=>'margin-left: 50px;',
            ]
            ]);?>
     </div>
  
</div>

