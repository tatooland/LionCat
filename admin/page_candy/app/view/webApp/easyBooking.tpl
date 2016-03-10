<?php
	echo $header;
?>
<!-- 
<div class="pt-triggers">
	<button id="iterateEffects" class="pt-touch-button">Show next page transition</button>
</div> -->
<div id="pt-main" class="pt-perspective">
	<div class="pt-page pt-page-1" data-idx=1>
		<?php echo $scene1;?>
	</div>
	<div class="pt-page pt-page-2" data-idx=2>
		<?php echo $scene2;?>
	</div>
	<div class="pt-page pt-page-3" data-idx=3>
		<?php echo $scene3;?>
	</div>
	<div class="pt-page pt-page-4" data-idx=4>
		<div class='container' style='padding-top:7px;overflow-y:auto;height:100%;color:#666;'>
			<h1>我</h1>
		</div>
	</div>


</div>

<?php
	echo $bottomNav;
?>
<?php
	echo $footer;
?>