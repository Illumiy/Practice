<?php

namespace app\models;

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
            ['release date','integer'],
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
            'release_date' => 'Год выхода',
            'tag' => 'Название',
            'price' => 'Цена',
            'description' => 'Description',
            'imagines' => 'Imagines',
            'old_price' => 'Old Price',
            'new' => 'New',
            'sale' => 'Sale',
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
    public function getBookgenre()
    {
        return $this->hasMany(Bookgenre::className(), ['id_book' => 'id']);
    }
    public function getGenre()
    {
        return $this->hasMany(Genre::className(), ['id' => 'id_genre'])
            ->viaTable('bookgenre', ['id_book' => 'id']);
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
    public function getRating()
    {
        return $this->hasMany(Rating::className(), ['id_book' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsbooks()
    {
        return $this->hasMany(Shopsbook::className(), ['id_book' => 'id']);
    }
}
