<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <!-- <?= Html::img('@web/media/uploads/'.$model->profile_image, ['alt' => $model->alias, 'class'=>'img-circle']) ?> -->


    <div class="row">
        <div class="col-md-3">
            <h3>Avatar / Profile Image</h3>
            <hr>
            <div class="row">
                <div class="col-md-12" style="text-align:center">
                    <?php if ($model->profile_image !== ''): ?>
                        <?= Html::img($model->getImage()->getUrl('x200'), ['alt' => $model->alias, 'class'=>'img-circle']) ?>
                    <?php endif ?>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center">
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
            </div>


        </div>
        <div class="col-md-9">
          <h3> Profile Detail</h3>
          <hr>
             <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-striped table-bordered detail-view motion-comic'],
                'attributes' => [
                    // 'id',
                    'first_name',
                    'last_name',
                    'alias',
                    // 'profile_image',
                ],
            ]) ?>
        </div>
    </div>




</div>
