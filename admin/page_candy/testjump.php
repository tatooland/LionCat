<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title>page transition</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="page_candy/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
	<link href="page_candy/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<script src="page_candy/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="page_candy/jsplug/flexslider/flexslider.css" type="text/css" media="screen" />
	<link href="page_candy/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
	<script src="page_candy/datetimepicker/moment.js" type="text/javascript"></script>
	<script src="page_candy/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
	<link href="page_candy/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
	<link href="page_candy/page_transitions/css/default.css" type="text/css" rel="stylesheet" media="screen"/>
	<link href="page_candy/page_transitions/css/component.css" type="text/css" rel="stylesheet" media="screen"/>
	<link href="page_candy/page_transitions/css/animations.css" type="text/css" rel="stylesheet" media="screen"/>
	
		<style type="text/css">
			html,body{
				height:100%;
				padding:0px;
				margin:0px;
			}
			.perspective{
				position:100%;
				width:100%;
				height:100%;
				-webkit-perspective:1200px;
				-moz-perspective:1200px;
				perspective:1200px;
			}
			.page{
				width:100%;
				height:100%;
				position:absolute;
				top:0px;
				left:0px;
				visibility:hidden;
				overflow:hidden;
				-webkit-backface-visibility:hidden;
				-moz-backface-visibility:hidden;
				backface-visibility:hidden;
				-webkit-transform:translate3d(0,0,0);
				-moz-transform:translate3d(0,0,0);
				transform:translate3d(0,0,0);
				-webkit-transform-style:preserve-3d;
				-moz-transform-style:preserve-3d;
				transform-style:preserve-3d;	
			}
			.current{
				visibility:visible;
				z-index:1;
			}
			.page-0{
				background-color:#fd6a62;
			}
			.page-1{
				background-color:#0ac2d2;
			}
			.page-2{
				background-color:#7bb7fa;
			}
			.page-3{
				background-color:#60d7a9;
			}
			.page-4{
				background-color:#fdc162;
			}
			.page-5{
				background-color:#fd6a62;
			}
			.phide{
				visibility:hidden;
			}

			.scene{
				position:absolute;
				top:0px;
				left:0px;
				-webkit-backface-visibility:hidden;
				-moz-backface-visibility:hidden;
				backface-visibility:hidden;
				-webkit-transform:translate3d(0,0,0);
				-moz-transform:translate3d(0,0,0);
				transform:translate3d(0,0,0);
				-webkit-transform-style:preserve-3d;
				-moz-transform-style:preserve-3d;
				transform-style:preserve-3d;
				width:100%;
				height:100%;
				visibility:hidden;
			}
			.pshow{
				
				visibility:visible;
				z-index:1;
			}
		</style>
	</head>
	<body>
		 <div id="pt-main" class="perspective">
			<div class="scene scene-0">
				<div class="page page-0">
					<h1>scene 1-1</h1>
					<!-- <input id='sceneChange' data-scene="1"  type="button" class="btn btn-default btn-danger" value="button"> -->
					<input class="transBtn btn btn-default btn-danger" data-sidx="1" data-idx="1" value="切换"> 
				</div>
				<div class="page page-1">
					<h1>scene 1-2</h1>
				</div>
				<div class="page page-2">
					<h1>scene 1-3</h1>
				</div>
				<div id='footer' style='height:48px;background-color: #fff;border-top:1px solid #888;padding-top:2px;' class='navbar-fixed-bottom'>
	<div class='row'>
		<div id='transBtn1' data-idx="1" class='col-xs-3 text-center transBtn' style='font-size:20px;background-color: #fff;color:#888;'>
			<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
		</div>
		<div id='transBtn2' data-idx="2" class='col-xs-3 text-center transBtn' style='font-size:20px;background-color: #fff;color:#888;'>
			<span class="glyphicon glyphicon-send" aria-hidden="true"></span>
		</div>
		<div id='transBtn3' data-idx="3" class='col-xs-3 text-center transBtn' style='font-size:20px;background-color: #fff;color:#888;'>
			<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
		</div>
		<div id='transBtn4' data-idx="4" class='col-xs-3 text-center transBtn' style='font-size:20px;background-color: #fff;color:#888;'>
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		</div>
	</div>
	<div class='row'>
		<div id='transBtn' class='col-xs-3 text-center'  style='font-size:12px;background-color: #fff;color:#888;'>
			微信
		</div>
		<div id='transBtn' class='col-xs-3 text-center' style='font-size:12px;background-color: #fff;color:#888;'>
			通讯录
		</div>
		<div id='transBtn' class='col-xs-3 text-center' style='font-size:12px;background-color: #fff;color:#888;'>
			发现
		</div>
		<div id='transBtn' class='col-xs-3 text-center' style='font-size:12px;background-color: #fff;color:#888;'>
			我
		</div>
	</div>
