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
    public function addArticle($form)
    {
        if(!$this->load($form)){
            return false;
        }

        if(!$this->validate()){
            return false;
        }
        $articleModel = &$this;
        return Yii::$app->db->transaction(function() use($articleModel){
            $articleModel->created_at = time();
            $articleModel->updated_at = time();
            if(!$articleModel->save()){
                throw new Exception('error');
            }
            return $articleModel;
        });
    }
}