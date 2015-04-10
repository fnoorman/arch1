<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MotioncomicSequence */

$this->title = Yii::t('app', 'Create Motioncomic Sequence');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Motioncomic Sequences'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motioncomic-sequence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'QRModel' => $QRModel,
    ]) ?>

</div>
