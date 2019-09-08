<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $genre
 *
 * @property Bookgenre[] $bookgenres
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre'], 'required'],
            [['genre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genre' => 'Genre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasMany(Book::className(), ['id' => 'id_book'])
            ->viaTable('bookgenre', ['id_genre' => 'id']);
    }
    public function getBookgenres()
    {
        return $this->hasMany(Bookgenre::className(), ['id_genre' => 'id']);
    }
}
