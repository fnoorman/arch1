<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Profile',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="profile-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="row">
      <div class="col-md-3">
        <h3>Avatar /Profile Image</h3>
        <hr>
        <?php if ($model->profile_image !== ''): ?>
          <?= Html::img($model->getImage()->getUrl('x200'), ['alt' => $model->alias, 'class'=>'img-circle']) ?>
        <?php endif ?>
      </div>
      <div class="col-md-9">
        <?= $this->render('_form', [
          'model' => $model,
          ]) ?>
      </div>
    </div>





</div>
