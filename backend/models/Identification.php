<?php

namespace backend\models;

use common\models\IdentificationImg;
use common\models\Upload;
use Yii;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%identification}}".
 *
 * @property integer $id
 * @property integer $member_id
 * @property string $name
 * @property string $nation
 * @property string $sex
 * @property string $birthday
 * @property string $licence
 * @property string $start_at
 * @property string $end_at
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Identification extends \yii\db\ActiveRecord
{
    public $img;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%identification}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id'], 'required'],
            [['member_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'nation', 'sex', 'birthday', 'start_at', 'end_at'], 'string', 'max' => 50],
            [['licence'], 'string', 'max' => 255],
            [['img'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'img' => '身份证图片',
            'member_id' => '所属用户id',
            'name' => '公司名称或姓名',
            'nation' => '名族',
            'sex' => '性别',
            'birthday' => '出生年月',
            'licence' => '组织机构代码或身份证号',
            'start_at' => '身份证生效时间',
            'end_at' => '身份证失效时间',
            'status' => '是否认证 0:没有 1:已认证',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
    public function addIdentification()
    {
        if(!$this->validate()){
            return false;
        }
        $this->created_at = time();
        $this->updated_at = time();
        $this->status = 1;
        if(!$this->save(false)){
            return false;
        }
        return true;
    }

    public function updateIdentification()
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

//    public function saveImg($data)
//    {
//
//    }
}
