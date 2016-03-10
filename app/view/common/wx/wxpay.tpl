<script type='text/javascript'>
	var openId='<?php echo $openId;?>';
	var orderNumber='<?php echo $orderNumber;?>';
</script>
<script type='text/javascript'>
	function wxPayRequest(){
		if(judge()){
			prehandle();
			WeixinJSBridge.invoke(
				'getBrandWCPayRequest',
				<?php echo $jsApiParameters?>,
				function(res){
					WeixinJSBridge.log(res.err_msg);
				}
			);
		}
	}
	function pay(){
		if(typeof WeixinJSBridge=='undefined'){
			if(document.addEventListener){
				document.addEventListener('WeixinJSBridgeReady',wxPayRequest,false);
			}else if(document.attachEvent){
				document.attachEvent('WeixinJSBridgeReady',wxPayRequest);
				document.attachEvent('onWeixinJSBridgeReady',wxPayRequest);
			}
		}else{
			wxPayRequest();
		}
	}
</script>
