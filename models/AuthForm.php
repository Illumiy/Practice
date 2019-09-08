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
class AuthForm extends \yii\db\ActiveRecord
{
    public $rememberMe=true;
    private $_user=false;
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
            [['password', 'username'], 'required','message'=>'Поле не заполненно'],
            ['password', 'validatepassword'],
            
            [['password', 'username'], 'string', 'max' => 20,'tooLong'=>'Слишком много символов'],
            
        ];
    }
    
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Не правильный логин или пароль');
            }
        }
    }
    public function auth() //Вход
    {
        if ($this->validate()) {
            if($this->rememberMe){
                $u = $this->getUser();
                $u->auth_key=$this->generateAuthKey();
                $u->save();
            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }
    public function generateAuthKey()//Создание ключа для входа
    {
        return $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public function getUser()//Получение пользователя
    {
        if ($this->_user===false){
            $this->_user=User::findByUsername($this->username);
        }
        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'password' => 'Пароль',
            'username' => 'Ваш логин',
            
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
