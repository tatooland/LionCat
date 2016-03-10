<?php echo $header;?>
<style>
body{
	min-height:900px;
}
</style>
<div class='container'>
	<br>
	<div class='row'>
		<div class='col-xs-3 col-sm-3'>
			<label>No.:</label>
		</div>
		<div class='col-xs-9 col-sm-9'>
			<input type='text' class='form-control' placeholder='自动生成No.'/>
		</div>
	</div>
	<hr>
	<div class='row'>
		<div class='col-xs-3 col-sm-3'>
			<label>封面</label>
		</div>
		<div class='col-xs-9 col-sm-9'>
			<img id='ww_cover' class='img-responsive'/>
		</div>
	</div>
	<hr>
	<p><button class='center-block btn btn-default btn-info' onclick='chooseImage()'>选择图片</button></p>
	<br>
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
<hr>
<div class='container'>
	<p class='text-left'>选择材质</p>
	<div class='row'>
		<div class='col-xs-5 col-sm-5'>
			<input id='i_material' type='text' class='form-control' value=''>
		</div>
		<div class='col-xs-5 col-sm-5'>
			<input type='button' onclick='$("#materialModal").modal()' class='btn btn-default btn-warning' value='选择'>
		</div>
	</div>
</div>
<div class='container'>
	<p class='text-left'>题材类型</p>
	<div class='row'>
		<div class='col-xs-5 col-sm-5'>
			<input id='i_theme' type='text' class='form-control'>
		</div>
		<div class='col-xs-5 col-sm-5'>
			<input type='button' onclick='$("#themeModal").modal()' class='btn btn-default btn-info'  value='选择'>
		</div>
	</div>
</div>
<div class='container'>
	<p class='text-left'>货品标题</p>
	<p>
		<input type='text' id='title' class='form-control'>
	</p>
</div>
<div class='container'>
	<p class='text-left'>货品描述</p>
	<p>
		<textarea col='6' id='description' class='form-control'>
		</textarea>
	</p>
</div>
<br>
<p class='text-center'><button class='btn btn-lg btn-danger'>保存信息</button></p>
<br>
<br>
<!-- dialog -->
<div class="modal fade" id="materialModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	 <div class='row'>
      	  <?php 
      	  	$midx=0;
      	  	foreach($material as $m){
      	  ?>
      	  	<div class='text-center'><div onclick='show(<?php echo $midx;?>)'><?php echo $m['l'];?></div></div>
      	  	<div class='row'>
      	  	<?php 
      	  		foreach($m["i"] as $mi){
      	  	?>
      	  		<div class='col-xs-4 col-sm-4'  style='padding-top:5px;padding-bottom:5px;'>
      	  			<input class='btn btn-primary btn-sm center-block' type='button' value='<?php echo $mi;?>' onclick='selMaterial("<?php echo $mi;?>")'/>
      	  		</div>
      	  	<?php 
      	  		}
      	  	?>
      	  	</div>
      	  <?php 
      	  	$midx+=1;
			}?>
      	 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="themeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<p>请选择题材</p>
        <div class='row'>
        <?php 
        	foreach($theme as $t){
        ?>
        <div class='col-sm-4 col-xs-4' style='padding-top:5px;padding-bottom:5px;'>
        	<input class='center-block btn btn-primary btn-sm' type='button' value="<?php echo $t?>" onclick='selTheme("<?php echo $t;?>")'/>
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
    var ajaxTheme=undefined;
	function selTheme(t){
		ajaxTheme=t;
		$("#i_theme").val(ajaxTheme);
		$('#themeModal').modal("hide");
	}
	var ajaxMaterial=undefined;
	function selMaterial(m){
		ajaxMaterial=m;
		$("#i_material").val(ajaxMaterial);
		$("#materialModal").modal("hide");
	}
</script>
<script type="text/javascript">
function submitAjax(){
    $.ajax({
        type:"POST",
        url:"<?php echo $postService;?>",
        data:{
			theme:ajaxTheme,
			material:ajaxMaterial,
			title:$("#title").val(),
			description:$("#description").val()
        },
        datatype:'text',
        success:function(data){
        	alert(data);
            var resObj=eval("("+data+")");
            if(resObj.result=="success"){
                window.location.href="";
            }else{
				alert("error");
            }
        },
        error:function(){}
    });		
}
</script>
<?php echo $wxJsPlugin;?>
<?php echo $footer;?>