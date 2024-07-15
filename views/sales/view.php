<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Sales $model */

$this->title = $model->sale_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'sale_id' => $model->sale_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'sale_id' => $model->sale_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sale_id',
            'inventory_id',
            'sale_date',
            'quantity_sold',
            'sale_price',
            'customer_name',
            'type',
        ],
    ]) ?>

</div>
