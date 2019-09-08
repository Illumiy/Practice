<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shopsbook".
 *
 * @property int $id
 * @property int $id_book
 * @property int $id_shops
 * @property int $qty
 *
 * @property Book $book
 * @property Book $shops
 */
class Shopsbook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shopsbook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_book', 'id_shops', 'qty'], 'required'],
            [['id_book', 'id_shops', 'qty'], 'integer'],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['id_book' => 'id']],
            [['id_shops'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['id_shops' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_book' => 'Id Book',
            'id_shops' => 'Id Shops',
            'qty' => 'Qty',
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
    public function getShops()
    {
        return $this->hasOne(Shops::className(), ['id' => 'id_shops']);
    }
}
