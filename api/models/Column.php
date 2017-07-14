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
        if (!isset($data) || empty($data)) {
            $page = 0;
            $column = Column::find()->select('id, name')->asArray()->all();

            foreach ($column as $k => &$v) {
                $v['articles'] = Article::find()->select('id, title, brief, views')->asArray()
                    ->where(['column_id'=>$v['id'], 'status'=>1])
                    ->limit($size)
                    ->offset($page)
                    ->all();
                foreach ($v['articles'] as &$vv) {
                    $vv['img'] = $this->getImg(Article::findOne(['id'=>$vv['id']])->content);
                }
                if ($k == 0) {
                    $v['flag'] = true;
                } else {
                    $v['flag'] = false;
                }
                $v['page'] = 1;
            }
        } else {
            $page =($data['page']-1)* $size;
            $articles = Article::find()->select('id, title, brief, views')->asArray()
                ->where(['column_id'=>$data['column'], 'status'=>1])
                ->limit($size)
                ->offset($page)
                ->all();
            foreach ($articles as &$v) {
                $v['img'] = $this->getImg(Article::findOne(['id'=>$v['id']])->content);
            }
            $total = Article::find()->where(['column_id'=>$data['column'], 'status'=>1])->count();
            $totalPage = ceil($total/$size);
            $column = ['articles' => $articles, 'page' => $data['page'], 'totalPage' => $totalPage];
        }

        if(!isset($column) || empty($column)){
            return null;
        }
        return $column;
    }
    public function getImg($content){
        $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";//正则
        preg_match_all($pattern,$content,$match);//匹配图片
        return $match[1];//返回所有图片的路径
    }

}
