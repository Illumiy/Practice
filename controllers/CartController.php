<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use app\models\Allbook;
use app\models\Cart;
use app\models\User;
use app\models\Orderes;
use app\models\OrderItems;
use app\models\Shopsbook;

class CartController extends Controller
{
    public function actionAdd()//Добавление в корзину
    {
        $id=Yii::$app->request->get('id');
        $product=Allbook::find()->where(['id'=>$id])->one();
        $qty=(int)Yii::$app->request->get('qty');
        $shop=Yii::$app->request->get('shop');
        $qty=!$qty ? 1 :$qty;
        $session = Yii::$app->session;
        $session->open();
        $cart=new Cart();
        $cart->addToCart($product,$qty,$shop);//Добавление
        $this->layout=false;
        return $this->render('cart-modal',compact('session'));
    }
    public function actionClear()//Очищение корзины
    {
        $session= Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout=false;
        return $this->render('cart-modal',compact('session'));
    }
    public function actionDelItem()//Удаление предмета из  корзины
    {
        $id=Yii::$app->request->get('id');
        $session= Yii::$app->session;
        $session->open();
        $cart=new Cart();
        $cart->recalc($id);
        if($_GET['status']==0){// Проверка на модальную корзину и обычную
            $this->layout=false;
            return $this->render('cart-modal',compact('session'));
        }else{
            return true;
        }
        
    }
    public function actionShow()//Показывает корзину в модульном окне
    {
        $session= Yii::$app->session;
        $session->open();
        $this->layout=false;
        return $this->render('cart-modal',compact('session'));
    }
    public function actionView() //Отдельная страница с корзиной
    {
        $postt=$_POST['Orderes'];
        $session=Yii::$app->session;
        $session->open();
        $inf=User::find()->where(['id'=>\Yii::$app->user->id])->one();
        $order=new Orderes();
         if(!empty($session['cart'])){ //Проверка на нехватку товаров
            $shops=new Shopsbook();
             foreach($session['cart'] as $id=>$item){//Проверка товаров на кол-во в выбранном магазине
                 if($shop=$shops->find()->where(['<','qty',$item['qty']])->andWhere(['id_book'=>$id, 'id_shops'=>$item['shop']])->asArray()->all()){
                   $bdQty=$shop->qty;
                   $_SESSION['cart'][$id]['status']='1';
                   $noQty=1;
                 }
             }
             if($noQty==1){
                return $this->render('noqty',compact('session','order','inf','bdQty'));
             }
        }
        if($order->load(Yii::$app->request->post())){   //Проверка на ввод данных
            if($_POST['Orderes']['pay']==1){//Если выбрана карта,то идёт перезагрузка с дополнительным полем в котором пишется номер карты
                $pay=1;
                return $this->render('view',compact('session','order','inf','pay'));
            }else{
                if($_POST['Orderes']['card']>0){//Оплата наличными
                    $order->card=$_POST['Orderes']['card'];
                    $order->pay=1;
                }else{
                    $order->card=0;
                }
                $order->id_user = \Yii::$app->user->id;
                if($order->save()){ //Проверка на правильный ввод

                    $this->saveOrderItems($session['cart'],$order->id);
                    Yii::$app->session->setFlash('success','Заказ сдлеан,вам отправлено письмо');
                    Yii::$app->mailer->compose('order',['session'=>$session]) //Отправление письма
                        ->setFrom(['testshopfox@mail.ru' =>'foxbook'])
                        ->setTo(Yii::$app->user->identity->email)
                        ->setSubject('Заказ')
                        ->send();
                    $session->remove('cart.qty');//Очищение корзины
                    $session->remove('cart.sum');
                    $session->remove('cart');
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error','Не гуд','postt');
                }
            }
        }
        return $this->render('view',compact('session','order','inf'));
            
        
    }
    private function saveOrderItems($items,$order_id) //Сохранение прдеметов из корзины
    {
        foreach($items as $id=>$item){
            $order_item=new OrderItems();
            $shop=Shopsbook::find()->where(['id_book' => $id,'id_shops' => $item['shop']])->one();
            $shop->qty-=$item['qty'];
            $order_item->id_orderes=$order_id;
            $order_item->id_book=$id;
            $order_item->qty_item=$item['qty'];
            $order_item->id_shops=$item['shop'];
            $order_item->save();
            $shop->save();
        }
    }

}
?>