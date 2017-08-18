<?php

namespace common\models;

/*
     *
      ******       ******
    **********   **********
  ************* *************
 *****************************
 *****************************
 *****************************
  ***************************
    ***********************
      ******拒绝扯淡*******
        ****加强撕逼*****
          *****加*****
            ***油***
              ***
               *
     */

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "cdc_insurance".
 *
 * @property string $id
 * @property string $title
 * @property integer $type
 * @property string $cost
 * @property integer $deduction
 * @property integer $created_at
 * @property integer $updated_at
 */
class Insurance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'cost', 'deduction', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['title'], 'unique', 'on' => ['update']],
            [['title'], 'validateUpdateTitle', 'on' => ['update']]
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['title', 'type', 'cost', 'deduction'],
            'update' => ['title', 'type', 'cost', 'deduction'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '名称',
            'type' => '类型',
            'cost' => '估价',
            'deduction' => '免赔',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function addInsurance()
    {
        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
           $this->created_at = time();
           $this->updated_at = time();
           if(!$this->save()){
               throw new Exception("添加失败");
           }
           $element = new Element();
           $element->insurance_id = $this->id;
           $element->name = '标准';
           $element->created_at = time();
           $element->save(false);
           return $this;
        });
    }

    public function updateInsurance()
    {
        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception("添加失败");
            }
            return $this;
        });
    }


    public function validateUpdateTitle($attribute, $params)
    {
        if(!$this->hasErrors()){
            if($this->title != $this->getOldAttribute('title')){
                $count = Insurance::find()->where(['title' => $this->title ])->count();
                if($count > 0){
                    $this->addError($attribute, '险种不能重复');
                }
            }
        }
    }
}
