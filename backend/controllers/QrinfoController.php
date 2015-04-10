<?php

namespace backend\controllers;

use Yii;
use backend\models\Qrinfo;
use backend\models\SearchQrinfo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\helpers\Url;
use backend\models\Qrcode;

/**
 * QrinfoController implements the CRUD actions for Qrinfo model.
 */
class QrinfoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Qrinfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchQrinfo();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Qrinfo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Qrinfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Qrinfo();
        $QRModel = Qrcode::find()->select(['code as name','code as label','id as qrcode_id'])->asArray()->all();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $tempImage = UploadedFile::getInstance($model,'image');
            if(isset($tempImage)){
                $model->attachImage($tempImage->tempName,true);
                @unlink($tempImage->tempName);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'QRModel'=> $QRModel

            ]);
        }
    }

    /**
     * Updates an existing Qrinfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $QRModel = Qrcode::find()->select(['code as name','code as label','id as qrcode_id'])->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $oldImage = $model->getImage();
            if(isset($oldImage)){
                $model->removeImage($oldImage);
            }
            $tempImage = UploadedFile::getInstance($model,'image');
            if(isset($tempImage)){
                $model->attachImage($tempImage->tempName,true);
                @unlink($tempImage->tempName);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'QRModel'=> $QRModel
            ]);
        }
    }

    /**
     * Deletes an existing Qrinfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image = $model->getImage();
        $model->removeImgage($image);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Qrinfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Qrinfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Qrinfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // Upload image code section
    public function actionUpload($id){

        $qrInfoModel = $this->findModel($id);
        //$qrInfoModel = new WebcomicSequence();
        //$qrInfoModel->qrcode_id = $id;
        $qrInfoModel->image = UploadedFile::getInstance($qrInfoModel,'image');
        if(isset($qrInfoModel->image)){
            Yii::$app->response->getHeaders()->set('Vary', 'Accept');
            Yii::$app->response->format = Response::FORMAT_JSON;

            $response=[];
            if($qrInfoModel->save(false)){
                $qrInfoModel->attachImage($qrInfoModel->image->tempName);
                $img = $qrInfoModel->getImage();
                $response['files'][]=[
                    'name' => $qrInfoModel->image->name,
                    'type' => $qrInfoModel->image->type,
                    'size' => $qrInfoModel->image->size,
                    // 'url' => $qrInfoModel->getPathTo(),
                    'thumbnailUrl' => $img->getUrl('x80'),
                    'deleteUrl' => Url::to(['delete', 'id' => $qrInfoModel->id]),
                    'deleteType' => 'POST'
                ];
            }
            else {
                $response[] = ['error' => Yii::t('app', 'Unable to save picture')];
            }

            @unlink($qrInfoModel->image->tempName);

        }
        else
        {            
                throw new HttpException(500, Yii::t('app', 'Could not upload file.'));
        }
        return $response;

    }
}
