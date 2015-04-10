<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\ArrayHelper;
use backend\models\Qrcode;

/* @var $this yii\web\View */
/* @var $model backend\models\Qrcode */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qrcodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
    <br>

    <h3>Detail QR Information</h3>
    <hr>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            // 'created_at',
            // 'updated_at',
            // 'create_by',
            // 'start_at',
            // 'end_by',
            // 'updated_by',
            [
                'attribute' => 'category_id',
                //'value' => function ($data){ return $data->categoryIdIs;}
                'value' => QRcode::getCategoryName($model->category_id)
            ],
            [
                'attribute'=>'client_id',
                'value'=> QRcode::getClientName($model->client_id)
            ]
        ],
    ]) ?>
<h3>Image Sequence</h3>
<hr>
<?= dosamigos\gallery\Gallery::widget(['items' => $items]);?>
<br>

<h3>Upload images</h3>
<hr>

   <?= FileUploadUI::widget([
        'model' => $webComicModel,
        'attribute' => 'image',
        'url' => ['qrcode/upload', 'id' => $model->id],
        'gallery' => false,
        'fieldOptions' => [
                'accept' => 'image/*'
        ],
        'clientOptions' => [
                'maxFileSize' => 2000000
        ],
        // ... 
        'clientEvents' => [
                'fileuploaddone' => 'function(e, data) {
                                        console.log(e);
                                        console.log(data);
                                    }',
                'fileuploadfail' => 'function(e, data) {
                                        console.log(e);
                                        console.log(data);
                                    }',
        ],
    ]);
    ?>



</div>
