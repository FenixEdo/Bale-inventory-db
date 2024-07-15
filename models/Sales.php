<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property int $sale_id
 * @property int|null $inventory_id
 * @property string|null $sale_date
 * @property int|null $quantity_sold
 * @property float|null $sale_price
 * @property string|null $customer_name
 * @property string|null $type
 *
 * @property Inventory $inventory
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inventory_id', 'quantity_sold'], 'integer'],
            [['sale_date'], 'safe'],
            [['sale_price'], 'number'],
            [['type'], 'string'],
            [['customer_name'], 'string', 'max' => 255],
            ['quantity_sold', 'validateQuantity'],
            [['inventory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inventory::class, 'targetAttribute' => ['inventory_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sale_id' => 'Sale ID',
            'inventory_id' => 'Inventory ID',
            'sale_date' => 'Sale Date',
            'quantity_sold' => 'Quantity Sold',
            'sale_price' => 'Sale Price',
            'customer_name' => 'Customer Name',
            'type' => 'Type',
        ];
    }

    public function validateQuantity($attribute, $params, $validator)
    {
        $inventory = Inventory::findOne($this->inventory_id);
        if (!$inventory || $this->$attribute > $inventory->quantity) {
            $this->addError($attribute, 'Quantity sold exceeds available inventory');
        }
    }

    /**
     * Gets query for [[Inventory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventory()
    {
        return $this->hasOne(Inventory::class, ['id' => 'inventory_id']);
    }
}
