<?php

namespace app\models;

use Yii;

class Shop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop';
    }
    public function getBookgenre()
    {
        return $this->hasMany(Bookgenre::className(), ['id_book' => 'id']);
    }
    
    public function getNameWithQty(){
        return $this->name->name. '  '. $this->qty->name;
     }
  
}
