<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Qrcode;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchQrcode */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Qrcodes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Qrcode',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            // 'created_at',
            // 'updated_at',
            // 'create_by',
            // 'start_at',
            // 'end_by',
            // 'updated_by',
            // 'category_id',
            [
                'attribute' => 'category_id',
                'filter' => ArrayHelper::map(QRcode::getCategoryList(),'id','category'),
                //'value' => function ($data){ return $data->categoryIdIs;}
                //'value' => function($data){ return ArrayHelper::map(QRcode::getCategoryList(),'id','category')[$data->category_id];}
                'value'=> function ($data){return QRcode::getCategoryName($data->category_id);}
            ],
            [
                'attribute' => 'client_id',
                'filter' => ArrayHelper::map(QRcode::getClientList(),'id','client'),
                'value' => function($data){ return ArrayHelper::map(QRcode::getClientList(),'id','client')[$data->client_id];}
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
