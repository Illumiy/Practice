<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookgenre".
 *
 * @property int $id
 * @property int $id_book
 * @property int $id_genre
 *
 * @property Book $book
 * @property Genre $genre
 */
class Bookgenre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookgenre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_book'], 'required'],
            [['id_book', 'id_genre'], 'integer'],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['id_book' => 'id']],
            [['id_genre'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['id_genre' => 'id']],
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
            'id_genre' => 'Id Genre',
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
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'id_genre']);
    }
}
