<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午5:51
 *
 */

namespace backend\models\form;


use backend\models\Banner;
use backend\models\BannerImg;
use Yii;
use yii\base\Exception;

class BannerForm extends Banner
{
    public $img;
    public $img_id;

    public function rules()
    {
        return [
            [['name', 'status', 'action_value', 'img_id'], 'required', 'on' => ['create', 'update']],
            [['describe'], 'string'],
            [['status', 'created_at', 'updated_at', 'action_type', 'action_value', 'column_id'], 'integer'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['name', 'describe', 'status', 'created_at', 'updated_at', 'action_type', 'action_value', 'img_id', 'img'],
            'update' => ['name', 'describe', 'status', 'created_at', 'updated_at', 'action_type', 'action_value', 'img_id', 'img', 'delete_img_id'],
        ];
    }

    public function attributeHints()
    {
        return [
            'name' => '广告标题',
            'column_id' => '选中文章栏目，会出现可链接的文章',
            'action_type' => '选择点击广告跳转到对应的文章详情中',
            'img' => '仅可上传一张,选择图片后请确保已点击 <span style="color:red">上传</span>，再保存'
        ];
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'img' => '广告图片'
        ]); // TODO: Change the autogenerated stub
    }

    public function addBanner()
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
            //添加图片绑定
            foreach($this->img_id as $i){
                $model = BannerImg::findONe($i);
                $model->status = 1;
                $model->banner_id = $this->id;
                if(!$model->save()){
                    throw new Exception('增加图片绑定失败');
                }
            }

            return $this;
        });
    }

    public function updateBanner()
    {
        if(!$this->validate()){
            return false;
        }

        return Yii::$app->db->transaction(function(){
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception('error');
            }

            //获取一下以前绑定的图片
            $old_img = BannerImg::findOne(['banner_id'=> $this->id]);
            if($old_img->id != $this->img_id){
                //执行更换图片操作
                $old_img->status = 0;
                if(!$old_img->save()){
                    throw new Exception('取消绑定旧图片数据失败');
                };
                //更新图片绑定
                $ids = BannerImg::find()->where(['banner_id'=>$this->id, 'status'=> 1])->select('id')->column();
                $reduces = array_diff($ids, $this->img_id);
                foreach($reduces as $r){
                    $model = BannerImg::findONe($r);
                    $model->status = 0;
                    if(!$model->save()){
                        throw new Exception('解除图片绑定失败');
                    }
                }
                $incsrease = array_diff($this->img_id, $ids);
                foreach($incsrease as $i){
                    $model = BannerImg::findONe($i);
                    $model->status = 1;
                    $model->banner_id = $this->id;
                    if(!$model->save()){
                        throw new Exception('增加图片绑定失败');
                    }
                }


            }
            return $this;
        });
    }

    /**
     * @param $data
     * @param string $type
     * @return BannerImg|null
     */
    public function saveImg($data, $type = 'head')
    {
        $model = new BannerImg();
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

}