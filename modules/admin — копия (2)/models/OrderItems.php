<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $id_orderes
 * @property int $id_book
 * @property double $price
 * @property int $qty_item
 * @property double $sum_item
 *
 * @property Book $book
 * @property Orderes $orderes
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_orderes', 'id_book', 'price', 'qty_item', 'sum_item'], 'required'],
            [['id_orderes', 'id_book', 'qty_item'], 'integer'],
            [['price', 'sum_item'], 'number'],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['id_book' => 'id']],
            [['id_orderes'], 'exist', 'skipOnError' => true, 'targetClass' => Orderes::className(), 'targetAttribute' => ['id_orderes' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_orderes' => 'Id Orderes',
            'id_book' => 'Id Book',
            'price' => 'Price',
            'qty_item' => 'Qty Item',
            'sum_item' => 'Sum Item',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'id_book']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderes()
    {
        return $this->hasOne(Orderes::className(), ['id' => 'id_orderes']);
    }
}
