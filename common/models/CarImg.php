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
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */

use Yii;

/**
 * This is the model class for table "cdc_car_img".
 *
 * @property integer $id
 * @property integer $car_id
 * @property string $img_path
 */
class CarImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%car_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id'], 'integer'],
            [['img_path'], 'required'],
            [['img_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'img_path' => 'Img Path',
        ];
    }

    public static function bindCar($car_id, $ids, $is_reaplace = false)
    {
        $ids = trim($ids, ',');
        if(strpos($ids, ',') === false){
            $ids  =(int)$ids;
            //var_dump($ids);exit;
            // $ids[] = $ids;
        }else{
            $ids = explode(',', $ids);
        }
        if($is_reaplace){
            //先将以前的取消掉
            Yii::$app->db->createCommand()->update(self::tableName(), ['car_id'=>0], ['car_id'=>$car_id])->execute();
        }
        $model = CarImg::findOne(['id'=>$ids]);
        $model->car_id = $car_id;
        $model->save();

        return true;
    }
}
