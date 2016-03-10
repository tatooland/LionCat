	<?php 
		for($i=0;$i<20;$i++){
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
    
 <script type="text/javascript">
	var currentSceneIdx=1;
	var lastScene=1;
	var currentPage=1;
	var lastPage=1;
	function changeScene(what){
		$('.scene-1').removeClass('pshow');
		$('.scene-1').addClass('phide');
		$('.scene-1').removeClass('phide');
		$('.scene-2').addClass('pshow');
		var pages=$(".scene-1").children("div.page");
		pages.each(function(){
			var page=$(this);
			page.removeClass("current");
		});
		page=$(".scene-2").children("div.page-1");
		page.addClass("current");
	}
 </script>