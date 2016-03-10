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
require_once("library/Lunar.php");


define("BOOT_DIR","webServerRootPath");
define("WEBSITE","yourWebsiteName");

define("DIR_APPLICATION",BOOT_DIR.WEBSITE."/app/");
define("DIR_VIEW",BOOT_DIR.WEBSITE."/app/view/");
define("DIR_MODEL",BOOT_DIR.WEBSITE."/app/model/");
define("DIR_CONTROLLER",BOOT_DIR.WEBSITE."/app/controller/");
define('DIR_IMAGE',BOOT_DIR.WEBSITE."/wx_assets/img/");
define("HTTP_SERVER","http://localhost");
define('SERVER_DIR_IMAGE',HTTP_SERVER."/".WEBSITE."/wx_assets/img/");


define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', '');
define('DB_PREFIX', '');


define('APPID','yourWeChatAppId');
define('APPSECRET','yourWeChatAppSecret');
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
