<?php

namespace backend\models;

use common\models\IdentificationImg;
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
 * @property string $img
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Identification extends \yii\db\ActiveRecord
{
    public $img;
    public $img_id;

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
            [['img_id'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['member_id', 'name', 'nation', 'sex', 'birthday', 'start_at', 'end_at', 'licence', 'img_id'],
            'update' => ['member_id', 'name', 'nation', 'sex', 'birthday', 'start_at', 'end_at', 'licence', 'img_id'],
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
            'name' => '姓名/机构名',
            'nation' => '名族',
            'sex' => '性别',
            'birthday' => '出生年月',
            'licence' => '证件号',
            'start_at' => '身份证生效时间',
            'end_at' => '身份证失效时间',
            'status' => '认证状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'img' => '身份证附件',
        ];
    }
    public function addIdentification()
    {
        if(!$this->validate()){
            return false;
        }

        $this->imgs = explode(',', trim($this->imgs,','));
        if(count($this->imgs) < 2){
            $this->addError('imgs', '请上传2张附件');
            return false;
        }

        return Yii::$app->db->transaction(function(){
            $this->created_at = time();
            $this->updated_at = time();
            if(!$this->save(false)){
                throw new Exception('error');
            }

            foreach($this->img_id as $i){
                $m = IdentificationImg::findOne($i);
                $m->ident_id = $this->id;
                $m->status = 1;
                if(!$m->save()){
                    throw new Exception("绑定图片信息失败");
                }
            }

            return $this;
        });

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

            //变更图片的绑定
            $old_img = IdentificationImg::find()->where(['ident_id'=>$this->id, 'status'=> 1])->select('id')->column();
            $reduces_head = array_diff($old_img, $this->img_id);
            foreach($reduces_head as $r){
                $model = IdentificationImg::findOne($r);
                $model->status = 0;
                if(!$model->save()){
                    throw new Exception('解除图片绑定失败');
                }
            }

            $incsrease_head = array_diff($this->img_id, $old_img);
            foreach($incsrease_head as $i){
                $model = IdentificationImg::findOne($i);
                $model->status = 1;
                $model->ident_id = $this->id;
                if(!$model->save()){
                    throw new Exception('增加图片绑定失败');
                }
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
        $model = new IdentificationImg();
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
        $model = Identification::findOne($id);

        return $model;
    }

    public  function getPic()
    {
        return $this->hasMany(IdentificationImg::className(), ['ident_id'=> 'id'])->where(['status'=> 1]);
    }

    public function getPicImg()
    {
        $arr = [];
        foreach($this->pic as $i){
            $arr[] = '<img src="'.Yii::$app->params['img_domain']. $i->thumb.'" />';
        }
        return $arr;
    }

}
