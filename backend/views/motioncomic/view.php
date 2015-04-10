<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\assets\MotionComicSequenceAsset;

/* @var $this yii\web\View */
/* @var $model backend\models\MotioncomicSequence */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Motioncomic Sequences'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

MotionComicSequenceAsset::register($this);
?>
<div class="motioncomic-sequence-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (isset($model->options)): ?>
        <?= $model->options ?>
    <?php endif ?>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options'=>['class'=>'table table-striped table-bordered detail-view motion-comic'],
        'attributes' => [
            'id',
            [
                'attribute' => 'qrcode_id',
                'value' => $model->qrcode->code
            ],
            // 'qrcode_id',
            'sequence',
            'filename',
            'width',
            'height',
            'options:ntext',
        ],
    ]) ?>

</div>
