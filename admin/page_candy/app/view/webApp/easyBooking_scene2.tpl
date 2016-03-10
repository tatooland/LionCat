<div class='container' style='padding-top:7px;overflow-y:auto;height:100%;color:#666;'>
	<div class="form-group  has-feedback">
	  <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" placeholder="搜索好友">
	  <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
	  <span id="inputSuccess2Status" class="sr-only">(success)</span>
	</div>
	<hr style='margin-top:8px;margin-bottom:8px;'>
	<div style='background-color:#aaa;width:100%;'>
		<p class='text-left' style='color:#fff;'>&nbsp;&nbsp;A</p>
	</div>
	<?php
		foreach($users as $user){
	?>
		<div class="media">
		  <div class="media-left">
		    <a href="#">
		      <img class="media-object img-rounded" src="<?php echo $user['head_img'];?>" alt="..." style="width: 50px; height: 50px;">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"></h4>
		    <p></p>
		    <font style='font-size:13px;'><?php echo $user['true_name'];echo "(".$user['nick'].")";?></font>
		  </div>
		</div>
		<hr style='margin-top:8px;margin-bottom:8px;'>
	<?php
		}
	?>
	<br>
	<br>
</div>