<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileinput\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">
  <?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data']
    ]); ?>
    <div class="row">
      <h3>Profile Detail information</h3>
      <hr>
      <div class="col-md-5">

          <!-- <?= $form->field($model, 'id')->textInput() ?> -->

          <?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>

          <?= $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>

          <?= $form->field($model, 'alias')->textInput(['maxlength' => 45]) ?>
      </div>
      <div class="col-md-7">
        <?=FileInput::widget([
          'model' => $model,
          'attribute' => 'image', // image is the attribute
          // using STYLE_IMAGE allows me to display an image. Cool to display previously
          // uploaded images
          // 'thumbnail' => $model->getAvatarImage(),
          'style' => FileInput::STYLE_IMAGE
          ]);?></div>
    </div>


    <!-- <?= $form->field($model, 'profile_image')->textInput(['maxlength' => 45]) ?> -->


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
