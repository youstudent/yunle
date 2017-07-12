<?php

namespace api\models;

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
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */

use Yii;

/**
 * This is the model class for table "cdc_column".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 */
class Column extends \yii\db\ActiveRecord
{
    public $column;
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getColumn($data)
    {
        $size = 2;
        $pagesize =($data['page']-1)* $size;
        $col = Column::find()->select('id')->asArray()->all();
        $colu = [];
        foreach ($col as $v) {
            $colu[] = $v['id'];
        }

        //TODO:首次加载已分类的全部待定
        if(empty($data['column']) || !isset($data['column'])){
            $data['column'] = $colu;
        }
        $query = (new \yii\db\Query());
        $column = $query->select('{{%column}}.id, name, title, content')->from(Column::tableName())
            ->leftJoin(Article::tableName(), '{{%article}}.column_id = {{%column}}.id')
            ->where(['{{%column}}.id'=>$data['column']])
            ->orderBy(['{{%article}}.created_at' => SORT_DESC])
            ->limit($size)
            ->offset($pagesize)
            ->all();
        if(!isset($column) || empty($column)){
            return null;
        }
        return $column;
    }

}
