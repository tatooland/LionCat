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
<style type='text/css'>
	.bg{position:absolute;width:100%;height:100%;z-index:-1;}
</style>
<div class='bg'>
	<img src='page_candy/img/bg.jpg' height='100%' width='100%'/>
</div>
<div class='container'>
	<div class='container' style='margin-top:320px;background-color:rgba(220,220,220,0.8);padding-top:8px;padding-bottom:8px;border-radius:5px;'>
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
	</div>
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