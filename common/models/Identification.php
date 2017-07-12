<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_identification".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $name
 * @property integer $status
 * @property string $licence
 * @property string $sex
 * @property string $birthday
 * @property string $start_at
 * @property string $end_at
 */
class Identification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_identification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['name', 'sex', 'birthday', 'start_at', 'end_at'], 'string', 'max' => 50],
            [['licence'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'status' => 'Status',
            'licence' => 'Licence',
            'sex' => 'Sex',
            'birthday' => 'Birthday',
            'start_at' => 'Start At',
            'end_at' => 'End At',
        ];
    }

    /*
     * 查看认证
     */
    public function view()
    {
        //TODO:id
        $user_id = 3;
        $type = User::findOne(['id'=>$user_id])->type;
        $identification = Identification::findOne(['user_id'=>$user_id]);
        if (!isset($identification) || empty($identification)) {
            $this->addError('message', '请认证');
            return false;
        }
        if ($type == 1) {
            $identification = Identification::findOne(['user_id'=>$user_id]);
        } else {
            $identification = Identification::find()->select('name, licence')->where(['user_id'=>$user_id])->asArray()->all();
        }

        return $identification;
    }

    /*
     * 认证
     */
    public function approve($data)
    {
        if (!isset($data['id']) || empty($data['id'])) {
            $user_id = 1;
            //TODO:id
        } else {
            $user_id = $data['id'];
        }
        if (empty($data['name']) || empty($data['licence'])) {
            $this->addError('message', '认证信息不能为空');
            return false;
        }
        $user = User::findOne(['id'=>$user_id]);
        $user->type = $data['type'];

        $this->load(['formName'=>$data],'formName');
        $this->user_id = $user_id;

        if ($this->save(false) && $user->save(false)) {
            return true;
        }
        return false;
    //TODO: 图片的添加
        //同步上传逻辑,处理图片
//        $upload = new Upload();
//        $img_id = $upload->uploadCarImgs(null);
//        if(!isset($img_id)){
//            $this->errorMsg = '图片获取失败';
//            return null;
//        }
//        if(!$this->save()){
//            $this->errorMsg = '保存失败';
//            return null;
//        }
//        //更新上传文件
//        CarImg::bindCar($this->id, $img_id);
//        return $this->id ? $this : null;
    }
}
