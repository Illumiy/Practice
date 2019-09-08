<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use Yii;
use \yii\db\ActiveRecord;
use \yii\db\Expression;

/**
 * This is the model class for table "orderes".
 *
 * @property int $id
 * @property string $creates_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property int $status
 * @property string $addres
 * @property int $id_user
 */
class Orderes extends ActiveRecord
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
    public function getOrderItems(){
        return $this->hasMany(OrderItems::className(),['id_orderes'=>'id']);
    }
    public function getUser(){
        return $this->hasOne(user::className(),['id'=>'id_user']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address','pay','card'], 'required'],
            [['descr'], 'default'],
            [['status', 'id_user','card'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'address' => 'Адрес',
            'pay'=>'Способо олаты',
            'card' => 'Карта',
            'descr' => 'Доп. Информация',
        ];
    }
}
