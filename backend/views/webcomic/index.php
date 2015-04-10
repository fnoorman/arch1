<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchWebcomicSequence */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Webcomic Sequences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webcomic-sequence-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Webcomic Sequence', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],
            [
                'attribute'=>'id',
                'headerOptions' => ['width' => '120'],
            ],
            [
                'attribute'=>'sequence',
                'headerOptions' => ['width' => '120'],
            ],
            [
                'attribute'=>'qrcode_id',
                'headerOptions' => ['width' => '120'],
            ],
            [
                'format' => 'text',
                'label' => 'QR Code',
                'value' => function($data) {return $data->qrcode->code;},
                'headerOptions' => ['width' => '120'],
            ],
            
            [
                'format' => 'image',
                'label' => 'Image',
                'value' => function($data) {return $data->imageUrl;}
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
