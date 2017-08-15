<?php

namespace backend\models;

use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "{{%driving_license}}".
 *
 * @property integer $id
 * @property integer $member_id
 * @property string $name
 * @property string $sex
 * @property string $nationality
 * @property string $papers
 * @property string $birthday
 * @property string $certificate_at
 * @property string $permit
 * @property string $start_at
 * @property string $end_at
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class DrivingLicense extends \yii\db\ActiveRecord
{
    public $img;
    public $imgs;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%driving_license}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'sex', 'nationality', 'papers', 'birthday', 'certificate_at', 'permit', 'start_at', 'end_at'], 'string', 'max' => 50],
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['name', 'sex', 'nationality', 'papers', 'birthday', 'certificate_at', 'permit', 'start_at', 'end_at'],
            'update' => ['name', 'sex', 'nationality', 'papers', 'birthday', 'certificate_at', 'permit', 'start_at', 'end_at'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => '用户id',
            'name' => '姓名',
            'sex' => '性别',
            'nationality' => '国籍',
            'papers' => '证件号',
            'birthday' => '出生日期',
            'certificate_at' => '领证日期',
            'permit' => '准驾车型',
            'start_at' => '生效时间',
            'end_at' => '失效时间',
            'status' => '1:正常 0:待审核',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
    public function addDrivingLicense()
    {
        if(!$this->validate()){
            return false;
        }

        $this->imgs = explode(',', trim($this->imgs,','));
        if(count($this->imgs) == 0){
            $this->addError('imgs', '请上传附件');
            return false;
        }

        return Yii::$app->db->transaction(function(){
            $this->created_at = time();
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception('error');
            }

            //更新图片
            //设置图片绑定
            $models =  DrivingImg::find()->where(['id'=> $this->imgs])->all();
            foreach ($models as $model){
                $model->driver_id = $this->id;
                $model->status = 1;
                if(!$model->save()){
                    throw new Exception("绑定图片信息失败");
                }
            }

            return $this;
        });
    }

    public function updateDrivingLicense()
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

    /**
     * 上传土图片要用到的
     * @param $data
     * @param string $type
     * @return ServiceImg|null
     */
    public function saveImg($data, $type = 'head')
    {
        $model = new DrivingImg();
        $model->img_path = $data['files'][0]['url'];
        $model->thumb = $data['files'][0]['thumbnailUrl'];
        $model->status = 0;
        $model->size = $data['files'][0]['size'];
        $model->img = $data['files'][0]['name'];
        if(!$model->save()){
            return null;
        }
        return $model;
    }

    public static function getOne($id)
    {
        $model = DrivingLicense::findOne($id);

        $imgs = DrivingImg::find()->where(['driver_id'=>$id, 'status'=> 1])->select('id')->column();
        $model->imgs = implode(",",$imgs);

        return $model;
    }
}
