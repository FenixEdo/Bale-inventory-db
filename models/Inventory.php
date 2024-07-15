<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory".
 *
 * @property int $id
 * @property int|null $stack_number
 * @property string|null $location
 * @property int|null $quantity
 * @property string|null $type
 * @property float|null $price
 * @property string|null $date_baled
 * @property float|null $bale_weight_average
 *
 * @property Sales[] $sales
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stack_number', 'quantity'], 'integer'],
            [['type'], 'string'],
            [['price', 'bale_weight_average'], 'number'],
            [['date_baled'], 'safe'],
            [['location'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stack_number' => 'Stack Number',
            'location' => 'Location',
            'quantity' => 'Quantity',
            'type' => 'Type',
            'price' => 'Price',
            'date_baled' => 'Date Baled',
            'bale_weight_average' => 'Bale Weight Average',
        ];
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::class, ['inventory_id' => 'id']);
    }
}
