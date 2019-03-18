<?php

namespace backend\modules\tasks\controllers;

use Yii;
use common\models\Tasks;
use common\models\User;
use backend\modules\tasks\controllers\TasksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

/**
 * TasksController implements the CRUD actions for Tasks model.
 */
class TasksController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex() {
        $identity = Yii::$app->user->identity->username;
        $searchModel = new TasksSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()->where(['staff' => $identity]),
        ]);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->renderAjax('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Tasks();

        if ($model->load(Yii::$app->request->post())) {
            $model->user = Yii::$app->user->identity->username;
            $model->status = 'pending';
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $current_image = $model->evidence_end_img;
        if ($model->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())) {
            if($model->save()){
                $file = UploadedFile::getInstance($model, 'evidence_end_img');
                if (!empty($file)) {
                    $model->evidence_start_img = $model->task_id . '_start' . '.' . $file->extension;
                    $file->saveAs('uploads/tasks/image/end/' . $model->task_id . '_end' . '.' . $file->extension);
                } else
                    $model->evidence_end_img = $current_image;
            }
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('_update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
