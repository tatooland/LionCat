<?php
echo $header;
?>
<style type='text/css'>
#step1{
	display:block;
}
#step1_1{
	display:none;
}
#step1_2{
	display:none;
}
#step2{
	display:none;
}
</style>
<br>
<div id='step1' class='container'>
	<input type='button' onclick='ns("1");' class='center-block btn btn-default btn-info' value='英雄联盟皮肤'/>
	<br>
	<input type='button' onclick='ns("2")' class='center-block btn btn-default btn-warning' value='天天酷跑宠物'/>
</div>
<br>
<div id='step1_1' class='container'>
	<input type='button' onclick="ns1(3)" class='center-block btn btn-default btn-info' value='戴一个表布里茨'/>
	<br>
	<input type='button' onclick="ns1(2)" class='center-block btn btn-default btn-info' value='屠龙勇士嘉文四世'/>
</div>
<br>
<div id='step1_2' class='container'>
	<input type='button' onclick='ns1(1)' class='center-block btn btn-default btn-info' value='太阳宠物'/>
</div>
<br>
<div id='step2' class='container'>
	<?php
	echo $form;
	?>
</div>
<script type='text/javascript'>
	function ns(index){
		$('#step1').hide();
		$("#step1_"+index).show();
	}
	function ns1(val){
		$("#step1").hide();
		$("#step1_1").hide();
		$("#step1_2").hide();
		$('#step2').show();
		$('#key_type').val(val);
	}
</script>
<div class='container'>
<br>
<br>
</div>
<?php
echo $footer;
?>