<?php

namespace backend\controllers;

use Yii;
use backend\models\Qrcode;
use backend\models\WebcomicSequence;
use backend\models\SearchQrcode;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\helpers\Url;
use yii\web\HttpException;
// use common\components\Utility\BekaUtility;

/**
 * QrcodeController implements the CRUD actions for Qrcode model.
 */
class QrcodeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    // 'upload' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Qrcode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchQrcode();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Qrcode model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);
        $webComicModel = new WebcomicSequence();
        $webComicModel->qrcode_id = $id;
        $items = $model->getGallery();
        return $this->render('view', [
            'model' => $model,
            'webComicModel' => $webComicModel,
            'items'=>$items

        ]);
    }

    public function actionUpload($id){

        $model = $this->findModel($id);
        $webComicModel = new WebcomicSequence();
        $webComicModel->qrcode_id = $id;
        $webComicModel->image = UploadedFile::getInstance($webComicModel,'image');
        if(isset($webComicModel->image)){
            Yii::$app->response->getHeaders()->set('Vary', 'Accept');
            Yii::$app->response->format = Response::FORMAT_JSON;

            $response=[];

            $webComicModel->filename = $webComicModel->image->name;
            $webComicModel->getAutoSequence('space');
            if($webComicModel->save(false)){
                $webComicModel->attachImage($webComicModel->image->tempName);
                $img = $webComicModel->getImage();
                $response['files'][]=[
                    'name' =>$webComicModel->image->name,
                    'type' => $webComicModel->image->type,
                    'size' => $webComicModel->image->size,
                    // 'url' => $webComicModel->getPathTo(),
                    'thumbnailUrl' => $img->getUrl('x80'),
                    'deleteUrl' => Url::to(['/webcomic/delete', 'id' => $webComicModel->id]),
                    'deleteType' => 'POST'
                ];
            }
            else {
                $response[] = ['error' => Yii::t('app', 'Unable to save picture')];
            }

            @unlink($webComicModel->image->tempName);

        }
        else
        {
            if ($webComicModel->hasErrors(['image'])) {
                // $response[] = ['error' => HtmlHelper::errors($webComicModel)];
            } else {
                throw new HttpException(500, Yii::t('app', 'Could not upload file.'));
            }
        }
        return $response;

    }



    /**
     * Creates a new Qrcode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Qrcode();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Qrcode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Qrcode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        // $imagesToRemove = $model->getImages();
        // $model->removeImages($imgToRemove);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Qrcode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Qrcode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Qrcode::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
