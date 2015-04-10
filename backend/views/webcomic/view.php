<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\WebcomicSequence */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Webcomic Sequences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webcomic-sequence-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-md-4">
            <h3>Image Sequence</h3>
            <hr>
            <?= Html::img($model->getImage()->getUrl('x150')) ?> 
        </div>
        <div class="col-md-8">

        <h3>Sequence Detail information</h3>
        <hr>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'qrcode_id',
                    'sequence',
                    'filename',
                ],
            ]) ?>
        </div>
    </div>
    
    

</div>
