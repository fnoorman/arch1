<?php

namespace backend\controllers;

use Yii;
use backend\models\MotioncomicSequence;
use backend\models\SearchMotioncomicSequence;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Qrcode;
use yii\helpers\ArrayHelper;

/**
 * MotioncomicController implements the CRUD actions for MotioncomicSequence model.
 */
class MotioncomicController extends Controller
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
     * Lists all MotioncomicSequence models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchMotioncomicSequence();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MotioncomicSequence model.
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
     * Creates a new MotioncomicSequence model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MotioncomicSequence();
        $QRModel = Qrcode::find()->select(['code as name','code as label','id as qrcode_id'])->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'QRModel' => $QRModel

            ]);
        }
    }

    /**
     * Updates an existing MotioncomicSequence model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $QRModel = Qrcode::find()->select(['code as name','code as label','id as qrcode_id'])->asArray()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'QRModel'=> $QRModel
            ]);
        }
    }

    /**
     * Deletes an existing MotioncomicSequence model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MotioncomicSequence model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MotioncomicSequence the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MotioncomicSequence::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
