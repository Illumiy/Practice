<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "authorbook".
 *
 * @property int $id
 * @property int $id_book
 * @property int $id_author
 *
 * @property Book $book
 * @property Author $author
 */
class Authorbook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authorbook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_book', 'id_author'], 'required'],
            [['id_book', 'id_author'], 'integer'],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['id_book' => 'id']],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['id_author' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_book' => 'Книга',
            'id_author' => 'Автор',
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
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'id_author']);
    }
}
