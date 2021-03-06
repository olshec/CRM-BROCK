<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Customers".
 *
 * @property int $idCustomers
 * @property string $firstName
 * @property string $lastName
 * @property string $idDocument
 * @property int $City_idCity
 * @property string $date
 * @property string|null $theme
 * @property string|null $message
 * @property string|null $email
 * @property string|null $telephone
 *
 * @property City $cityIdCity
 * @property Order[] $orders
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'idDocument', 'City_idCity', 'date'], 'required'],
            [['City_idCity'], 'integer'],
            [['date'], 'safe'],
            [['message'], 'string'],
            [['firstName', 'lastName', 'idDocument', 'theme', 'email', 'telephone'], 'string', 'max' => 45],
            [['City_idCity'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['City_idCity' => 'idCity']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCustomers' => 'Id Customers',
            'firstName' => 'Имя',
            'lastName' => 'Фамилия',
            'idDocument' => 'Паспорт',
            'City_idCity' => 'Город',
            'date' => 'Дата',
            'theme' => 'Тема',
            'message' => 'Сообщение',
            'email' => 'Email',
            'telephone' => 'Телефон',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityIdCity()
    {
        return $this->hasOne(City::className(), ['idCity' => 'City_idCity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['Customers_idCustomers' => 'idCustomers']);
    }
    
    public function getCity()
    {
        $td=City::find()->all();
        foreach($td as $rec){
            $masName[$rec->idCity]=$rec->name;
        }
        return $masName;
    }
    
    
}
