<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/3 - 下午8:50
 *
 */

namespace backend\controllers;


use backend\models\Article;
use backend\models\Column;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Url;

class ColumnController extends BackendController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ]
            ]
        ];
    }

    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Column::find(),
        ]);

        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Column();
        $model->scenario = 'create';

        if($model->load(Yii::$app->request->post())){
            if($model->addColumn()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model =  Column::findOne($id);
        $model->scenario = 'update';

        if($model->load(Yii::$app->request->post())){
            if($model->updateColumn()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '修改成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '修改失败']);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        //TODO::检查栏目下是否有文章
        if(Article::findOne(['column_id'=>$id])){
            Yii::$app->session->setFlash('error', '请先删除栏目下所有文章，再执行此操作!');
            return $this->redirect(['index']);
        }
        Column::findOne($id)->delete();
        Yii::$app->session->setFlash('success', '删除成功!');
        return $this->redirect(['index']);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($id){
            $model = Column::findOne($id);
        }else{
            $model = new Column();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }
}