<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use yii\jui\AutoComplete;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MotioncomicSequence */
/* @var $form yii\widgets\ActiveForm */
?>

<hr>
<div class="motioncomic-sequence-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'qrcode_id')->textInput() ?> -->
    <?= Html::activeHiddenInput($model,'qrcode_id')?>

    <?= $form->field($model, 'code')->widget(AutoComplete::classname(), [
        'clientOptions' => [
            //'source'=> ArrayHelper::getColumn($QRModel,'code'),
            'source'=> $QRModel,
            'autoFill'=>true,
            'select'=>new JsExpression("function( event, ui ) {
                $('#motioncomicsequence-qrcode_id').val(ui.item.qrcode_id);
             }")
        ],
        'options'=>['class'=>'form-control','value' => (isset($test)? $test:null)]
    ]) ?>
    <?= $form->field($model, 'sequence')->textInput() ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'width')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'height')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'options')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


