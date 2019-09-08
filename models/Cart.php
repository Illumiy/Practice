<?php

namespace app\models;

use Yii;

class Cart extends \yii\db\ActiveRecord
{
    public  function addToCart($product,$qty=1,$shop)//Добавление в корзину
    { 
        if(isset($_SESSION['cart'][$product->id])){//Проверка на пустоту сессии с корзиной
            $_SESSION['cart'][$product->id]['qty']+=$qty;
            $_SESSION['cart'][$product->id]['shop']=$shop;
        }else{
            $_SESSION['cart'][$product->id]=[
                'shop'=>$shop,
                'qty'=>$qty,
                'name'=>$product->tag,
                'price'=>$product->price,
                'img'=>$product->imagines,
                'status'=>0,
            ];
        }
        $_SESSION['cart.qty']=isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty; //Вычисление
        $_SESSION['cart.sum']=isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty * $product->price : $qty*$product->price;
    }
    public function recalc($id)
    {
        if(!isset($_SESSION['cart'][$id])){
            return false;
        }
        $qtyMinus=$_SESSION['cart'][$id]['qty'];
        $sumMinus=$_SESSION['cart'][$id]['qty']*$_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty']-=$qtyMinus;
        $_SESSION['cart.sum']-=$sumMinus;
        unset($_SESSION['cart'][$id]);
    }
    

}