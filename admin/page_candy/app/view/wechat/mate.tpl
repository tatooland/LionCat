<?php
	echo $header;
?>
<style>
	input[type='submit']{
		display:none;
	}
</style>
<img src='page_candy/img/matehead.jpg' class='img-responsive'/>
<div class='container'>
<br>
<?php
	echo $form;
?>
<div class='row'>
	<div class='col-xs-3'>
		<label>选择机型</label>
	</div>
	<div class='col-xs-9'>
		<select onchange='selPhone(this.options[this.options.selectedIndex].value,this.options[this.options.selectedIndex].text)' class='form-control'>
			<option value='1'>电信定制版（HUAWEI NXT-CL00）</option>
			<option value='2'>Mate 8全网通版4GB+128GB</option>
			<option value='3'>Mate 8全网通版4GB+64GB</option>
			<option value='4'>Mate 8全网通版（HUAWEI NXT-AL10）3GB+32GB版</option>
		</select>
	</div>
</div>
<br>
<div class='row'>
	<div class='col-xs-3'>
		<label>参考价格</label>
	</div>
	<div class='col-xs-9 text-center'>
		<p><font style='font-size:20px;font-weight:bolder;color:#c00;' id='showPrice'>2990</font>元</p>
	</div>
</div>
<p style='font-size:12px;'>(此价格仅做手机预约参考，实际售价以官方公布为准！)</p>
<br>
<br>
<input onclick='expend()' type='button' class='left-center btn btn-sm btn-success' value='展开／收起详细参数'>
<div class="panel panel-default" style='display:block;'>
	<div class="panel-title">
		<p class='text-danger'><div onclick='expend()'>查看参数>></div></p>
	</div>
	<div class="panel-body">
	<div class="info info1 panel panel-default" style='display:none;'>
	<div class="panel-body">
		<p style='font-weight:bolder;' class='text-primary'>电信定制版（HUAWEI NXT-CL00）（零售价和合约价为2990元）</p>
		<p>标准配置：整机（含电池），充电器，数据线，用户手册，捅针，保修卡，耳机、保护套</p>
		<p>外观设计：直板</p>          
		<p>颜色：月光银、苍穹灰</p>
		<p>产品尺寸：157.3*80.6*8.2mm</p> 
		<p>重量：约185g （含电池）</p>
		<p>屏幕尺寸：6英寸、1920*1080</p>
		<p>屏幕材质：TFT 触摸屏(电容)</p>
		<p>电池容量：4000毫安时（通话：1680分钟; 待机：504小时）</p>
		<p>网络支持：FDD LTE:1/2/3/4/5/6/7/8/12/17/18/19/20/26 TDD LTE:38/39/40/41</p>
		<p>UMTS: 1/2/4/5/6/8/19   TD-SCDMA: B34/B39  CDMA:BC0   GSM/GRPS/EDGE:  2/3/5/8</p>
		<p>CDMA 1X:  BC0</p>
		<p>待机类型：双卡双待双通LTE</p>
		<p>LTE频段：FDD LTE:1/2/3/4/5/6/7/8/12/17/18/19/20/26 TDD LTE:38/39/40/41</p>
		<p>基带芯片：HisiliconKirin 950</p> 
		<p>操作系统：Android 6.0</p>
		<p>内存：RAM：3GB ，ROM：32GB</p>
		<p>扩展内存：MicroSD（最大可支持128GB）</p>
		<p>摄像头：主：1600万像素CMOS AF  副：800万像素CMOS</p>
	</div>
	</div>
	<div class="info info2 panel panel-default" style='display:none;'>
	  <div class="panel-body">
	    <p style='font-weight:bolder;' class='text-primary'>Mate 8全网通版4GB+128GB（零售价和合约价均4399元）</p>
	<p>标准配置：整机（含电池），充电器，数据线，用户手册，捅针，保修卡，耳机、保护套</p>
	<p>外观设计：直板</p>
	<p>颜色：香槟金、摩卡金</p>
	<p>产品尺寸：157.3*80.6*8.2mm</p>
	<p>重量：约185g （含电池）</p>
	<p>屏幕尺寸：6英寸、1920*1080</p>
	<p>屏幕材质：TFT 触摸屏(电容)</p>
	<p>电池容量：4000毫安时（通话：1680分钟; 待机：504小时）</p>
	<p>网络支持：FDD LTE:1/2/3/4/5/6/7/8/12/17/18/19/20/26 TDD LTE:38/39/40/41</p>
	<p>UMTS: 1/2/4/5/6/8/19   TD-SCDMA: B34/B39  CDMA:BC0   GSM/GRPS/EDGE:  2/3/5/8</p>
	<p>CDMA 1X:  BC0</p>
	<p>待机类型：双卡双待双通LTE</p>
	<p>LTE频段：FDD LTE:1/2/3/4/5/6/7/8/12/17/18/19/20/26 TDD LTE:38/39/40/41</p>
	<p>基带芯片：HisiliconKirin 950   应用处理器：HisiliconKirin 9504*2.3+4*1.8</p>
	<p>操作系统：Android 6.0软件版本:NXTAL00C00B079</p>
	<p>内存：RAM：4GB ，ROM：128GB</p>
	<p>扩展内存：MicroSD（最大可支持128GB）</p>
	<p>摄像头：主：1600万像素CMOS AF 副：800万像素CMOS</p>
	  </div>
	</div>
	<div class="info info3 panel panel-default" style='display:none;'>
	  <div class="panel-body">
	    <p style='font-weight:bolder;' class='text-primary'>Mate 8全网通版4GB+64GB（零售价和合约价均3699元）</p>
	<p>标准配置：整机（含电池），充电器，数据线，用户手册，捅针，保修卡，耳机、保护套</p>
	<p>外观设计：直板</p>
	<p>颜色：香槟金、摩卡金</p>
	<p>产品尺寸：157.3*80.6*8.2mm</p>
	<p>重量：约185g （含电池）</p>
	<p>屏幕尺寸：6英寸、1920*1080</p>
	<p>屏幕材质：TFT 触摸屏(电容)</p>
	<p>电池容量：4000毫安时（通话：1680分钟; 待机：504小时）</p>
	<p>网络支持：FDD LTE:1/2/3/4/5/6/7/8/12/17/18/19/20/26 TDD LTE:38/39/40/41</p>
	<p>UMTS: 1/2/4/5/6/8/19   TD-SCDMA: B34/B39  CDMA:BC0   GSM/GRPS/EDGE:  2/3/5/8</p>
	<p>CDMA 1X:  BC0</p>
	<p>待机类型：双卡双待双通LTE</p>
	<p>LTE频段：FDD LTE:1/2/3/4/5/6/7/8/12/17/18/19/20/26 TDD LTE:38/39/40/41</p>
	<p>基带芯片：HisiliconKirin 950   应用处理器：HisiliconKirin 9504*2.3+4*1.8</p>
	<p>操作系统：Android 6.0软件版本:NXTAL00C00B079</p>
	<p>内存：RAM：4GB ，ROM：64GB</p>
	<p>扩展内存：MicroSD（最大可支持128GB）</p>
	<p>摄像头：主：1600万像素CMOS AF 副：800万像素CMOS</p>
	  </div>
	</div>
	<div class="info info4 panel panel-default" style='display:none;'>
	  <div class="panel-body">
	   	<p style='font-weight:bolder;' class='text-primary'>Mate 8全网通版（HUAWEI NXT-AL10）3GB+32GB版（零售价和合约价均为3199元）</p>
	<p>标准配置：整机（含电池），充电器，数据线，用户手册，捅针，保修卡，耳机、保护套</p>
	<p>外观设计：直板</p>
	<p>颜色：月光银、苍穹灰</p>
	<p>产品尺寸：157.3*80.6*8.2mm</p>   
	<p>重量：约185g （含电池）</p>
	<p>屏幕尺寸：6英寸、1920*1080</p>   
	<p>屏幕材质：TFT 触摸屏(电容)</p>
	<p>电池容量：4000毫安时（通话：1680分钟; 待机：504小时）</p>
	<p>网络支持：FDD LTE:1/2/3/4/5/6/7/8/12/17/18/19/20/26 TDD LTE:38/39/40/41</p>
	<p>UMTS: 1/2/4/5/6/8/19   TD-SCDMA: B34/B39  CDMA:BC0   GSM/GRPS/EDGE:  2/3/5/8</p>
	<p>CDMA 1X:  BC0</p>
	<p>待机类型：双卡双待双通LTE</p>
	<p>LTE频段：FDD LTE:1/2/3/4/5/6/7/8/12/17/18/19/20/26 TDD LTE:38/39/40/41</p>
	<p>基带芯片：HisiliconKirin 950应用处理器：HisiliconKirin 9504*2.3+4*1.8</p>
	<p>操作系统：Android 6.0软件版本:NXTAL00C00B079</p>
	<p>内存：RAM：3GB ，ROM：32GB</p>
	<p>扩展内存：MicroSD（最大可支持128GB）</p>
	<p>摄像头：主：1600万像素CMOS AF   副：800万像素CMOS</p>
	<p>特色功能：BT4.2，指纹解锁、NFC支付、专业相机、慢动作</p>
	  </div>
	</div>
	</div>
</div>
<input type='button' class='center-block btn btn-default btn-lg btn-warning' onclick='sbm()' value='提交预约'> 
</div>
<br>
<br>
<hr>
<script type='text/javascript'>
	var price=[2990,4399,3699,3199];
	var g_v=1;
	var isOpen=false;
	function selPhone(val,txt){
		g_v=val;
		$("#product_name").val(txt);
		$(".info").hide();
		//$(".info"+val).show();
		$('#showPrice').text(price[parseInt(val)-1]);
	}
	function expend(){
		if(isOpen==false){
			isOpen=true;
			$(".info"+g_v).show();
		}else{
			$(".info").hide();
			isOpen=false;
		}
	}
	function sbm(){

			$('#order_form').submit();
	}
</script>
<?php
	echo $footer;
?>