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
 * @property integer $member_id
 * @property integer $user_id
 * @property string $news
 * @property integer $created_at
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at'], 'integer'],
            [['news'], 'string', 'max' => 255],
            [['model'], 'string', 'max' => 50]
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
            'news' => 'Notice',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getNews()
    {
        $id = 1;
        //TODO:id
        $news = $this::find()->select('news, created_at')->asArray()
            ->where(['user_id'=>$id, 'model'=>1])
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

}
