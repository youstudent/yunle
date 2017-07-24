<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/15 - 上午11:26
 *
 */

namespace backend\models\form;

use backend\models\Adminuser;
use backend\models\Service;
use backend\models\ServiceImg;
use Yii;
use yii\db\Exception;

class ServiceForm  extends Service
{
    public $username;
    public $password;

    public $head;
    public $attachment;
    public $saleman_id;

    /**
     * 添加服务商
     * @param $form
     * @return bool|mixed
     */
    public function addService($form)
    {
        if(!$this->load($form, '')){
            return false;
        }

        //添加一个管理员用户
        $model = &$this;
        return Yii::$app->db->transaction(function() use ($model, $form)
        {
            $adminuser = new Adminuser();
            if(!$adminuser->addServiceUser($form)){
                $model->addError('username', '用户名不可用');
                throw new Exception("添加会员信息失败");
            }

            $model->created_at = time();
            $model->updated_at = time();
            if(!$model->save()){
                throw new Exception("添加会员信息失败");
            }

            //TODO::添加一个服务商的角色并绑定账号

            //处理绑定关系
            if($this->head){
                $serviceImg = ServiceImg::findOne($this->head);
                $serviceImg->service_id = $model->id;
                $serviceImg->type = 1;
                $serviceImg->status = 1;
                if(!$serviceImg->save()){
                    throw new Exception("添加会员信息失败");
                }
            }

            if(count($this->attachment)){
                $serviceImgs = ServiceImg::find()->where(['id'=> $this->attachment])->all();
                foreach($serviceImgs as $serviceImg){
                    $serviceImg->service_id = $model->id;
                    $serviceImg->status = 1;
                    $serviceImg->save();
                    if(!$serviceImg->save()){
                        throw new Exception("添加会员信息失败");
                    }
                }
            }
            return $model;
        });
    }

    /**
     * 更新服务商
     * @param $form
     * @return bool|mixed
     */
    public function updateService($form)
    {
        if(!$this->load($form, '')){
            return false;
        }

        $model = &$this;
        //编辑用户的信息
        return Yii::$app->db->transaction(function() use ($model, $form)
        {
            $adminuser = new Adminuser();
            if(!$adminuser->updateServiceUser($form)){
                throw new Exception("添加会员信息失败");
            }
            //处理图片变更, 对比新旧，删除旧的部分

        });
    }
}