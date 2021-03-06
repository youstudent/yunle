<?php

use backend\models\Member;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */

$this->title = '平台设置';
$this->params['breadcrumbs'][] = $this->title;

\pd\coloradmin\web\plugins\DaterangePickerAsset::register($this);

$this->registerJs(<<<JS

$('#daterangepicker').daterangepicker({
    "showDropdowns": true,
    "timePicker": true,
    "ranges": {
           '今日': [moment().startOf('day'), moment()],
            '昨日': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days').endOf('day')],
            '最近7日': [moment().subtract(6, 'days'), moment()],
            '最近30日': [moment().subtract(29, 'days'), moment()],
            '本月': [moment().startOf("month"),moment().endOf("month")],
            '上个月': [moment().subtract(1,"month").startOf("month"),moment().subtract(1,"month").endOf("month")]
    },
    "autoUpdateInput": false,
    "locale": {
        "format": "YYYY-MM-DD HH:mm",
        "separator": " - ",
        "applyLabel": "确定",
        "cancelLabel": "清空",
        "fromLabel": "从",
        "toLabel": "到",
        "customRangeLabel": "自定义",
        "weekLabel": "周",
        "daysOfWeek": [
            "日",
            "一",
            "二",
            "三",
            "四",
            "五",
            "六"
        ],
        "monthNames": [
            "一月",
            "二月",
            "三月",
            "四月",
            "五月",
            "六月",
            "七月",
            "八月",
            "九月",
            "十月",
            "十一月",
            "十二月"
        ],
        "firstDay": 1
    },
    "linkedCalendars": false,
    "alwaysShowCalendars": true,
    "startDate": "2017-07-19",
});
$("#daterangepicker").on('apply.daterangepicker', function(ev, picker) {
  $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm') + ' + ' + picker.endDate.format('YYYY-MM-DD HH:mm'));
});
$("#daterangepicker").on('cancel.daterangepicker', function(ev, picker) {
  $(this).val('');
});
JS
);
?>
<div class="system-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-12">
            <?= Html::a('添加设置项', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <p></p>

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <?= \pd\coloradmin\widgets\Alert::widget() ?>
        <form class="form-horizontal" method="post" action="" id="SystemSettingForm">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#base-setting" data-toggle="tab">基础设置</a></li>
                        <li class=""><a href="#测试" data-toggle="tab">短信设置</a></li>
                        <li class=""><a href="#api-client-push" data-toggle="tab">客户端推送设置</a></li>
                        <li class=""><a href="#api-service-push" data-toggle="tab">服务端推送设置</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="base-setting">
                            <?php
                            //组装收件人配置
                            $delivery_address = isset($setting['delivery_address']) ? ArrayHelper::getValue($setting['delivery_address'], 'value', '||') : '||';
                            $delivery_address = explode('|', $delivery_address);
                            ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">收件人地址</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="delivery_address[0]" value="<?= $delivery_address[0] ?>" placeholder="收件人地址"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">收件人姓名</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="delivery_address[1]" value="<?= $delivery_address[1] ?>" placeholder="收件人姓名"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">收件人电话</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="delivery_address[2]" value="<?= $delivery_address[2] ?>" placeholder="收件人电话"/>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="测试">
                            <div class="form-group">
                                <label class="col-md-3 control-label">accessKeyId</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="ali_sms_access_key_id" value="<?= ArrayHelper::getValue($setting['ali_sms_access_key_id'], 'value', '') ?>" placeholder="阿里大于accessKeyId"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">accessKeySecret</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="ali_sms_access_key_secret" value="<?= ArrayHelper::getValue($setting['ali_sms_access_key_secret'], 'value', '') ?>" placeholder="阿里大于accessKeySecret"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">短信模板Code</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="ali_sms_template_code" value="<?= ArrayHelper::getValue($setting['ali_sms_template_code'], 'value', '') ?>" placeholder="阿里大于短信模板Code"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">短信签名</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="ali_sms_template_sign"  placeholder="短信签名" rows="5"><?= ArrayHelper::getValue($setting['ali_sms_template_sign'], 'value', '') ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="api-client-push">
                            <div class="form-group">
                                <label class="col-md-3 control-label">AppKey</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="jpush_member_appkey" value="<?= ArrayHelper::getValue($setting['jpush_member_appkey'], 'value', '') ?>" placeholder="极光推送"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Master Secret</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="jpush_member_master_secret" value="<?= ArrayHelper::getValue($setting['jpush_member_master_secret'], 'value', '') ?>" placeholder="极光推送" />
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="api-service-push">
                            <div class="form-group">
                                <label class="col-md-3 control-label">AppKey</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="jpush_service_appkey" value="<?= ArrayHelper::getValue($setting['jpush_service_appkey'], 'value', '') ?>" placeholder="极光推送"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Master Secret</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="jpush_service_master_secret" value="<?= ArrayHelper::getValue($setting['jpush_service_master_secret'], 'value', '') ?>" placeholder="极光推送" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button type="button" class="btn btn-primary ajax-post" data-toggle="modal"
                                    data-form-id="SystemSettingForm">保存</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end panel -->
</div>





