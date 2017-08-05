<?php

namespace backend\models;

use Yii;

use yii\data\ActiveDataProvider;
use yii\db\Exception;


/**
 * This is the model class for table "{{%insurance_company}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $brief
 * @property integer $created_at
 */
class InsuranceCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance_company}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['name','brief'],'required'],
            [['created_at','id'], 'integer'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'brief'], 'string', 'max' => 255],
            [['name'], 'unique', 'on'=> 'create'],
            [['name'], 'validateUpdateName', 'on' => 'update']
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['name', 'brief', 'status'],
            'update' => ['name', 'brief', 'status'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '保险商名',
            'brief' => '介绍',
            'created_at' => '创建时间',
            'status' => '状态',
        ];
    }
    
    
    /**
     *
     * 获取保险商列表
     * @return ActiveDataProvider
     */
    public function getList(){
      $query = InsuranceCompany::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
      return $dataProvider;
    }
    
    
    /**
     *  添加服务商
     */
    public function addInsuranceCompany(){
        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
            $this->created_at=time();
            if(!$this->save()){
                throw new Exception('添加失败');
            }
            return $this;
        });

    }


    /**
     *  添加服务商
     */
    public function updateInsuranceCompany(){
        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
            $this->created_at=time();
            if(!$this->save()){
                throw new Exception('保存失败');
            }
            return $this;
        });

    }

    public function validateUpdateName($attribute, $params)
    {
        if(!$this->hasErrors()){
            if($this->name != $this->getOldAttribute('name')){
                $count = InsuranceCompany::find()->where(['name' => $this->name ])->count();
                if($count > 0){
                    $this->addError($attribute, '保险商名不能重复');
                }
            }
        }
    }

}
