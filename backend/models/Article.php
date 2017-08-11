<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $content
 * @property integer $status
 * @property integer $column_id
 * @property integer $views
 * @property integer $created_at
 * @property integer $updated_at
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['status', 'column_id', 'views', 'created_at', 'updated_at'], 'integer'],
            [['title', 'author'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '文章题目',
            'author' => '文章作者',
            'content' => '文章内容',
            'status' => '文章状态 1 正常  0 禁用',
            'column_id' => '栏目',
            'views' => '浏览量',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
