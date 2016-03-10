var animEndEventNames={
		'WebkitAnimation':'webkitAnimationEnd',
		'OAnimation':'oAnimationEnd',
		'msAnimation':'MSAnimationEnd',
		'animation':'animationend'
};

var animEndEventName;
var isAnimating=false;
var main;
var scenes;
var pages;
var currScene,nextScene;
var currPage,nextPage;
var endCurrPage=false;
var endNextPage=false;
var endCurrScene=false,endNextScene=false;
var outClass,inClass;
var currSceneIdx=0;
var currPageIdx=0;

window.onload=function(){
	animEndEventName=animEndEventNames[Modernizr.prefixed('animation')];
	main=$("#pt-main");
	scenes=main.children("div.scene");
	pages=main.children("div.page");
	
	scenes.each(function(){
		var $scene=$(this);
		$scene.data("originalClassList",$scene.attr("class"));
		pages=$scene.children("div.page");
		console.log($scene.data("originalClassList"));
		pages.each(function(){
			var $page=$(this);
			$page.data("originalClassList",$page.attr("class"));
			//console.log($page.data("originalClassList"));
		});
	});
	
	/*
	pages.each(function(){
		var $page=$(this);
		$page.data("originalClassList",$page.attr("class"));
			
	});*/

	
	var csc=scenes.eq(currSceneIdx);
	csc.addClass('current');
	var cp=csc.children("div.page").eq(currPageIdx);
	cp.addClass('current');
	
	/*
	 * <input type="button" value="goto">
	 * */
	$(".transBtn").on('click',function(){
		//判断当前场景是否相同
		if(parseInt($(this).data('sidx'))==currSceneIdx || $(this).data('sidx')==""){
			
			//不需要跳转场景时
			if(parseInt($(this).data('idx'))==currPageIdx){
				return false;
			}
			if(isAnimating){
				return false;
			}
			pages=scenes.eq(currSceneIdx).children("div.page");
			currPage=pages.eq(currPageIdx);
			var tempIdx=parseInt($(this).data('idx'));
			nextPage=pages.eq(tempIdx);
			nextPage.addClass('current');
			//alert("tempIdx:"+tempIdx+",currPageIdx:"+currPageIdx);
			if(tempIdx>currPageIdx){
				outClass="pt-page-moveToLeft";
				inClass="pt-page-moveFromRight";
			}else{
				outClass="pt-page-moveToRight";
				inClass="pt-page-moveFromLeft";
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
		}else{

			//需要跳转不同的场景
			if(isAnimating){
				return false;
			}
			currScene=scenes.eq(currSceneIdx);
			currPage=currScene.children("div.page").eq(currPageIdx);
			
			//console.log(currScene);
			//console.log(currPage);
			var tempSceneIdx=parseInt($(this).data('sidx'));
			var tempPageIdx=parseInt($(this).data('idx'));
			
			nextScene=scenes.eq(tempSceneIdx);
			nextPage=nextScene.children("div.page").eq(tempPageIdx);
			

			
			nextScene.addClass("current");
			nextPage.addClass('current');
			
			if(tempIdx>currPageIdx){

				outClass='pt-page-moveToLeftFade';
				inClass='pt-page-moveFromRightFade';
			}else{
				outClass='pt-page-moveToRightFade';
				inClass='pt-page-moveFromLeftFade';
			}
			
			currSceneIdx=tempSceneIdx;
			currPageIdx=tempPageIdx;
			

			
			currScene.addClass(outClass).on(animEndEventName,function(){
				currScene.off(animEndEventName);
				endCurrScene=true;

				if(endNextScene){
					
					onEndAnimationScene(currScene,nextScene,currPage,nextPage);
				}
			});
			
			nextScene.addClass(inClass).on(animEndEventName,function(){
				nextScene.off(animEndEventName);
				endNextScene=true;

				if(endCurrScene){
					
					onEndAnimationScene(currScene,nextScene,currPage,nextPage);
				}
			});
		}
	});
}
function onEndAnimationScene(cs,ns,cp,np){
	endCurrPage=false;
	endNextPage=false;
	endCurrScene=false;
	endNextScene=false;
	resetPage(cp,np);
	resetScene(cs,ns);
	isAnimating=false;

}

function onEndAnimation(op,ip){
	endCurrPage=false;
	endNextPage=false;
	resetPage(op,ip);
	isAnimating=false;
}

function resetScene(cs,ns){
	cs.attr("class",cs.data('originalClassList'));
	ns.attr("class",ns.data("originalClassList")+" current");
}

function resetPage(op,ip){
	op.attr("class",op.data('originalClassList'));
	ip.attr("class",ip.data('originalClassList')+" current");
}
