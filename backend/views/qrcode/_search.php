<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SearchQrcode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qrcode-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'start_at') ?>

    <?php // echo $form->field($model, 'end_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'client_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
