<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:36
 *
 */

namespace backend\models\form;

use backend\models\Member;
use Yii;
use yii\base\Exception;

class MemberForm extends Member
{

    public $service;
    public $salesman;

    public function attributeHints()
    {
        return [
          'realname' => '真实姓名',
        ];
    }

    public function addMember($form)
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
           if(!$memberForm->save()){
               throw new Exception("添加会员信息失败");
           }
           return $memberForm;
        });
    }

    public function updateMember($form)
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
            if(!$memberForm->save()){
                throw new Exception("更新会员信息失败");
            }
            return $memberForm;
        });
    }

}