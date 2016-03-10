<?php echo $header;?>
<img src='page_candy/img/top1.jpg' class='img-responsive'>
<div class='container'>
	<br>
	<label class='text-primary'><i>基本信息填写</i></label>
	<br>
	<div class='row'>
		<div class='col-xs-3 col-sm-3'>
			<label>用户姓名</label>
		</div>
		<div class='col-xs-9 col-sm-9'>
			<input id='user_name' type='text' class='form-control' placeholder="请输入真实用户姓名"/> 
		</div>
	</div>
	<br>
	<div class='row'>
		<div class='col-xs-3 col-sm-3'>
			<label>联系电话</label>
		</div>
		<div class='col-xs-9 col-sm-9'>
			<input id='user_phone' type='text' class='form-control' placeholder="请输入联系电话方便我们联系您"/> 
		</div>
	</div>
	<br>
	<div class='row'>
		<div class='col-xs-3 col-sm-3'>
			<label>身份证号</label>
		</div>
		<div class='col-xs-9 col-sm-9'>
			<input id='user_idcard' type='text' class='form-control' placeholder="请输入您的真实身份证号码"/> 
		</div>
	</div>
	<br>
	<div class='row'>
		<div class='col-xs-3 col-sm-3'>
			<label>寄送地址</label>
		</div>
		<div class='col-xs-9 col-sm-9'>
			<input id='user_address' type='text' class='form-control' placeholder="办理成功后我们将根据此地址进行寄送"/>
		</div>
	</div>
	<hr>
	<!-- <div class='row text-left text-danger'>请上传身份证正面，反面及手持身份证照 <button type='button' class='btn btn-primary btn-sm' data-toggle="modal" data-target="#idcardExample">点击查看示例</button></div> -->
	<label class='text-left text-primary'><i>上传身份证</i></label>
	<br>
	<p class='text-center'><input type='button' onclick='$("#idcardExample").modal()' class='center-block btn btn-default btn-info' value='点击上传身份证'></p>
	<div class='row' id='_imgC'>
	</div>
	<br>
	<hr>
	<label class='text-left text-primary'><i>选择ifree号码</i></label>
	<br>
	<div class='row'>
		<div class='col-xs-7 col-sm-7'>
			<input id='user_ifreenbr' disabled='true' type='text' class='form-control'>
		</div>
		<div class='col-xs-5 col-sm-5'>
			<input type='button' onclick='$("#nbrSelModal").modal();' class='btn btn-default btn-warning' value='选一个ifree号码'>
		</div>
	</div>
	<br>
	<br>
	<div class='container text-center'>
		<input onclick='appointment()' type='button' class='center-block btn btn-lg btn-danger' value='提交预约'>
	</div>
	<br>
	<br>
	<br>
</div>
<!-- Modal -->
<div class="modal fade" id="idcardExample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">请按照下列示例上传您的身份证照片</h4>
      </div>
      <div class="modal-body">
      	<p>请上传身份证手持照，身份证正面照，身份证反面照！</p>
        <img src='page_candy/img/idcardExp.jpg' class='img-responsive'/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick='okisee()'>我知道了</button>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
	function okisee(){
		alert("记得点选三张哦！");
		$("#idcardExample").modal('hide');
		chooseImage();
	}
	
</script>
<!-- dialog -->
<div class="modal fade" id="nbrSelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div class='row'>
			<?php
				foreach($ifreeNbr as $ifr){
			?>
		        <div class='col-sm-5 col-xs-5' style='padding-top:5px;padding-bottom:5px;'>
		        	<input class='center-block btn btn-primary btn-sm' type='button' value="<?php echo $ifr['ifree_nbr'];?>" onclick='selIfr("<?php echo $ifr['ifree_nbr'];?>")'/>
		        </div>
			<?php
				}
			?>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
	function selIfr(nbr){
		$('#user_ifreenbr').val(nbr);
		$("#nbrSelModal").modal('hide');
	}

	function appointment(){
		//alert("hhh");
		
		if($("#user_name").val()!="" && $("#user_phone").val()!="" && $("#user_idcard").val()!="" && $("#user_ifreeid").val()!="" && $("#user_address").val()!=""){
			if(!checkMobile($("#user_phone").val())){
				alert("请填写正确的联系方式");
				$("#user_phone").val("");
			}else{
				if(!checkIdCard($("#user_idcard").val())){
					alert("你输入的身份证号不正确！");
					$("#user_idcard").val("");
				}else{
					uploadImage();
				}
			}
		}else{
			//if(remoteImgs==undefined){
				//alert("请上传你的身份证照片");
			//}else{
				alert("你的信息填写不完整");
			//}
		}
		
	}

	
	function uploadImageHandle(){
		if(currentChooseIdx==3){
			if(remoteImgsStr==""){
				alert("请上传身份证！");
				return;
			}else{
				remoteImgsStr=remoteImgsStr.substring(0,remoteImgsStr.length-1);
				//alert(remoteImgsStr);
				$.ajax({
					type:"post",
					url:"index.php?route=wechat/tencentgame/submitHandle",
					data:{
						userName:$("#user_name").val(),
						userPhone:$("#user_phone").val(),
						userIdCard:$("#user_idcard").val(),
						userIfreeNbr:$("#user_ifreenbr").val(),
						userAddress:$('#user_address').val(),
						idcard:remoteImgsStr
					},
					datatype:'text',
					success:function(data){
						var resObj=eval("("+data+")");
						alert(resObj.result)
						if(resObj.result=="success"){
							alert("已办理成功，请在t+1个工作日后通过微信公众号“云南电信网厅”底部菜单“优惠活动－》精英挑战赛”按钮进行游戏key的领取");
						}else{
							alert("您之前已经提交过订单了！");
						}
					},
					error:function(){
						
					}
				});
			}
		}else{
			alert("请一次上传三张身份证照片");
			localImgs=undefined;
			remoteImgs=undefined;
			remoteImgStr="";
			currentChooseIdx=0;
			$("#"+imgContainerId).html("");
		}
	}
	function checkMobile(str) {
	    var re = /^1\d{10}$/
	    if (re.test(str)) {
	        return true;
	    } else {
	        return false;
	    }
	}
	function checkIdCard(str){
		var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; 
		if(reg.test(str) === false) {
			return false;
		}else{
			return true;
		}
	}
</script>
<script type='text/javascript'>
	var imgContainerId="_imgC";
</script>
<?php echo $wxJsPlugin;?>
<?php echo $footer;?>