<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchQrinfo */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Qrinfos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Qrinfo',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [ 
                'attribute' => 'id',
                'headerOptions' => ['width' => '80']
            ],
            [
                'attribute'=>'artist_id',
                'headerOptions' => ['width' => '100'],
                'value'=>function($data){ return $data->artist;}
            ],
            [
                'attribute'=>'author_id',
                'value'=>function($data){ return $data->author;},
                'headerOptions' => ['width' => '100'],
            ],
             [
                'attribute'=>'grartist_id',
                'headerOptions' => ['width' => '100'],
                'value'=>function($data){ return $data->graphicArtist;}
            ],
            'description:ntext',
            // 'qrcode_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
