<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Profile;
use yii\helpers\ArrayHelper;
use dosamigos\fileinput\FileInput;
use yii\web\JsExpression;
use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $model backend\models\Qrinfo */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="qrinfo-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>
    <div class="row">
        <div class="col-md-5">
        <h3> QR Detail Info </h3>
        <hr>
            <!-- <?= $form->field($model, 'id')->textInput() ?> -->

            <!-- <?= $form->field($model, 'artist_id')->textInput() ?> -->

            <?= $form->field($model,'artist_id')->dropDownList(ArrayHelper::map(Profile::find()->all(),'id','alias'),['prompt'=>'Please select Artist']) ?>

            <!-- <?= $form->field($model, 'author_id')->textInput() ?> -->

            <?= $form->field($model,'author_id')->dropDownList(ArrayHelper::map(Profile::find()->all(),'id','alias'),['prompt'=>'Please select Author']) ?>

            <?= $form->field($model,'grartist_id')->dropDownList(ArrayHelper::map(Profile::find()->all(),'id','alias'),['prompt'=>'Please select Graphic Artist']) ?>

            <!-- <?= $form->field($model, 'grartist_id')->textInput() ?> -->

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <!-- <?= $form->field($model, 'qrcode_id')->textInput() ?> -->
            <?= Html::activeHiddenInput($model,'qrcode_id')?>

            <?= $form->field($model, 'code')->widget(AutoComplete::classname(), [
                'clientOptions' => [
                    //'source'=> ArrayHelper::getColumn($QRModel,'code'),
                    'source'=> $QRModel,
                    'autoFill'=>true,
                    'select'=>new JsExpression("function( event, ui ) {
                        $('#qrinfo-qrcode_id').val(ui.item.qrcode_id);
                     }")
                ],
                'options'=>['class'=>'form-control','value' => (isset($model->qrcode->code)? $model->qrcode->code:null)]
            ]) ?>
        </div>
        <div class="col-md-7">
            <h3> QR Info Cover Image </h3>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <?= Html::img($model->coverImage,['class'=>'shadow'])?>
                    
                    
                </div>
                <div class="col-md-7">
                    <?=FileInput::widget([
                        'model' => $model,
                        'attribute' => 'image', // image is the attribute
                        // using STYLE_IMAGE allows me to display an image. Cool to display previously
                        // uploaded images
                        // 'thumbnail' => $model->getAvatarImage(),
                        'style' => FileInput::STYLE_IMAGE,
                        'height'=>'270'
                    ]);?>
                </div>
            </div>
            
        </div>
    </div>
    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
