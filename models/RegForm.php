<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $password
 * @property string $username
 * @property string $email
 *
 * @property Orders[] $orders
 * @property Rating[] $ratings
 * @property Saved[] $saveds
 */
class RegForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'username', 'email','phone','address'], 'required','message'=>'Поле не заполненно'],
            ['username','unique'],
            ['email', 'email'],
            ['phone', 'integer'],
            [['password', 'username', 'email','phone','address'], 'string', 'max' => 20,'tooLong'=>'Слишком много символов'],
            [['password', 'username','phone','address'], 'string', 'min' => 6,'tooShort'=>'Слишком мало символов'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone'=>'Ваш телефон',
            'password' => 'Пароль',
            'username' => 'Логин',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaveds()
    {
        return $this->hasMany(Saved::className(), ['id_user' => 'id']);
    }
}
