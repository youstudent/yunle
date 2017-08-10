#初始化系统
TRUNCATE TABLE cdc_act_detail;
TRUNCATE TABLE cdc_act_img;
TRUNCATE TABLE cdc_act_insurance;
TRUNCATE TABLE cdc_adminuser;
TRUNCATE TABLE cdc_adminuser_img;
TRUNCATE TABLE cdc_adminuser_tag;
TRUNCATE TABLE cdc_article;
TRUNCATE TABLE cdc_auth_assignment;
TRUNCATE TABLE cdc_auth_item;
TRUNCATE TABLE cdc_app_menu;
TRUNCATE TABLE cdc_app_menu;
TRUNCATE TABLE cdc_app_menu;
TRUNCATE TABLE cdc_app_menu;

#清空item表中的允许的路由
DELETE FROM cdc_auth_item WHERE type=2;