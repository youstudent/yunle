<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/12 - 下午3:52
 *
 */

namespace backend\controllers;

use backend\models\AuthItem;
use pd\admin\models\searchs\AuthItem as AuthItemSearch;
use backend\models\Adminuser;
use backend\models\form\AdminuserForm;
use backend\models\searchs\AdminuserSearch;
use backend\models\searchs\AuthAssignmentSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;


class OrganizationController extends BackendController
{
    public $type;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'assign' => ['post'],
                    'remove' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionRoleIndex()
    {
        $searchModel = new AuthItemSearch(['type' => 1]);
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('role-index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    /**
     * 创建角色
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRoleCreate()
    {
        $model = new AuthItem(null);
        $model->type = 1;
        if($model->load(Yii::$app->getRequest()->post())){
            if($model->save()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['role-index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> current($model->getFirstErrors())]);
        }
        return $this->renderAjax('role-create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param  string $id
     * @return mixed
     */
    public function actionRoleUpdate($id)
    {
        $this->type=1;
        $model = $this->findModel($id);
        if($model->load(Yii::$app->getRequest()->post())){
            if($model->save()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '更新成功', 'url'=> Url::to(['role-index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> current($model->getFirstErrors())]);
        }

        return $this->renderAjax('role-update', [
            'model' => $model
        ]);
    }

    protected function findModel($id)
    {
        $auth = Yii::$app->getAuthManager();

        $item = $this->type === 1 ? $auth->getRole($id) : $auth->getPermission($id);
        if ($item) {
            return new AuthItem($item);
        } else {
            throw new NotFoundHttpException('页面不存在');
        }
    }
}