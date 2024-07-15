<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sales $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'inventory_id')->textInput() ?>

    <?= $form->field($model, 'sale_date')->textInput() ?>

    <?= $form->field($model, 'quantity_sold')->textInput() ?>

    <?= $form->field($model, 'sale_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'grown' => 'Grown', 'purchased' => 'Purchased', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
