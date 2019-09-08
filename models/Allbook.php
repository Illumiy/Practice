<?php

namespace app\models;

use Yii;

class Allbook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }
    public function getAuthor()
    {
        return $this->hasMany(Author::className(), ['id' => 'id_author'])
            ->viaTable('authorbook', ['id_book' => 'id']);
    }
    public function getGenre()
    {
        return $this->hasMany(Genre::className(), ['id' => 'id_genre'])
            ->viaTable('bookgenre', ['id_book' => 'id']);
    }
    
    public function getShop()
    {
        return $this->hasMany(Shop::className(), ['id_book' => 'id']);
    }
    public function getRating()
    {
        return $this->hasMany(Rating::className(), ['id_book' => 'id']);
    }
  
}
