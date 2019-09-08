<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $tag
 * @property string $price
 * @property string $description
 * @property string $imagines
 * @property int $old_price
 * @property int $new
 * @property int $sale
 *
 * @property Authorbook[] $authorbooks
 * @property Bookgenre[] $bookgenres
 * @property OrderItems[] $orderItems
 * @property Rating[] $ratings
 * @property Shop[] $shops
 * @property Shopsbook[] $shopsbooks
 * @property Shopsbook[] $shopsbooks0
 */
class Bookes extends \yii\db\ActiveRecord
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
            [['tag', 'price', 'description', 'imagines'], 'required'],
            [['description'], 'string'],
            [['old_price', 'new', 'sale'], 'integer'],
            [['tag', 'price'], 'string', 'max' => 40],
            [['imagines'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
            'imagines' => 'Обложка',
            'old_price' => 'Старая цена',
            'new' => 'Новое',
            'sale' => 'Скидка',
            'release_date'=> 'Дата выхода',
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
    public function getShops()
    {
        return $this->hasMany(Shop::className(), ['id_book' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsbooks()
    {
        return $this->hasMany(Shopsbook::className(), ['id_book' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsbooks0()
    {
        return $this->hasMany(Shopsbook::className(), ['id_shops' => 'id']);
    }
}
