<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $iduser
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $isAdmin
 * @property resource $photo
 * @property string $authKey
 * @property string $username
 */
class User extends \yii\db\ActiveRecord  implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'email', 'password', 'isAdmin'], 'required'],
            [['isAdmin'], 'integer'],
            [['photo'], 'string'],
            [['login', 'email', 'password', 'authKey', 'username'], 'string', 'max' => 45],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iduser' => 'Iduser',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
            'photo' => 'Photo',
            'authKey' => 'Auth Key',
            'username' => 'Username',
        ];
    }


      


    public static function findByUsername($username)
    {
        $user = self::find()
            ->where([
                "login" => $username
            ])
            ->one();
        
        return new static($user);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentity($iduser)
    {
         $user = User::findOne($iduser);
         return $user;
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

      /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->iduser;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
        //throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');

    }


}
