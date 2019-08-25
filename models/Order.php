<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property int $idOrder
 * @property string $name
 * @property int $countDetail
 * @property int $Customers_idCustomers
 * @property int $Detail_idDetail
 *
 * @property Customers $customersIdCustomers
 * @property Detail $detailIdDetail
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'countDetail', 'Customers_idCustomers', 'Detail_idDetail'], 'required'],
            [['countDetail', 'Customers_idCustomers', 'Detail_idDetail'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['Customers_idCustomers'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['Customers_idCustomers' => 'idCustomers']],
            [['Detail_idDetail'], 'exist', 'skipOnError' => true, 'targetClass' => Detail::className(), 'targetAttribute' => ['Detail_idDetail' => 'idDetail']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idOrder' => 'Id Order',
            'name' => 'Name',
            'countDetail' => 'Count Detail',
            'Customers_idCustomers' => 'Customers Id Customers',
            'Detail_idDetail' => 'Detail Id Detail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomersIdCustomers()
    {
        return $this->hasOne(Customers::className(), ['idCustomers' => 'Customers_idCustomers']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailIdDetail()
    {
        return $this->hasOne(Detail::className(), ['idDetail' => 'Detail_idDetail']);
    }
}
