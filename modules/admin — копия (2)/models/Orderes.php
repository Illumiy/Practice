<?php

namespace app\modules\admin\models;

use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use \yii\db\Expression;
use Yii;

/**
 * This is the model class for table "orderes".
 *
 * @property int $id
 * @property string $creates_at
 * @property string $updated_at
 * @property int $status
 * @property string $address
 * @property int $id_user
 * @property string $pay
 * @property string $card
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
    public function behaviors()
    {
        return [
            [   //ЗаПись времени
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['creates_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creates_at', 'updated_at'], 'safe'],
            [['status', 'id_user'], 'integer'],
            [['address', 'id_user', 'card'], 'required'],
            [['address'], 'string', 'max' => 255],
            [['pay'], 'string', 'max' => 30],
            [['card'], 'string', 'max' => 20],
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
            'creates_at' => 'Creates At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'address' => 'Address',
            'id_user' => 'Id User',
            'pay' => 'Pay',
            'card' => 'Card',
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
