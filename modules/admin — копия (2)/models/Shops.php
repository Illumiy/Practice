<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "shops".
 *
 * @property int $id
 * @property string $addres
 *
 * @property Shopsbook[] $shopsbooks
 */
class Shops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['addres'], 'required'],
            [['addres'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'addres' => 'Addres',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsbooks()
    {
        return $this->hasMany(Shopsbook::className(), ['id_shops' => 'id']);
    }
}
