<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/12 - 下午4:21
 *
 */

namespace backend\controllers;

use pd\admin\controllers\AssignmentController as BaseAssignmentController;

class AssignmentController extends BaseAssignmentController
{
    public function actionAccountModifyRole($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
            'idField' => $this->idField,
            'usernameField' => $this->usernameField,
            'fullnameField' => $this->fullnameField,
        ]);
    }
}