</div>
			</div>
			<div class="scene scene-1">
				<div class="page page-0 ">
					<h1>scene 2-1</h1>
					<p>here is page 0</p>
				</div>
				<div class="page page-1">
					<h1>scene 2-2</h1>
					<input class="transBtn btn btn-default btn-warning" data-sidx="1" data-idx="2" value="切换"> 					
				</div>
				<div class="page page-2">
					<h1>scene 2-3</h1>					
				</div>
			</div>
		</div>
		<script src="page_candy/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script src="page_candy/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="page_candy/datetimepicker/moment.js" type="text/javascript"></script>
		<script src="page_candy/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="page_candy/page_transitions/js/modernizr.custom.js"></script>
		<script src="page_candy/page_transitions/js/jquery.dlmenu.js" type="text/javascript"></script>
		<script type="text/javascript" src="pagejump.js"></script>
		<!-- <script src="page_candy/page_transitions/js/pagetransitions.js" type="text/javascript"></script> -->
	<script type="text/javascript">
	/*
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

		var animEndEventNames={
				'WebkitAnimation':'webkitAnimationEnd',
				'OAnimation':'oAnimationEnd',
				'msAnimation':'MSAnimationEnd',
				'animation':'animationend'
		};
		var animEndEventName;
		var isAnimating=false;
		var main;
		var pages;
		var currPage,nextPage;
		var endCurrPage=false;
		var endNextPage=false;
		var outClass,inClass;
		var currPageIdx=0;
	
		window.onload=function(){
	
			animEndEventName=animEndEventNames[Modernizr.prefixed('animation')];
	
			main=$("#pt-main");
			pages=main.children("div.page");
			
			pages.each(function(){
				var $page=$(this);
				$page.data("originalClassList",$page.attr('class'));
			});
			
			pages.eq(0).addClass('pt-page-current');
			$("#sceneChange").on('click',function(){
				alert("hello");
			});
			$(".transBtn").on('click',function(){
				if(parseInt($(this).data('idx'))==(currPageIdx+1)){
					return false;
				}
				if(isAnimating){
					return false;
				}
	
				currPage=pages.eq(currPageIdx);
				var tempIdx=parseInt($(this).data('idx'));
				tempIdx--;
				nextPage=pages.eq(tempIdx);
				
				nextPage.addClass('pt-page-current');
				if(tempIdx>currPageIdx){
					outClass='pt-page-moveToLeft';
					inClass='pt-page-moveFromRight';
				}else{
					outClass='pt-page-moveToRight';
					inClass='pt-page-moveFromLeft';
				}
				
				
				
				currPageIdx=tempIdx;
				
				currPage.addClass(outClass).on(animEndEventName,function(){
					currPage.off(animEndEventName);
					endCurrPage=true;
					if(endNextPage){
						onEndAnimation(currPage,nextPage);
					}
					
				});
				
				nextPage.addClass(inClass).on(animEndEventName,function(){
					nextPage.off(animEndEventName);
					endNextPage=true;
					if(endCurrPage){
						onEndAnimation(currPage,nextPage);
					}
				});
			});
		}
		function onEndAnimation(op,ip){
			endCurrPage=false;
			endNextPage=false;
			resetPage(op,ip);
			isAnimating=false;
		}
		function resetPage(op,ip){
			op.attr("class",op.data('originalClassList'));
			ip.attr("class",ip.data('originalClassList')+" pt-page-current");
		}*/
	</script>

</body>
</html>