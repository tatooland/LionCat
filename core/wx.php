<?php
final class wx {
	//snsapi_base
	public $openId="";
	//snsapi_userinfo
	public $nickname="";
	public $sex="";
	public $province="";
	public $city="";
	public $country="";
	public $headimgurl="";
	public $privilege=NULL;
	public $unionid="";
	//wx jsapi config
	public $appId="";
	public $noceStr="";
	public $timestamp="";
	public $url="";
	public $signature="";
	public $rawString="";
	
	public $signPackage=NULL;
	/*
	 * 		$signPackage = array(
				"appId"     => APPID,
				"nonceStr"  => $nonceStr,
				"timestamp" => $timestamp,
				"url"       => $url,
				"signature" => $signature,
				"rawString" => $string
		);
	 * */
}

?>