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
 * This is the model class for table "cdc_banner".
 *
 * @property string $id
 * @property string $name
 * @property string $describe
 * @property integer $status
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['describe'], 'string'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 30],
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
            'describe' => 'Describe',
            'status' => 'Status',
        ];
    }


    /**
     * 获取轮播图
     * @return array
     */
    public function getBanner($form)
    {
        $query = (new \yii\db\Query());
        $banner = $query->select('name, describe, img_path')->from(Banner::tableName())
            ->leftJoin(BannerImg::tableName(), '{{%banner_img}}.banner_id = {{%banner}}.id')
            ->where(['status' => 1])
            ->all();
        foreach ($banner as &$v) {
            $v['img_path'] = $_SERVER['HTTP_HOST'].$v['img_path'];
        }
        if(!isset($banner) || empty($banner)){
            return null;
        }
        return $banner;
    }
}
