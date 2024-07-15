<?php

namespace app\controllers;

use app\models\Sales;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalesController implements the CRUD actions for Sales model.
 */
class SalesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Sales models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Sales::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'sale_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sales model.
     * @param int $sale_id Sale ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sale_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($sale_id),
        ]);
    }

    /**
     * Creates a new Sales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Sales();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())  && $model->validate()) {
                if ($model->save()) {
                    return $this->redirect(['view', 'sale_id' => $model->sale_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $sale_id Sale ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sale_id)
    {
        $model = $this->findModel($sale_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sale_id' => $model->sale_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $sale_id Sale ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sale_id)
    {
        $this->findModel($sale_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $sale_id Sale ID
     * @return Sales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sale_id)
    {
        if (($model = Sales::findOne(['sale_id' => $sale_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
