<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $id_orderes
 * @property int $id_book
 * @property string $name
 * @property double $price
 * @property int $qty_item
 * @property double $sum_item
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }
    public function getOrderes(){
        return $this->hasOne(Order::className(),['id'=>'id_order']);
    }
    public function getBook(){
        return $this->hasOne(AllBook::className(),['id'=>'id_book']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_orderes', 'id_book'], 'integer'],
        ];
    }
}

    /**
     * {@inheritdoc}
     */
  