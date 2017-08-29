<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:36
 *
 */

namespace backend\models\form;
use backend\models\SystemNotice;
use Yii;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

class SystemNoticeForm extends SystemNotice
{
    public static $option=[2=>'服务商',3=>'代理商'];
    
    public function scenarios()
    {
        return [
            'create' => ['content', 'notice_people', 'send_out_people'],
            'update' => ['content', 'notice_people', 'send_out_people'],
        ];
    }

    public function attributes()
    {
        return ArrayHelper::merge(parent::attributes(),[]);
    }
    
    /**
     * 添加系统通知
     * @return bool|mixed
     */
    public function addNotice()
    {
        if(!$this->validate()){
            return false;
        }
        $this->created_at = time();
        $this->notice_people = json_encode($this->notice_people);
        return  $this->save();
        /*return Yii::$app->db->transaction(function(){
           $this->created_at = time();
           $this->notice_people = json_encode($this->notice_people);
           if(!$this->save()){
               throw new Exception("发送系统通知失败");
           }
           return $this;
        });*/
    }
    
    
    /**
     * 更新系统通知
     * @return mixed
     */
    public function updateNotice()
    {
        return Yii::$app->db->transaction(function(){
            $this->notice_people = json_encode($this->notice_people);
            if(!$this->save()){
                throw new Exception("更新系统通知失败");
            }
            return $this;
        });
    }
}