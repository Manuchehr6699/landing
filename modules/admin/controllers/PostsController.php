<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\ModelStatus;
use Cocur\Slugify\Slugify;
use Yii;
use app\models\Posts;
use app\modules\admin\models\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
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
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Posts();

        if ($model->load(Yii::$app->request->post())) {
            $date_post= $_POST['date_post'];
            $s = explode('/', $date_post);
            $model->date_post = $s[2].'-'.$s[0].'-'.$s[1];
            $slug = new Slugify();
            $photo = UploadedFile::getInstance($model, 'photo');
            if(!empty($photo)) {
                $path = Yii::getAlias('@uploadsroot');
                $fileName = $slug->slugify($model->title) . '.' . $photo->extension;
                $photo->saveAs($path . '/posts/' . $fileName);
                $model->photo = $fileName;
            }
            ModelStatus::setTimeStampCreate($model);
            ModelStatus::setTimeStampUpdate($model);
            if($model->save()){
                ModelStatus::setNotifySuccesSaved();
                return $this->redirect(['index']);
            } else {
                ModelStatus::setNotifyErrorSaved();
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldPhoto = $model->photo;
        if ($model->load(Yii::$app->request->post())){
            $date_post= $_POST['date_post'];
            $s = explode('/', $date_post);
            $model->date_post = $s[2].'-'.$s[0].'-'.$s[1];
            $slug = new Slugify();
            $photo = UploadedFile::getInstance($model, 'photo');
            if(!empty($photo)) {
                $path = Yii::getAlias('@uploadsroot');
                $fileName = $slug->slugify($model->title) . '.' . $photo->extension;
                $photo->saveAs($path . '/posts/' . $fileName);
                $model->photo = $fileName;
            }else{
                $model->photo = $oldPhoto;
            }
            ModelStatus::setTimeStampUpdate($model);
            if($model->save()){
                ModelStatus::setNotifySuccesSaved();
                return $this->redirect(['index']);
            } else {
                ModelStatus::setNotifyErrorSaved();
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Posts model.
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
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
