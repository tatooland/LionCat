	<?php 
		foreach($msgs as $msg){
	?>
	<div class="media">
      <div class="media-left">
        <a href="#">
          <img class="media-object img-rounded" data-src="holder.js/64x64" alt="64x64" src="<?php echo $msg['head_img'];?>" data-holder-rendered="true" style="width: 55px; height: 55px;">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading" style='color:#000;font-size:14px;'><?php echo $msg['nick'];?></h4>
        <p></p>
        <font style='font-size:12px;'>
        	<?php
        		$m=$msg['msg'];
				//if(strlen($m)>19){ 
					//echo substr($msg['msg'],0,19)."...";
				//}else{
					echo $msg['msg'];
				//}
			?>
		</font>
      </div>
      <div class="media-right">
      <!-- 
        <a href="#">
        	<img src="">
        </a>
         -->
         <p style='font-size:12px;'><?php echo substr($msg['time'],11);?></p>
      </div>
    </div>
    <hr style='margin-top:8px;margin-bottom:8px;'>
    <?php
    	}
    ?>