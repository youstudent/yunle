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

/**
 * This is the model class for table "cdc_news".
 *
 * @property integer $id
 * @property string $model
 * @property integer $user_id
 * @property string $content
 * @property integer $created_at
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%notice}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at'], 'integer'],
            [['model'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'user_id' => 'User ID',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }

    public function getNews($model, $user_id)
    {
        $news = $this::find()->select('content, created_at')->asArray()
            ->where(['user_id'=>$user_id, 'model'=>$model])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        if (!isset($news) || empty($news)) {
            return null;
        }
        foreach ($news as &$v) {
            $v['created_at'] = date('Y/m/d H:i', $v['created_at']);
        }
        return $news;
    }

    /*
     * 节点消息添加
     */
    public static function userNews($model, $user_id, $news)
    {
        $new = new Notice();
        $new->model = $model;
        $new->user_id = $user_id;
        $new->content = $news;
        $new->created_at = time();

        if ($new->save(false)) {
            return true;
        }

        return false;
    }
}
