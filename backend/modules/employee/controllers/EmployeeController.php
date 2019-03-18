<?php

namespace backend\modules\employee\controllers;

use Yii;
use common\models\Employee;
use backend\modules\employee\controllers\EmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use common\models\Department;
use yii\web\UploadedFile;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();
        $user = new User();
        $current_image = 'default.jpg';
        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->role = '0';
            if($user->save()){
                $file = UploadedFile::getInstance($model, 'picture');
                if(!empty($file)){
                    $model->picture = $model->firstname.'.'.$file->extension;
                    $file->saveAs('uploads/employee/'.$model->firstname.'.'.$file->extension);
                }else
                    $model->picture = $current_image;
                    $model->user_id = $user->id;
                    $model->save();
            }
            return $this->redirect(['index']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = $model->user;
        $oldpass =  $user->password_hash;
        $current_image = $model->employee_picture;
        if ($model->load(Yii::$app->request->post()) && $user->Load(Yii::$app->request->post())) {
            if($oldpass!=$user->password_hash){
                $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            }
            if($user->save()){
                $file = UploadedFile::getInstance($model, 'employee_picture');
                if(!empty($file)){
                    $file->saveAs('uploads/employee/'.$user->username.'.'.$file->extension);
                }else
                    $model->employee_picture = $current_image;
                    $model->save();    
            }
            return $this->redirect(['index']);
        }

        return $this->renderAjax('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
