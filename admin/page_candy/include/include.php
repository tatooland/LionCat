<?php
require_once("core/object.php");
require_once("core/registry.php");
require_once("core/loader.php");
require_once("core/action.php");
require_once("core/request.php");
require_once("core/response.php");
require_once("core/controller.php");
require_once("core/front.php");
require_once("core/model.php");
require_once("core/form.php");
require_once("core/db/mysqli.php");
require_once("core/db.php");
require_once("core/orm.php");
require_once("library/WXController.php");
require_once("core/wx.php");
require_once("library/wx/jssdk.php");
require_once("page_candy/include/api.php");


define("BOOT_DIR","/applications/xampp/xamppfiles/htdocs/");
define("WEBSITE","wwns");

define("DIR_APPLICATION",BOOT_DIR.WEBSITE."/app/");
define("DIR_VIEW",BOOT_DIR.WEBSITE."/app/view/");
define("DIR_MODEL",BOOT_DIR.WEBSITE."/app/model/");
define("DIR_CONTROLLER",BOOT_DIR.WEBSITE."/app/controller/");
define('DIR_IMAGE',BOOT_DIR.WEBSITE."/wx_assets/img/");
define("HTTP_SERVER","http://app.yn.189.cn");
define('SERVER_DIR_IMAGE',HTTP_SERVER."/".WEBSITE."/wx_assets/img/");


define('DB_DRIVER', 'mysqli');#��ǰ����ݿ�ʹ��mysqli,��ݾ��尲װ����ݿ����ѡ��mpdo mssql postgre
define('DB_HOSTNAME', 'localhost');#��ݿ����ڵ�ַ����ǰΪ���������ĳ����������ݿ�����������滻���Ӧ�ĵ�ַ ע�ⲻ�ü�http://
define('DB_USERNAME', 'root');#��ݿ��û���
define('DB_PASSWORD', '');#��ݿ����룬��ǰΪ��
define('DB_DATABASE', 'wwns');#��ǰ��ݿ���
define('DB_PREFIX', 'wn_');#�����벻Ҫ�޸ģ�����

//΢�Ų��������
define('APPID','wx4355684f04074385');
define('APPSECRET','767ed7b047174899a44f2ffb38a59c04');
define('WXTOKENFILE',BOOT_DIR.WEBSITE.'/wx_assets/wx_access_token.dat');
define('WXTICKETFILE',BOOT_DIR.WEBSITE.'/wx_assets/wx_ticket.dat');
define('WXAUTHORTOKENFILE',BOOT_DIR.WEBSITE.'/wx_assets/wx_author_access_token.dat');
define('WXGETTOKENURL',"https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET);
define('WXGETTICKETURL',"https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%ACCESS_TOKEN%&type=jsapi");
define('WXAUTHORURL',"https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=%REDIRECT_URI%&response_type=code&scope=%SCOPE%&state=%STATE%#wechat_redirect");
define('WXAUTHORTOKENURL',"https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=%CODE%&grant_type=authorization_code");
define('SITE_MODEL','develop');//publish
define('WXMEDIATOKEN',"https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET);
define('WXFILEMEDIA',"http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=%ACCESSTOKEN%&media_id=%MEDIAID%");
/*
define("DIR_APPLICATION","/applications/xampp/htdocs/mini/app/");
define("DIR_VIEW","/applications/xampp/htdocs/mini/app/view/");
define("DIR_MODEL","/applications/xampp/htdocs/mini/app/model/");
define("DIR_CONTROLLER","/applications/xampp/htdocs/mini/app/controller/");
*/