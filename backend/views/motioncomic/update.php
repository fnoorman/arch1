<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MotioncomicSequence */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Motioncomic Sequence',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Motioncomic Sequences'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="motioncomic-sequence-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'QRModel'=> $QRModel,
        'test'=> $model->qrcode->code,
    ]) ?>

</div>
