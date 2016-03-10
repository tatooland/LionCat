<?php
if(!isset($debug)){
	$debug=true;
}
?>
<script type='text/javascript' src='http://res.wx.qq.com/open/js/jweixin-1.0.0.js'></script>
<script type='text/javascript'>
wx.config({
	debug:false,
	appId:'<?php echo $appid;?>',
	timestamp:<?php echo $timestamp;?>,
	nonceStr:'<?php echo $nonceStr;?>',
	signature:'<?php echo $signature?>',
	jsApiList:[<?php echo $jsApiList;?>]
});
wx.ready(function(){
	/*
	wx.onMenuShareTimeline({
		title:"",
		link:"",
		imgUrl:"",
		success:function(){
		},
		cancel:function(){
		}
	});
	wx.onMenuShareAppMessage({
		title:'',
		desc:'',
		link:'',
		imgUrl:'',
		type:'',
		dataUrl:'',
		success:function(){},
		cancel:function(){}
	});
	wx.onMenuShareQQ({
		title:'',
		desc:'',
		link:'',
		imgUrl:'',
		success:function(){},
		cancel:function(){}
	});
	wx.onMenuShareWeibo({
		title:'',
		desc:'',
		imgUrl:'',
		success:function(){},
		cancel:function(){}
	});
	wx.chooseImage({
		count:1,
		sizeType:['orignal','compressed'],
		sourceType:['album','camera'],
		success:function(res){
			var localIds=res.localIds;
		}
	});
	wx.previewImage({
		current:'',
		urls:[]
	});
	wx.uploadImage({
		localId:"",
		isShowProgressTips:1,
		success:function(res){
			var serverId=res.serverId;
		}
	});
	wx.downloadImage({
		serverId:'',
		isShowProgerssTips:1,
		success:function(res){
			var localId=res.localId;
		}
	});
	wx.startRecord();
	wx.stopRecord({
		success:function(res){
			var localId=res.localId;
		}
	});
	wx.onVoiceRecordEnd({
		complete:function(res){
			var localId=res.localId;
		}
	});
	wx.playVoice({
		localId:''
	});
	wx.pauseVoice({
		localId:''
	});
	wx.stopVoice({
		localId:''
	});
	wx.onVoicePlayEnd({
		success:function(res){
			var localId=res.localId;
		}
	});
	wx.uploadVoice({
		localId:"",
		isShowProgressTips:1,
		success:function(res){
			var serverId=res.serverId;
		}
	});
	wx.downloadVoice({
		serverId:'',
		isShowProgressTips:1,
		success:function(res){
			var localId=res.localId;
		}
	});
	wx.translateVoice({
		localId:'',
		isShowProgressTips:1,
		success:function(res){
			alert(res.translateResult);
		}
	});*/

/*
	wx.hideMenuItems({
		menuList:[]
	});
	wx.showMenuItems({
		menuList:[]
	});
*/
});

function getNetworkType(){
	wx.getNetworkType({
		success:function(res){
			var networkType=res.networkType;//2g 3g 4g wifi
			alert(networkType);
		}
	});
}
var localImgs=undefined;
var remoteImgs=undefined;
function chooseImage(){
	wx.chooseImage({
		count:9,
		sizeType:['orignal','compressed'],
		sourceType:['album','camera'],
		success:function(res){
			localImgs=res.localIds;
			chooseImageHandle();
		}
	});
}

function openLocation(){
	wx.openLocation({
		latitude:0,
		longitude:0,
		name:'',//位置名称
		address:'',
		scale:1,
		infoUrl:''
	});
}
function getLocation(){
	wx.getLocation({
		type:'wgs84',
		success:function(res){
			var latitude=res.latitude;
			var longitude=res.longitude;
			var speed=res.speed;
			var accuracy=res.accuracy;
			alert("latitude: "+latitude+";longtitude: "+longitude+";speed "+speed);
		}
	});
}
function scanQRCode(){
	wx.scanQRCode({
		needResult:0,
		scanType:['qrCode','barCode'],
		success:function(res){
			var result=res.resultStr;
			alert(result);
		}
	});
}

var currentIdx=0;
var remoteImgsStr="";
function uploadImage(){
	if(currentIdx<localImgs.length){
		wx.uploadImage({
			localId:localImgs[currentIdx],
			success:function(res){
				//uploadImageHandle(res.serverId);
				remoteImgsStr+=res.serverId+",";
				currentIdx+=1;
				uploadImage();
			}
		});
	}else{
		uploadImageHandle();
	}
}
var currentChooseIdx=0;
function chooseImageHandle(){

	if(currentChooseIdx<localImgs.length){
		//alert(localImgs[currentChooseIdx]);
		$("#"+imgContainerId).append("<div class='col-xs-4 col-sm-4' style='margin-top:5px;'><img  src='"+localImgs[currentChooseIdx]+"' class='img-responsive'></div>");
		currentChooseIdx+=1;
		chooseImageHandle();
	}
}
/*
function uploadImageHandle(serverId){
	alert(serverId);
}*/
</script>
