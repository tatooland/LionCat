<?php echo $header;?>
<style type='text/css'>
	.bg{position:absolute;width:100%;height:100%;z-index:-1;}
</style>
<div class='bg'>
	<img src='page_candy/img/bg.jpg' height='100%' width='100%'/>
</div>
<div class='container'>
	<div class='container' style='margin-top:320px;background-color:rgba(220,220,220,0.8);padding-top:8px;padding-bottom:8px;border-radius:5px;'>
		<p style='' class='text-left text-info'>如何领取：用户需到微信“云南电信网厅”精英挑战赛领取电信ifree4G卡，待ifree4G卡领取成功后即可领取腾讯游戏CD-KEY。</p>
		<p class='text-left text-danger' style='font-size:12px;'>注：ifree4G卡限昆明地区使用，受理需要1-2个工作日以快递方式寄出请正确填写联系方式。</p>
		<div class='row'>
			<div class='col-xs-6 col-sm-6'>
				<input type='button' class='center-block btn btn-default btn-danger' onclick='window.location.href="<?php echo $booking;?>"' value='领取ifree4G卡'>
			</div>
			<div class='col-xs-6 col-sm-6'>
				<input type="button" class="center-block btn btn-default btn-warning" onclick='window.location.href="<?php echo $exchange;?>"' value="兑换游戏CD－KEY">
			</div>
		</div>
	</div>	
</div>

<?php echo $footer;?>