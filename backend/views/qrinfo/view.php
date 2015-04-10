<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Qrinfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qrinfos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrinfo-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="row">
        <div class="col-md-3">
            <h3>QR Info Cover Image</h3>
            <hr>
            <?= Html::img($model->coverImage,['class'=>'shadow'])?>
            <hr>
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
        </div>
        <div class="col-md-8">
            <h3>QR Detail Information</h3>
            <hr>
            <?= DetailView::widget([
                'model' => $model,
                    'options' => ['class'=>'table table-striped table-bordered detail-view motion-comic'],
                    'attributes' => [
                        'id',
                        [
                            'attribute'=>'artist_id',
                            'value'=>$model->artist
                        ],
                        // 'artist_id',
                        // 'author_id',
                        [
                            'attribute'=>'author_id',
                            'value'=>$model->author
                        ],
                        [
                            'attribute'=>'grartist_id',
                            'value'=>$model->getGraphicArtist()
                        ],
                        // 'grartist_id',
                        'description:ntext',
                        'qrcode_id',
                    ],
                ]) 
            ?>
        </div>
    </div>
    


   

</div>
