<?php

namespace service\models;

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
        return 'cdc_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'user_id', 'created_at'], 'integer'],
            [['news'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'user_id' => 'User ID',
            'news' => 'Notice',
            'created_at' => 'Created At',
        ];
    }

    public function getNews()
    {
        $id = 1;
        //TODO:id
        $news = $this::find()->select('news, created_at')->asArray()
            ->where(['user_id'=>$id, 'type'=>2])
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
