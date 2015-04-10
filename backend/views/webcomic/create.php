<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\WebcomicSequence */

$this->title = 'Create Webcomic Sequence';
$this->params['breadcrumbs'][] = ['label' => 'Webcomic Sequences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webcomic-sequence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
