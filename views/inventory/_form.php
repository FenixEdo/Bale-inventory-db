<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Inventory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inventory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stack_number')->textInput() ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'grown' => 'Grown', 'purchased' => 'Purchased', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_baled')->textInput() ?>

    <?= $form->field($model, 'bale_weight_average')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
