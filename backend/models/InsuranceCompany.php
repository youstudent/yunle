<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

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
            [['name', 'brief'], 'string', 'max' => 255],
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
    public function add($data){
        if(!$this->load($data) || !$this->validate()){
            return false;
        }
        $this->created_at=time();
        return $this->save();
    }
    
    
    /**
     *  修改
     */
    public function editCompany($data){
        if(!$this->load($data) || !$this->validate()){
            return false;
        }
        $this->created_at=time();
        var_dump($this->save());
        
    }
    
    
    
}
