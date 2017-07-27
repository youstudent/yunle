<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 * @var $model backend\models\Article
 */

$this->title = '添加文章';
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="member-create">
    <h1>添加文章</h1>

    <div class="member-form">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                               data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                               data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                               data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                               data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">表单</h4>
                    </div>
                    <div class="panel-body panel-form">
                        <form class="form-horizontal form-bordered" data-parsley-validate="true" name="ArticleForm" id="ArticleForm" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="ArticlePhone"><?= $model->getAttributeLabel('title') ?> * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" id="ArticlePhone" name="ArticleForm[title]" value="<?= $model->title ?>" placeholder="标题" data-parsley-required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="ArticleAuthor"><?= $model->getAttributeLabel('author') ?> * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" id="ArticleAuthor" name="ArticleForm[author]" value="<?= $model->author ?>" placeholder="作者" data-parsley-required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="ArticleColumnId"><?= $model->getAttributeLabel('column_id') ?> * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" id="ArticleColumnId" name="ArticleForm[column_id]" value="<?= $model->column_id ?>" placeholder="栏目" data-parsley-required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="ArticleViews"><?= $model->getAttributeLabel('views') ?> * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" id="ArticleAuthor" name="ArticleForm[views]" value="<?= $model->views ?>" placeholder="浏览量" data-parsley-required="true" />
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="ArticleContent"><?= $model->getAttributeLabel('content') ?> * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" id="ArticleAuthor" name="ArticleForm[content]" value="<?= $model->content ?>" placeholder="正文" data-parsley-required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4"></label>
                                <div class="col-md-6 col-sm-6">
                                    <a class="btn btn-primary ajax-post" data-toggle="modal"
                                       data-form-id="ArticleForm" role="button">
                                        提交</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>


