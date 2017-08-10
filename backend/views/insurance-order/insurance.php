<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/5 - 下午2:31
 *
 */

/* @var $model backend\models\InsuranceDetail  */
use backend\models\Member;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="row">
        <form class="form-horizontal" action="<?= Url::to(['update']) ?>" method="POST">
            <!-- begin col-12 -->
            <input type="hidden" name="order_id" value="<?=$model->order_id?>" />
            <!-- begin col-12 -->
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#orderr-info" data-toggle="tab">订单信息</a></li>
                    <li class=""><a href="#insurancer-info" data-toggle="tab">保险信息</a></li>
                    <li class=""><a href="#payr-info" data-toggle="tab">付款信息</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="orderr-info">
                    <table id="data-table-title" class="table">
                        <tr>
                            <td><b>投保车辆</b></td>
                            <td>
                                <select name="car" class="form-control">
                                    <?php foreach (\backend\models\Car::find()->where(['member_id'=>$model->member_id])->select('license_number,id')->all() as $v) {?>
                                        <option id="car_id" value="<?= $v->id ?>"><?= $v->license_number ?></option>
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>联系电话</b></td>
                            <td>
                                <input name= "phone" class="form-control input-lg" type="text" value="<?= $model->insurance->phone ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><b>审核结果</b></td>
                            <td>
                                <select name="check" class="form-control">
                                    <option value="未审核">未审核</option>
                                    <option value="审核成功">审核成功</option>
                                    <option value="审核失败">审核失败</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>报价单</b></td>
                            <td>这儿是图片</td>
                        </tr>
                        <tr>
                            <td><b>付款状态</b></td>
                            <td>
                                <select name="payment" class="form-control">
                                    <option value="已付款">已付款</option>
                                    <option value="未付款">未付款</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade" id="insurancer-info">
                    <table id="data-table-title" class="table">
                        <?php if ($model->insurance->sex) {?>
                        <tr>
                            <td>投保人</td>
                            <td><?= $model->insurance->user ?></td>
                        </tr>
                        <tr>
                            <td>性别</td>
                            <td><?= $model->insurance->sex ?></td>
                        </tr>
                        <tr>
                            <td>民族</td>
                            <td><?= $model->insurance->nation ?></td>
                        </tr>
                        <tr>
                            <td>身份证号</td>
                            <td><?= $model->insurance->licence ?></td>
                        </tr>
                        <tr>
                            <td>承保公司</td>
                            <td>
                                <select name="payment" class="form-control">
                                <?php foreach (\backend\models\InsuranceCompany::find()->select('name,id')->all() as $v) {?>
                                    <option id="company_id" value="<?= $v->id ?>"><?= $v->name ?></option>
                                <?php }?>
                                </select>
                            </td>
                        </tr>
                        <?php } else {?>
                        <tr>
                            <td>公司名称人</td>
                            <td><?= $model->insurance->user ?></td>

                        </tr>
                        <tr>
                            <td>组织机构代码</td>
                            <td><?= $model->insurance->licence ?></td>
                        </tr>
                        <tr>
                            <td>承保公司</td>
                            <td>
                                <select name="payment" class="form-control">
                                    <?php foreach (\backend\models\InsuranceCompany::find()->select('name,id')->all() as $v) {?>
                                        <option value="<?= $v->id ?>"><?= $v->name ?></option>
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td>保单保险</td>
                            <td><div style=" width: 80%; margin: 0 auto;">
                                    <h3 style="border-bottom: solid 1px #ccc; text-align: center;padding: 5px 0;">险种</h3>
                                    <?php foreach (\backend\models\Insurance::find()->select('id,title,deduction')->all() as $v) {?>
                                        <div style="display: flex; justify-content: space-between;padding: 5px 60px;">
                                            <h4><?= $v->title ?></h4>
                                            <input id="insuranceorderform-insurance" name="InsuranceOrderForm[insurance][<?= $v->id ?>][id]" type="checkbox" class="funCheckBox" data-InsuranceId="<?= $v->id ?>" value="<?= $v->id ?>">
                                        </div>
                                        <div id="<?= $v->id ?>" class="hidden" style="display: flex; justify-content: space-around;padding:0 60px;border-bottom: solid 1px #cccccc;">
                                            <?php if ($v->deduction ==1 ) {?>
                                                <div style="flex:1">
                                                    不计免赔<input name="InsuranceOrderForm[insurance][<?= $v->id ?>][deduction]" type="checkbox" class="funCheckBox" data-ele="<?= $v->deduction ?>" value="<?= $v->deduction ?>">
                                                </div>
                                            <?php }?>
                                            <div style="flex:2">
                                                <select name="InsuranceOrderForm[insurance][<?= $v->id ?>][element]" class="form-control" id="insuranceorderform-element">
                                                    <option value=""></option>
                                                    <?php foreach (\common\models\element::find()->where(['insurance_id'=>$v->id])->select('name,id')->all() as $vv) {?>
                                                        <option value="<?= $vv->id ?>"><?= $vv->name ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade" id="payr-info">
                    <table id="data-table-title" class="table">
                        <caption><h3>保单付款</h3></caption>
                        <tr>
                            <td><b>交强险</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>流水号</b></td>
                            <td>
                                <input name= "c_sn" class="form-control input-lg" type="text" value="<?= $model->compensatory->serial_number ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>保单号</b></td>
                            <td>
                                <input name= "c_wn" class="form-control input-lg" type="text" value="<?= $model->compensatory->warranty_number ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>价格</b></td>
                            <td>
                                <input name= "c_cost" class="form-control input-lg" type="text" value="<?= $model->compensatory->cost ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>车船税</b></td>
                            <td>
                                <input name= "c_tt" class="form-control input-lg" type="text" value="<?= $model->compensatory->travel_tax ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>生效时间</b></td>
                            <td>
                                <input name= "c_st" class="form-control input-lg" type="text" value="<?= \common\models\Helper::getTime($model->compensatory->start_at) ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>失效时间</b></td>
                            <td>
                                <input name= "c_en" class="form-control input-lg" type="text" value="<?= \common\models\Helper::getTime($model->compensatory->end_at) ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><b>商业险</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>流水号</b></td>
                            <td>
                                <input name= "b_sn" class="form-control input-lg" type="text" value="<?= $model->business->serial_number ?>" />
                            <td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>保单号</b></td>
                            <td>
                                <input name= "b_wn" class="form-control input-lg" type="text" value="<?= $model->business->warranty_number ?>" />
                            <td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>价格</b></td>
                            <td>
                                <input name= "b_cost" class="form-control input-lg" type="text" value="<?= $model->business->cost ?>" />
                            <td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>生效时间</b></td>
                            <td>
                                <input name= "b_st" class="form-control input-lg" type="text" value="<?= \common\models\Helper::getTime($model->business->start_at) ?>" />
                            <td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>失效时间</b></td>
                            <td>
                                <input name= "b_en" class="form-control input-lg" type="text" value="<?= \common\models\Helper::getTime($model->business->end_at) ?>" />
                            <td>
                        </tr>
                    </table>
                </div>

            </div>
            <!-- end col-6 -->
            <div style=" width: 1%; margin: 0 auto;">
                <button type="submit" class="btn btn-sm btn-success">修改</button>
            </div>
        </form>

    </div>

    <script>
//        $(function(){
//            if(document.getElementById("company_id").innerHTML = $model->insurance->company){
//                $('#company_id').addClass('selected');
//            }
//        });
        $('.funCheckBox').on('click',function(){
            var theId = $(this).attr('data-InsuranceId');
            if($('#'+theId).hasClass('hidden')){
                $('#'+theId).removeClass('hidden');
            }else{
                $('#'+theId).addClass('hidden');
            }
        });
    </script>
</div>
