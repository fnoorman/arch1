<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SearchQrinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qrinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'artist_id') ?>

    <?= $form->field($model, 'author_id') ?>

    <?= $form->field($model, 'grartist_id') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'qrcode_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
