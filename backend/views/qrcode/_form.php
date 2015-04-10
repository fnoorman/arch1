<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Qrcode;

/* @var $this yii\web\View */
/* @var $model backend\models\Qrcode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qrcode-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => 19]) ?>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'create_by')->textInput() ?> -->

    <!-- <?= $form->field($model, 'start_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'end_by')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_by')->textInput() ?> -->

    <!-- <?= $form->field($model, 'category_id')->textInput() ?> -->
    
    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Qrcode::getCategoryList(),'id','category')) ?>
    <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map(QRCode::getClientList(),'id','client')) ?>
    <!-- <?= $form->field($model, 'client_id')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
