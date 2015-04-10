<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\WebcomicSequence */

$this->title = 'Update Webcomic Sequence: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Webcomic Sequences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="webcomic-sequence-update">

    <h1><?= Html::encode($this->title) ?></h1>
	<h3>Image Sequence</h3>
	<hr>
    <?= Html::img($model->getImage()->getUrl('x100')) ?>    
    
    <h3>Sequence Information</h3>
	<hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
