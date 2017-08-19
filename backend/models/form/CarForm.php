<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/10 - 下午2:56
 *
 */

namespace backend\models\form;


use backend\models\Car;

class CarForm extends Car
{
    public $car_imgs;
    public $car_img;


    public function scenarios()
    {
        return [
            'create' => ['member_id', 'license_number', 'type', 'owner', 'nature', 'brand_num', 'discern_num', 'motor_num', 'load_num', 'sign_at', 'certificate_at', 'stick', 'status'],
            'update' => ['member_id', 'license_number', 'type', 'owner', 'nature', 'brand_num', 'discern_num', 'motor_num', 'load_num', 'sign_at', 'certificate_at', 'stick', 'status'],
        ];
    }
}