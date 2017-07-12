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
 * This is the model class for table "cdc_article".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $brief
 * @property string $content
 * @property integer $status
 * @property integer $type
 * @property integer $column_id
 * @property integer $stick
 * @property string $created_at
 * @property string $updated_at
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
            [['status', 'type', 'column_id', 'stick'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'author', 'brief'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'brief' => 'Brief',
            'content' => 'Content',
            'status' => 'Status',
            'type' => 'Type',
            'column_id' => 'Column ID',
            'stick' => 'Stick',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
