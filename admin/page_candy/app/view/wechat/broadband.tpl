<?php echo $header;?>
<style>
	input[type='submit']{
		display:none;
	}
	.div2{
		display:none;
	}
	body{
		background-color:#32bceb;
	}
</style>
<img src='page_candy/img/newBroadband/top_pic.jpg' class='img-responsive'/>
<div class="container div1 div">
<br>
<?php 
echo $form;
?>
<div class="row">
	<div class='col-xs-3'>
		<label>产品价格:</label>
	</div>
	<div class="col-xs-9">
		<font style="font-weight:bolder;color:#c00;" id="s_price"></font>
	</div>
	<br>
	<br>
</div>
<input onclick='goNextStep(2)' type='button' class='center-block btn btn-md btn-warning' value='下一步'>
</div>

<div class="container div2 div">
<br>
<?php echo $form2;?>
<br>
<br>
<input onclick='sub()' type="button" class='center-block btn btn-md btn-danger' value="确认预约">
</div>

<script type="text/javascript">
	function sub(){
		if($("#user_name").val()!="" 
				&& $("#user_detail_address").val()!=""
				&& $("#user_phone").val()!=""
				&& $("#user_id_card").val()!=""
				&& $("#telecom_attribute_id").val()!=""
				&& $("#product_name").val()!=""
				&& $("#user_area").val()!=""
				&& $("#setup_type").val()!=""
				&& $("#source").val()!=""){
			$('#order_form').submit();
		}else{
			alert("信息填写不全");
		}
	}
	function goNextStep(id){
		if(_city!="" && _package_type!="" && _import!="" && _speed!="" && _pay_type!=""){
			$(".div").hide();
			$(".div"+id).show();
			$("#user_area").val(_city);
			$("#product_name").val(_speed+_package_type+_pay_type);
			$("#telecom_attribute_id").val(_telecom_attribute_id);
			$("#product_info").val(_product_info);
		}else{
			alert("请选择完整的产品属性!");
		}
	}
</script>

<script type="text/javascript">
	var _city="";
	var _package_type="";
	var _import="";
	var _speed="";
	var _pay_type="";
	
	var _telecom_attribute_id="";
	var _product_name="";
	var _product_info="";
	
	$("#city").bind('change',function(){
		 _city=$(this).children('option:selected').val();
		 var url="index.php?route=wechat/broadband/gPkg";
		 $.ajax({
		        type:"POST",
		        url:url,
		        data:{
					city:_city,
					package_type:_package_type,
					import:_import,
					speed:_speed,
					pay_type:_pay_type
		        },
		        datatype:'text',
		        success:function(data){
		            var resObj=eval("("+data+")");
		            if(resObj.result=="success"){
		        		$("#package_type option").remove();
		        		$("#import option").remove();
		        		$("#speed option").remove();
		        		$("#pay_type option").remove();
		        		$("#package_type").append("<option value='0'>请选择办理套餐</option>");
		        		$("#import").append("<option value='0'>请选择接入方式</option>");
		        		$("#speed").append("<option value='0'>请选择宽带速率</option>");
		        		$("#pay_type").append("<option value='0'>请选择包年方式</option>");
		        		$("#s_price").text("");
		        		var i=0;
		        		for(var i=0;i<resObj.data.length;i++){
		        			$("#package_type").append("<option value='"+resObj.data[i]+"'>"+resObj.data[i]+"</option>");
		        		}
		            }
		        },
		        error:function(){}			 
		 });
	});
	$("#package_type").bind('change',function(){
		 _package_type=$(this).children('option:selected').val();
		 var url="index.php?route=wechat/broadband/gImport";
		 $.ajax({
		        type:"POST",
		        url:url,
		        data:{
					city:_city,
					package_type:_package_type,
					import:_import,
					speed:_speed,
					pay_type:_pay_type
		        },
		        datatype:'text',
		        success:function(data){
		            var resObj=eval("("+data+")");
		            if(resObj.result=="success"){
		        		$("#import option").remove();
		        		$("#speed option").remove();
		        		$("#pay_type option").remove();
		        		$("#import").append("<option value='0'>请选择接入方式</option>");
		        		$("#speed").append("<option value='0'>请选择宽带速率</option>");
		        		$("#pay_type").append("<option value='0'>请选择包年方式</option>");
		        		$("#s_price").text("");
		        		var i=0;
		        		for(var i=0;i<resObj.data.length;i++){
		        			$("#import").append("<option value='"+resObj.data[i]+"'>"+resObj.data[i]+"</option>");
		        		}
		            }
		        },
		        error:function(){}			 
		 });
	});
	$("#import").bind('change',function(){
		 _import=$(this).children('option:selected').val();
		 var url="index.php?route=wechat/broadband/gSpeed";
		 $.ajax({
		        type:"POST",
		        url:url,
		        data:{
					city:_city,
					package_type:_package_type,
					import:_import,
					speed:_speed,
					pay_type:_pay_type
		        },
		        datatype:'text',
		        success:function(data){
		            var resObj=eval("("+data+")");
		            if(resObj.result=="success"){
		        		$("#speed option").remove();
		        		$("#pay_type option").remove();
		        		$("#speed").append("<option value='0'>请选择宽带速率</option>");
		        		$("#pay_type").append("<option value='0'>请选择包年方式</option>");
		        		$("#s_price").text("");
		        		var i=0;
		        		for(var i=0;i<resObj.data.length;i++){
		        			$("#speed").append("<option value='"+resObj.data[i]+"'>"+resObj.data[i]+"</option>");
		        		}
		            }
		        },
		        error:function(){}			 
		 });
	});
	$("#speed").bind('change',function(){
		 _speed=$(this).children('option:selected').val();
		 var url="index.php?route=wechat/broadband/gPayType";
		 $.ajax({
		        type:"POST",
		        url:url,
		        data:{
					city:_city,
					package_type:_package_type,
					import:_import,
					speed:_speed,
					pay_type:_pay_type
		        },
		        datatype:'text',
		        success:function(data){
		            var resObj=eval("("+data+")");
		            if(resObj.result=="success"){
		        		$("#pay_type option").remove();
		        		$("#pay_type").append("<option value='0'>请选择包年方式</option>");
		        		$("#s_price").text("");
		        		var i=0;
		        		for(var i=0;i<resObj.data.length;i++){
		        			$("#pay_type").append("<option value='"+resObj.data[i]+"'>"+resObj.data[i]+"</option>");
		        		}
		            }
		        },
		        error:function(){}			 
		 });
	});
	/*
	var _telecom_attribute_id="";
	var _product_name="";
	var _product_info="";
	*/
	$("#pay_type").bind('change',function(){
		 _pay_type=$(this).children('option:selected').val();
		 var url="index.php?route=wechat/broadband/queryProduct";
		 $.ajax({
		        type:"POST",
		        url:url,
		        data:{
					city:_city,
					package_type:_package_type,
					import:_import,
					speed:_speed,
					pay_type:_pay_type
		        },
		        datatype:'text',
		        success:function(data){
		            var resObj=eval("("+data+")");
		            if(resObj.result=="success"){
						//alert(resObj.price+";;;;"+resObj.info+";;;;"+resObj.telecom_attribute_id);
						$("#s_price").text(resObj.price);
						_product_info=resObj.info;
						_telecom_attribute_id=resObj.telecom_attribute_id;
		            }
		        },
		        error:function(){}			 
		 });
	});
	
</script>
<?php echo $footer;?>