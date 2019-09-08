<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $password
 * @property string $username
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $auth_key
 * @property int $status
 *
 * @property Orderes[] $orderes
 * @property Rating[] $ratings
 */
class User extends \yii\db\ActiveRecord
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
            [['password', 'username', 'email', 'phone', 'address', 'status'], 'required'],
            [['status'], 'integer'],
            [['password', 'username', 'email'], 'string', 'max' => 100],
            [['phone', 'address', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'password' => 'Password',
            'username' => 'Username',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderes()
    {
        return $this->hasMany(Orderes::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['id_user' => 'id']);
    }
}
