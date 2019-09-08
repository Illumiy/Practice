<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "orderes".
 *
 * @property int $id
 * @property string $creates_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property int $status
 * @property string $address
 * @property int $id_user
 *
 * @property OrderItems[] $orderItems
 * @property User $user
 */
class Orderes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creates_at', 'updated_at'], 'safe'],
            [['qty', 'sum', 'address', 'id_user'], 'required'],
            [['qty', 'status', 'id_user'], 'integer'],
            [['sum'], 'number'],
            [['address'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'creates_at' => 'Добавлен',
            'updated_at' => 'Обновлён',
            'qty' => 'Кол-во',
            'sum' => 'Сумма',
            'status' => 'Статус',
            'address' => 'Адрес',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['id_orderes' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
