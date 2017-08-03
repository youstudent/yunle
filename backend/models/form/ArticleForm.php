<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午5:27
 *
 */

namespace backend\models\form;


use backend\models\Article;
use Yii;
use yii\base\Exception;

class ArticleForm extends Article
{
    public function scenarios()
    {
        return [
            'create' => ['title', 'author', 'content', 'status', 'column_id', 'views'],
            'update' => ['title', 'author', 'content', 'status', 'column_id', 'views'],
        ];
    }

    public function addArticle()
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

    public function updateArticle()
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
}