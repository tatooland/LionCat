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
<script type="text/javascript">
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
		pages=main.children("div.pt-page");
		
		pages.each(function(){
			var $page=$(this);
			$page.data("originalClassList",$page.attr('class'));
		});
		
		pages.eq(0).addClass('pt-page-current');
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
	}
</script>