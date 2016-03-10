<form method="<?php echo $method;?>" action="<?php echo $action?>" id='<?php echo $table;?>'>
	<?php foreach($payload as $i){	
			if($i['t']!="hidden"){
				if($i['t']=="text"){		
	?>
	
		<div class='row'>
			<div class='col-xs-3'>
				<label class=''>
					<?php echo $i['l'];?>
				</label>
			</div>
			<div class='col-xs-9'>
				<input placeholder='<?php echo $i['p'];?>'  class='form-control' type='<?php echo $i['t'];?>' name='<?php echo $i['c'];?>' id='<?php echo $i['c'];?>' />
			</div>
		</div>
		<br>
		<br>
	<?php
				}else if($i['t']=="select"){
	?>
	   <div class='row'>
	   		<div class='col-xs-3'>
	   			<label class=''>
	   				<?php echo $i['l'];?>
	   			</label>
	   		</div>
	   		<div class='col-xs-9'>
	   			<select class='form-control' onchange="" name='<?php echo $i['c'];?>' id='<?php echo $i['c'];?>'>
	   				<?php
	   					foreach($i['o'] as $o){
	   				?>
	   				<option value='<?php echo $o['val'];?>'><?php echo $o['text'];?></option>
	   				<?php 
	   					}
	   				?>
	   			</select>
	   		</div>
	   		<br>
	   		<br>
	   		<br>
	   </div>
	<?php			
				}else if($i['t']=="textarea"){
	?>
				<div class='row'>
					<div class='col-xs-3'>
						<label class=''>
							<?php echo $i['l'];?>
						</label>
					</div>
					<div class='col-xs-9'>
						<textarea  type="text" class="form-control" rows="5" id="<?php echo $i['c'];?>" name="<?php echo $i['c'];?>" ></textarea>
					</div>
					<br>
					<br>
				</div>
	<?php
				}
			}else{
	?>
		<input type='<?php echo $i['t'];?>' name='<?php echo $i['c'];?>' id='<?php echo $i['c'];?>' value='<?php echo $i['v'];?>'/>
	<?php 
			} 
		}
	?>
	<input type='hidden' name='table' value='<?php echo $table;?>'/>
	<input type='hidden' name='do' value='<?php echo $do;?>'/>
	<input type='hidden' name='condition' value='<?php echo $condition;?>'/>
	<input type='submit' class='center-block btn btn-danger' value='确认提交'>
</form>