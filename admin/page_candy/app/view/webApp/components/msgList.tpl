<div class='container' style='padding-top:7px;overflow-y:auto;height:100%;color:#666;'>
<div class="form-group  has-feedback">
  <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status">
  <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
  <span id="inputSuccess2Status" class="sr-only">(success)</span>
</div>
	<hr style='margin-top:8px;margin-bottom:8px;'>
	<?php 
		foreach($msgs as $m){
	?>
	<div class="media">
      <div class="media-left">
        <a href="#">
          <img class="media-object img-rounded" data-src="holder.js/64x64" alt="64x64" src="http://img2.imgtn.bdimg.com/it/u=3802502951,897121633&fm=21&gp=0.jpg" data-holder-rendered="true" style="width: 55px; height: 55px;">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading" style='color:#000;font-size:14px;'>老白</h4>
        <p></p>
        <font style='font-size:12px;'>CSDN:D语言架构师谈D、GO、Rust取代C...</font>
      </div>
      <div class="media-right">
      <!-- 
        <a href="#">
        	<img src="">
        </a>
         -->
         <p style='font-size:12px;'>10:06</p>
      </div>
    </div>
    <hr style='margin-top:8px;margin-bottom:8px;'>
    <?php
    	}
    ?>
</div>