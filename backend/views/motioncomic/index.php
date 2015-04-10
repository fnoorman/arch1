<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchMotioncomicSequence */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Motioncomic Sequences');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motioncomic-sequence-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Motioncomic Sequence'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' =>'id',
                'headerOptions' => ['width' => '120'],
            ],
            [
                'attribute' =>'qrcode_id',
                'headerOptions' => ['width' => '120'],
                'value'=>function($data){return $data->qrcode->code;}
            ],
            // 'qrcode_id',
            [
                'attribute' =>'sequence',
                'headerOptions' => ['width' => '80'],
                
            ],
            // 'sequence',
            'filename',
            [
                'attribute' =>'width',
                'headerOptions' => ['width' => '80'],
                
            ],
            // 'width',
            // 'height',
            // 'options:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
