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
            [['tag',  'price', 'description', 'imagines','release_date'], 'required'],
            [[ 'old_price', 'new', 'sale','release_date'], 'integer'],
            [['tag'], 'string', 'max' => 40],
            [[ 'old_price', 'price'], 'double'],
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
            'tag' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
            'imagines' => 'Название файла картинки',
            'old_price' => 'Цена до скидки',
            'new' => 'Новое',
            'sale' => 'Скидка',
            'release_date' => 'Год выхода',
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
}
