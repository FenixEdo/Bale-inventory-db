<?php

use app\models\Sales;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sale_id',
            'inventory_id',
            'sale_date',
            'quantity_sold',
            'sale_price',
            //'customer_name',
            //'type',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sales $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'sale_id' => $model->sale_id]);
                 }
            ],
        ],
    ]); ?>


</div>
