<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Qrinfo */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Qrinfo',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qrinfos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'QRModel'=> $QRModel
    ]) ?>

</div>
