<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property int $id
 * @property string $name
 * @property int $id_book
 * @property int $qty
 * @property string $address
 *
 * @property Book $book
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_book', 'qty', 'address'], 'required'],
            [['id_book', 'qty'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['id_book' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_book' => 'Id Book',
            'qty' => 'Qty',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'id_book']);
    }
}
