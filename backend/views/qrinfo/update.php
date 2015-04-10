<?php

use yii\helpers\Html;
//use dosamigos\fileupload\FileUploadUI;


/* @var $this yii\web\View */
/* @var $model backend\models\Qrinfo */

$this->title = Yii::t('app', 'Update QR Code Info : ', [
    'modelClass' => 'Qrinfo',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qrinfos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="qrinfo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    
    		
    		<?= $this->render('_form', [
		        'model' => $model,
		        'QRModel'=> $QRModel
		    ]) ?>
    	
			<!--?= 
			//FileUploadUI::widget([
			 //    'model' => $model,
			 //    'attribute' => 'image',
			 //    'url' => ['qrinfo/upload', 'id' => $model->id],
			 //    'gallery' => false,
			 //    'fieldOptions' => [
			 //            'accept' => 'image/*'
			 //    ],
			 //    'clientOptions' => [
			 //            'maxFileSize' => 2000000
			 //    ],
			 //    // ... 
			 //    'clientEvents' => [
			 //            'fileuploaddone' => 'function(e, data) {
			 //                                    console.log(e);
			 //                                    console.log(data);
			 //                                }',
			 //            'fileuploadfail' => 'function(e, data) {
			 //                                    console.log(e);
			 //                                    console.log(data);
			 //                                }',
			 //    ],
			 // ]);
			?-->
			
    	

    

</div>
