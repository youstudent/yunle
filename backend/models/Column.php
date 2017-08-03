<?php

namespace backend\models;

use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "{{%column}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 */
class Column extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%column}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['name', 'created_at', 'updated_at', 'description'],
            'update' => ['name', 'created_at', 'updated_at', 'description'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => '栏目名',
            'description' => '栏目描述',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function addColumn()
    {
        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
            $this->created_at = time();
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception('error');
            }
            return $this;
        });
    }

    public function updateColumn()
    {
        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception('error');
            }
            return $this;
        });
    }
}
