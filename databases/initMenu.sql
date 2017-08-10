#初始化MENU
TRUNCATE TABLE cdc_app_menu;
TRUNCATE TABLE cdc_menu;

#清空item表中的允许的路由
DELETE FROM cdc_auth_item WHERE type=2;