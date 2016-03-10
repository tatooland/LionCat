<?php echo $header;?>
<div class='container'>
<br>
<br>
	<p><button class='center-block btn btn-default btn-info' onclick='getNetworkType()'>获取联网类型</button></p>
	<p><button class='center-block btn btn-default btn-info' onclick='chooseImage()'>选择图片</button></p>
	<p><button class='center-block btn btn-default btn-info' onclick='getLocation()'>获取当前位置信息</button></p>
	<p><button class='center-block btn btn-default btn-info' onclick='scanQRCode()'>扫描条码/二维码</button></p>
</div>
<div class='container'>
<br>
<div class='row' id='_imgC'>
</div>
<script type='text/javascript'>
//custom by developer
var imgContainerId="_imgC";
</script>
</div>
<?php echo $wxJsPlugin;?>
<?php echo $footer;?>