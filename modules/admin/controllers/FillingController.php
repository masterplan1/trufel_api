<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Filling;
use app\modules\admin\models\FillingSearch;
use app\modules\admin\controllers\AppAdminController;
use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;

/**
 * FillingController implements the CRUD actions for Filling model.
 */
class FillingController extends AppAdminController
{

    /**
     * Lists all Filling models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FillingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexCandybar()
    {
        $searchModel = new FillingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, true);

        return $this->render('index-candybar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Filling model.
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
    public function actionViewCandybar($id)
    {
        return $this->render('view-candybar', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Filling model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Filling();
        $model->scenario = Filling::SCENARIO_CREATE;

        if ($model->load(Yii::$app->request->post())) {
            $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
            
            if($model->save() && $model->image){
                $model->upload();
            }
            Yii::$app->session->setFlash('success', 'Створено нову начинку!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    public function actionCandybar()
    {
        $model = new Filling();
        $model->scenario = Filling::SCENARIO_CANDYBAR;

        if ($model->load(Yii::$app->request->post())) {

            if($model->save()){
                Yii::$app->session->setFlash('success', 'Створено нову начинку!');
                return $this->redirect(['view-candybar', 'id' => $model->id]);
            }    
        }
        return $this->render('candybar', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Filling model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
            
            $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
            
            if($model->save() && $model->image){
                $model->upload();
            }
            Yii::$app->session->setFlash('success', 'Збережено!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdateCandybar($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Filling::SCENARIO_CANDYBAR;
        
        if ($model->load(Yii::$app->request->post())) {
 
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Збережено!');
                return $this->redirect(['view-candybar', 'id' => $model->id]);
            }
        }

        return $this->render('update-candybar', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Filling model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        
        $model = $this->findModel($id);
        $categoryId = $model->category_id;
        $model->removeImages();
        $model->delete();
        
        if($categoryId >= 10){
            return $this->redirect(['index-candybar']);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Filling model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Filling the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Filling::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
