TRUNCATE TABLE cdc_act_detail;
TRUNCATE TABLE cdc_act_img;
TRUNCATE TABLE cdc_act_insurance;
TRUNCATE TABLE cdc_adminuser_img;
TRUNCATE TABLE cdc_adminuser_tag;
TRUNCATE TABLE cdc_article;
TRUNCATE TABLE cdc_auth_assignment;
TRUNCATE TABLE cdc_banner;
TRUNCATE TABLE cdc_banner_img;
TRUNCATE TABLE cdc_business_detail;
TRUNCATE TABLE cdc_car;
TRUNCATE TABLE cdc_car_img;
TRUNCATE TABLE cdc_column;
TRUNCATE TABLE cdc_compensatory_detail;
TRUNCATE TABLE cdc_driving_img;
TRUNCATE TABLE cdc_driving_license;
TRUNCATE TABLE cdc_element;
TRUNCATE TABLE cdc_identification;
TRUNCATE TABLE cdc_identification_img;
TRUNCATE TABLE cdc_insurance;
TRUNCATE TABLE cdc_insurance_actimg;
TRUNCATE TABLE cdc_insurance_company;
TRUNCATE TABLE cdc_insurance_detail;
TRUNCATE TABLE cdc_insurance_element;
TRUNCATE TABLE cdc_insurance_order;
TRUNCATE TABLE cdc_invitation_code;
TRUNCATE TABLE cdc_mail;
TRUNCATE TABLE cdc_member;
TRUNCATE TABLE cdc_member_code;
TRUNCATE TABLE cdc_member_img;
TRUNCATE TABLE cdc_member_tag;
TRUNCATE TABLE cdc_message_code;
TRUNCATE TABLE cdc_notice;
TRUNCATE TABLE cdc_order;
TRUNCATE TABLE cdc_order_detail;
TRUNCATE TABLE cdc_service;
TRUNCATE TABLE cdc_service_img;
TRUNCATE TABLE cdc_service_tag;
TRUNCATE TABLE cdc_service_user;
TRUNCATE TABLE cdc_status;
TRUNCATE TABLE cdc_tag;
TRUNCATE TABLE cdc_user;
TRUNCATE TABLE cdc_user_img;
TRUNCATE TABLE cdc_user_tag;
TRUNCATE TABLE cdc_warranty;

#特殊处理的
DELETE FROM cdc_adminuser WHERE id>1;
ALTER TABLE cdc_adminuser AUTO_INCREMENT=2;


TRUNCATE TABLE cdc_app_menu_without
TRUNCATE TABLE cdc_auth_item
TRUNCATE TABLE cdc_auth_item_child
TRUNCATE TABLE cdc_auth_rule
TRUNCATE TABLE cdc_menu
TRUNCATE TABLE cdc_menu_group

#TRUNCATE TABLE cdc_app_menu
#cdc_setting