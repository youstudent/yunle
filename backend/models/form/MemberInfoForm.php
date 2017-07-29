<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/28 - 下午7:10
 *
 */

namespace backend\models\form;


use backend\models\Member;
use common\models\Identification;
use Yii;
use yii\base\Exception;

class MemberInfoForm extends Member
{
    public function getOne($id)
    {

    }

    public function saveMemberInfo($form)
    {
        if(!$this->load($form) || !$this->memberInfo->load($form)){
            return null;
        }
        if(!$this->validate()){
            return null;
        }
        $memberModel = &$this;
        return Yii::$app->db->transaction(function() use($memberModel){
            if( !($this->save() && $this->memberInfo->save())){
                throw new Exception('保存会员信息失败');
            }
            return true;
        });
    }


}