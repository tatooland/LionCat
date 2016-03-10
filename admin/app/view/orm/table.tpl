<!-- 筛选器 -->
<div class="panel panel-default">
  <div class="panel-body">
  	<form method='post' action='<?php echo 'index.php'.'?'.$_SERVER['QUERY_STRING'];?>'>
  	<div class='row-fluid'>
   	<?php 
   		foreach($config['filter'] as $flt){
			switch($flt['t']){
				case "text":{
					echo "<div class='span3' style='margin-top:5px;'>
							<input type='text' class='form-control' id='".$flt['c']."' name='".$flt['c']."' placeholder='".$flt['l']."'/>	
   						 </div>";
				}break;
				case "select":{
					$f_label="<label>".$flt['l']."</label>";
					$option="";
					foreach($flt['option'] as $optionSets){
						$option.="<option value='".$optionSets['value']."'>".$optionSets['text']."</option>";
					}
					echo "
							<div class='span3' style='margin-top:5px;'>
								<div class='span3 text-right' style='margin-top:5px;'>
								$f_label
								</div>
								<div class='span3'>
								<select onchange=\"f_sel(this.options[this.options.selectedIndex].value,'".$flt['c']."')\" class='form-control'>$option</select>
								<input type='hidden' name='".$flt['c']."' id='".$flt['c']."'/>
								</div>
							</div>
						";
				}break;
				case "calendar":{
					echo "
						<div class='span3' style='margin-top:5px;'>
							<div class='input-group datetime form_datetime'>
								<input type='text' name='".$flt['c']."' data-format='YYYY-MM-DD' value='' id='".$flt['c']."' class='form-control'/>
								<span class='input-group-btn'>
									<button id='".$flt['c']."_cad_btn' type='button' class='btn btn-default'><i class='fa fa-calendar'></i></button>
								</span>
							</div>
						</div>
						<script type='text/javascript'>
							$('#".$flt['c']."').datetimepicker({
								language:'zh-CN',
								format:'YYYY-MM-DD'
							});
						</script>
					";
				}break;
			}
   	?>
   	
   	<?php 
   		}
   		echo "<div class='span3' style='padding-top:5px;'>
			  	<input type='submit' class='btn btn-default btn-warning' value='筛选'/> 
		      </div>";
   	?>
   	</div>
   	</form>
  </div>
</div>
<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered table-striped">
		<tr>
			<?php 
				foreach($config['data'] as $th){
			?>
			<?php echo "<th class='text-center success'>".$th['l']."</th>";?>
			<?php 
				}
				foreach($config['op'] as $o){
					echo "<th class='text-center success'>".$o['l']."</th>";
				}
			?>
		</tr>
		<tr>
		<?php
			
			foreach($rows as $row){
				echo "<tr>";
				$_id=$row['id'];
		?>
		<?php
				$loopIdx=0;
				foreach($row as $k=>$i){
					switch($config['data'][$loopIdx]['click']){
						case "editablebox":{
							echo "<td class='text-center' id='eb_".$k."_".$_id."'><div id='".$k."_".$_id."' onclick=\"editbox(this,'".$k."_".$_id."','$i','eb_".$k."_".$_id."')\">$i</div></td>";
						}break;
						case "select":{}break;
						default:{
							echo "<td id='".$k."_".$_id."' class='text-center'>".$i."</td>";
						}break;
					}
						$loopIdx+=1;
				}
				
				foreach($config['op'] as $op){
					echo "<td class='text-center'><input type='button' onclick='sudo(\"".$op['callback']."\",\"".$_id."\")' value='".$op['l']."' /></td>";
				}
		?>
		<?php
				echo "</tr>";	
			}
		?>
	
	</table>
</div>
<script type="text/javascript">
	function sudo(callback,identify){
		$.ajax({
			type:"POST",
			url:"<?php echo "index.php?route=$route";?>/"+callback,
			data:{
				<?php 
					foreach($config['data'] as $c){
						if($c['model']!='submit'){
							$value=".html()";
							switch($c['click']){
								case "editablebox":{
									$value='.html()';
								}break;
							}
							echo $c['c'].': $("#'.$c['c'].'_"+identify)'.$value.',';
						}
					}
				?>
			},
			datatype:'json',
			success:function(data){
				var resObj=eval("("+data+")");
				if(resObj.result=="success"){
					alert("处理已成功");
				}else{
					alert("系统处理失败!");
				}
			},
			error:function(){}
		});
	}

	function editbox(what,id,val,cid){
		$("#"+cid).html("<div class='row'><div class='col-xs-8'><input class='form-control' id='mini_editbox_"+id+"' type='text' value='"+val+"'></div><div class='col-xs-4'><input type='button' onclick=\"editbox_modify('"+cid+"','"+id+"')\" class='btn btn-danger btn-sm' value='修改'/></div></div>");
	}
	function editbox_modify(cid,id){
		var val=$('#mini_editbox_'+id).val();
		$('#'+cid).html("");
		$('#'+cid).html("<div id='"+id+"'   onclick=\"editbox(this,\'"+id+"\',\'"+val+"\',\'"+cid+"\')\">"+val+"</div>");
	}
</script>
<!-- 筛选器js -->
<script type='text/javascript'>
	function f_sel(val,id){
		$('#'+id).val(val);
	}
</script>
