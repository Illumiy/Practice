<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $tag
 * @property int $qty
 * @property string $price
 * @property string $description
 * @property string $imagines
 *
 * @property Authorbook[] $authorbooks
 * @property Bookgenre[] $bookgenres
 * @property Cart[] $carts
 * @property OrderItems[] $orderItems
 * @property Rating[] $ratings
 * @property Saved[] $saveds
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag', 'qty', 'price', 'description', 'imagines'], 'required'],
            [['qty'], 'integer'],
            [['tag', 'price'], 'string', 'max' => 40],
            [['description', 'imagines'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Tag',
            'qty' => 'Qty',
            'price' => 'Price',
            'description' => 'Description',
            'imagines' => 'Imagines',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorbooks()
    {
        return $this->hasMany(Authorbook::className(), ['id_book' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookgenres()
    {
        return $this->hasMany(Bookgenre::className(), ['id_book' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['id_book' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['id_book' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['id_book' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaveds()
    {
        return $this->hasMany(Saved::className(), ['id_book' => 'id']);
    }
}
