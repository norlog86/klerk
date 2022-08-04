<?php

namespace app\models;

/**
 * @property mixed|null $password
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone'], 'integer'],
            [['name', 'email', 'password', 'login'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
            'phone' => 'Phone',
        ];
    }

    public static function findIdentity($id): User|\yii\web\IdentityInterface|null
    {
        return User::findOne($id);
    }
    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public static function findByLogin($login): User|array|\yii\db\ActiveRecord|null
    {
        return User::find()->where(['login'=>$login])->one();
    }

    public function validatePassword($password): bool
    {
        return ($this->password == $password) ? true : false;
    }
}
