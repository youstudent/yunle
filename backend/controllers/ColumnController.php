<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/3 - 下午8:50
 *
 */

namespace backend\controllers;


use backend\models\Column;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

class ColumnController extends BackendController
{
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
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        //TODO::检查栏目下是否有文章
        Column::findOne($id)->delete();
        return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '删除成功', 'url'=> Url::to(['index'])]);
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