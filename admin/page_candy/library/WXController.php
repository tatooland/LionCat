<?php
/*
 *getSignPackage(); 
 * */
class WXController extends Controller{
	private $jsLib="http://res.wx.qq.com/open/js/jweixin-1.0.0.js";
	private $debug=true;


	public function _getAccessToken(){
		if(filesize(WXTOKENFILE)>0){
			$now=time();
			$oldTokenStr=json_decode(file_get_contents(WXTOKENFILE));
			if($now>=($oldTokenStr->time+7200)){
				$token=json_decode(file_get_contents(WXGETTOKENURL))->access_token;
				$fd=fopen(WXTOKENFILE,"w");
				fwrite($fd,"{\"access_token\":\"".$token."\",\"time\":\"".time()."\"}");
				fclose($fd);
				return $token;
			}else{
				return $oldTokenStr->access_token;
			}
		}else{
			$token=json_decode(file_get_contents(WXGETTOKENURL))->access_token;
			$fd=fopen(WXTOKENFILE,"w");
			fwrite($fd,"{\"access_token\":\"".$token."\",\"time\":\"".time()."\"}");
			fclose($fd);
			return $token;
		}		
	}
	public function _getTicket($token){
		$ticketUrl=str_replace("%ACCESS_TOKEN%", $token,WXGETTICKETURL);
		if(filesize(WXTICKETFILE)>0){
			$now=time();
			$oldTicketStr=json_decode(file_get_contents(WXTICKETFILE));
			if($now>=($oldTicketStr->time+7200)){
				$ticketStr=json_decode(file_get_contents($ticketUrl));
				$ticket=$ticketStr->ticket;
				$fd=fopen(WXTICKETFILE,"w");
				fwrite($fd,"{\"ticket\":\"".$ticket."\",\"time\":\"".time()."\"}");
				fclose($fd);
				return $ticket;
			}else{
				return $oldTicketStr->ticket;
			}
		}else{
			$ticket=json_decode(file_get_contents($ticketUrl))->ticket;
			$fd=fopen(WXTICKETFILE,"w");
			fwrite($fd,"{\"ticket\":\"".$ticket."\"time\":\"".time()."\"}");
			fclose($fd);
			return $ticket;
		}
	}
	public function getJsApiTicket(){
		return $this->_getTicket($this->_getAccessToken());
	}
	
	
	private function _getJsApiTicket() {
		// jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
		$data = json_decode(file_get_contents("jsapi_ticket.json"));
		if ($data->expire_time < time()) {
			$accessToken = $this->getAccessToken();
			// 如果是企业号用以下 URL 获取 ticket
			// $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
			$url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
			$res = json_decode($this->httpGet($url));
			$ticket = $res->ticket;
			if ($ticket) {
			$data->expire_time = time() + 7000;
			$data->jsapi_ticket = $ticket;
			$fp = fopen("jsapi_ticket.json", "w");
        fwrite($fp, json_encode($data));
	        fclose($fp);
			}
			} else {
			$ticket = $data->jsapi_ticket;
			}
	
			return $ticket;
	}
	private function getAccessToken() {
		// access_token 应该全局存储与更新，以下代码以写入到文件中做示例
		$data = json_decode(file_get_contents("access_token.json"));
		if ($data->expire_time < time()) {
			// 如果是企业号用以下URL获取access_token
			// $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
			$res = json_decode($this->httpGet($url));
			$access_token = $res->access_token;
			if ($access_token) {
			$data->expire_time = time() + 7000;
			$data->access_token = $access_token;
			$fp = fopen("access_token.json", "w");
			fwrite($fp, json_encode($data));
			fclose($fp);
			}
			} else {
			$access_token = $data->access_token;
		}
		return $access_token;
		}
	private function createNonceStr($length = 16) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$str = "";
		for ($i = 0; $i < $length; $i++) {
			$str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
		}
		return $str;
	}
	private function httpGet($url) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 500);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, $url);
	
		$res = curl_exec($curl);
		curl_close($curl);
	
		return $res;
	}
	public function getSignPackage() {
		/*
		$jsapiTicket = $this->_getJsApiTicket();
	
		// 注意 URL 一定要动态获取，不能 hardcode.
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
		$timestamp = time();
		$nonceStr = $this->createNonceStr();
	
		// 这里参数的顺序要按照 key 值 ASCII 码升序排序
		$string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
	
		$signature = sha1($string);
	
		$signPackage = array(
				"appId"     => APPID,
				"nonceStr"  => $nonceStr,
				"timestamp" => $timestamp,
				"url"       => $url,
				"signature" => $signature,
				"rawString" => $string
		);
		return $signPackage;*/
		$jssdk=new JSSDK(APPID, APPSECRET);
		return $jssdk->getSignPackage();
	}
	public function getUserInfo($onlyOpenId=true,$stateParameters="miniFrm"){
		$REDIRECT_URI=urlencode("");
		$STATE=$stateParameters;
		if($onlyOpenId){
			$SCOPE="snsapi_base";			
		}else{
			$SCOPE="snsapi_userinfo";
		}
		$url="http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
		if(!strpos($url,"/wxminihandlepage")){
			if(strpos($url,"&state=")){
				$urlStr="&state=";
				$startPos=strpos($url,$urlStr);
				$stateParameters=substr($url,$startPos,strlen($url)-$startPos);
				$stateParameters=substr($stateParameters, strlen($urlStr));
				$url=substr($url,0,$startPos);

				$tempUrl="http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
				$tempGet="?";
				foreach($this->request->get as $key=>$val){
					if($key=="route"){
						$tempGet.=$key."=".$val."/wxminihandlepage";
					}else if($key=="state"){
						continue;
					}else{
						$tempGet.="&".$key."=".$val;
					}
				}
				$url=$tempUrl.$tempGet;
			}else{
				//$stateParameters="";
				$tempUrl="http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
				$tempGet="?";
				foreach($this->request->get as $key=>$val){
					if($key=="route"){
						$tempGet.=$key."=".$val."/wxminihandlepage";
					}else{
						$tempGet.="&".$key."=".$val;
					}
				}
				$url=$tempUrl.$tempGet;
			}
			$WXAUTHORURL=str_replace("%REDIRECT_URI%", urlencode($url),WXAUTHORURL);
			$WXAUTHORURL=str_replace("%SCOPE%",$SCOPE,$WXAUTHORURL);
			$WXAUTHORURL=str_replace("%STATE%",$stateParameters,$WXAUTHORURL);
			header("location:".$WXAUTHORURL);
		}
	}
	public function wxminihandlepage(){
		$wx=new wx();
		$this->registry->set("wx",$wx);
		$code=$this->request->get['code'];
		$stateParameters=$this->request->get['state'];
		$AuthTokenUrl=str_replace("%CODE%",$code,WXAUTHORTOKENURL);
		//var_dump($AuthTokenUrl);
		$jsonStr=file_get_contents($AuthTokenUrl);
		$jsObj=json_decode($jsonStr);
		$this->wx->openId=$jsObj->openid;
		$this->wx->signPackage=$this->getSignPackage();
		$this->_index();
	}
	public function index($data=NULL){
		//$wx=new wx();
		//$this->registry->set("wx",$wx);
		//$this->getUserInfo(TRUE);
		//$tempAry=$this->getSignPackage();
		//$this->wx->signPackage=
		//foreach($tempAry as $key=>$val){
			//$this->wx->signPackage[$key]=$val;
		//}
		//$this->_index();
		$this->getUserInfo(TRUE);
	}
	public function _index(){
		echo "这个方法应该被覆写";              
	}
	public function loadWxJsPlugin($plugins=NULL){
		if($plugins==NULL){
			$data=array();
			$data['debug']=false;
			$data['timestamp']=$this->wx->signPackage['timestamp'];
			$data['nonceStr']=$this->wx->signPackage['nonceStr'];
			$data['signature']=$this->wx->signPackage['signature'];
			$data['jsApiList']="'chooseImage','previewImage','uploadImage','downloadImage',
					'translateVoice','getNetworkType','openLocation','getLocation','closeWindow','scanQRCode',
					'addCard','chooseCard','openCard'";
			$data['appid']=APPID;
			return $this->load->view("common/wx/wxplugin.tpl",$data);
		}
	}
	public function downloadWxUploadImg($imgs){
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,WXMEDIATOKEN);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output=curl_exec($ch);
		curl_close($ch);
		$json=json_decode($output,TRUE);
		$accessToken=$json['access_token'];
		$result=array();
		foreach($imgs as $key=>$img){
			$url=str_replace("%MEDIAID%", $img, WXFILEMEDIA);
			$url=str_replace("%ACCESSTOKEN%",$accessToken,$url);
			
			$ch=curl_init($url);
			curl_setopt($ch,CURLOPT_HEADER,0);
			curl_setopt($ch,CURLOPT_NOBODY,0);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
			curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			$package=curl_exec($ch);
			$httpinfo=curl_getinfo($ch);
			//echo "httpinfo:$httpinfo";
			curl_close($ch);
			//$val=time();
			$filename=DIR_IMAGE.$img.".jpg";
			$local_file=fopen($filename,"w");
			if(false!==$local_file){
				if(false!==fwrite($local_file,$package)){
					fclose($local_file);
					array_push($result,SERVER_DIR_IMAGE.$img.".jpg");
					//echo" down load success";
				}
			}else{
				//echo "sorry";
			}
		}
		return $result;
	}
	
}

?>