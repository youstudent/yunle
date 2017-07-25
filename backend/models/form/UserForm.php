<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午3:51
 *
 */

namespace backend\models\form;


use backend\models\User;
use Yii;
use yii\base\Exception;

class UserForm extends User
{
    public function addUser($form)
    {
        if(!$this->load($form)){
            return false;
        }
        if(!$this->validate()){
            return false;
        }

        $memberForm = $this;
        return Yii::$app->db->transaction(function() use($memberForm){
            $memberForm->created_at = time();
            $memberForm->updated_at = time();
            $memberForm->password = Yii::$app->security->generatePasswordHash($memberForm->password);
            if(!$memberForm->save()){
                throw new Exception("添加会员信息失败");
            }
            return $memberForm;
        });
    }

    public function updateUser($form)
    {
        if(!$this->load($form)){
            return false;
        }
        if(!$this->validate()){
            return false;
        }

        $memberForm = $this;
        return Yii::$app->db->transaction(function() use($memberForm){
            $memberForm->updated_at = time();

            if($memberForm->password){
                $memberForm->password = Yii::$app->security->generatePasswordHash($memberForm->password);
            }
            if(!$memberForm->save()){
                throw new Exception("更新会员信息失败");
            }
            return $memberForm;
        });
    }
}