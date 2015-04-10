<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\WebcomicSequence */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="webcomic-sequence-form">

    <?php $form = ActiveForm::begin([
    	'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <!-- <?= $form->field($model, 'qrcode_id')->textInput() ?> -->

    <?= $form->field($model, 'sequence')->textInput() ?>

    <!-- <?= $form->field($model, 'filename')->textInput(['maxlength' => 45]) ?> -->
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
