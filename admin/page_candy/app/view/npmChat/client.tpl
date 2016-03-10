<?php
	echo $header;
?>
<style>
	body{
		background-color:#eee;
	}
</style>
<div class="container">
	<div id='msgbox'>
		<br>

	</div>
	<br>
	<br>
	<br>
</div>
<div id='footer' style='background-color: #fff;border-top:1px solid #888;padding:2px;' class='navbar-fixed-bottom'>
	<div class="input-group">
	  <input id='say' type="text" class="form-control" aria-label="..." placeholder="说点什么...">
	  <div class="input-group-btn">
	    <input onclick='smsg()' type="button" class="btn btn-default" value='发送'>
	  </div>
	</div>
</div>
<script type="text/javascript" src="http://192.168.9.100/mini/nodejs/node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script>
<script type="text/javascript">
	var sendTpl="<div class='media right-block' style='width:70%;float:right'>"+
		  			"<div class='media-body text-right' style='padding-top:10px;'>"+
    					"<div style='padding:8px 10px 8px 10px;border-radius:6px;background:#8BC34A;color:#000;border:1px solid #aaa;width:auto;height:auto;float:right;text-align:left;'>"+
    					"$$$MSG$$$"+
    					"</div>"+
	  				"</div>"+
	  				"<div class='media-right'>"+
	    				"<a href='#'>"+
	      					"<img class='media-object img-rounded' src='$$$IMG$$$' style='width:55px;height:55px;'>"+
	    				"</a>"+
	  				"</div>"+
				"</div>"+
				"<br>";
	var receiveTpl="<div class='media left-block' style='width:70%;flat:left;'>"+
		  				"<div class='media-left'>"+
    						"<a href='#'>"+
      							"<img class='media-object' src='$$$IMG$$$' style='width:55px;height:55px;' alt='...'>"+
    						"</a>"+
  						"</div>"+
  						"<div class='media-body' style='padding-top:10px;'>"+
    						"<div style='padding:8px 10px 8px 10px;border-radius:6px;background:#fff;border:1px solid #aaa;color:#000;width:auto;height:auto;float:left;'>"+
    							"$$$MSG$$$"+
    						"</div>"+
  						"</div>"+
					"</div>"+
					"<br>";
	var myImg="<?php echo $myImg;?>";
	var otherImg="<?php echo $otherImg;?>";
	
	var server=io("http://192.168.9.100:1777");
	server.on('login_ok',function(data){
		alert(data.result);
	});
	server.on('receive_ok',function(data){
		$("#msgbox").append(warpMsg(false,otherImg,data.msg));
	});
	server.on("send_ok",function(data){
		$("#msgbox").append(warpMsg(true,myImg,data.msg));
	});
	
	var mId=<?php echo $mid;?>;
	function login(){
		server.emit("login",{id:mId});
	}
	var sendTo=<?php echo $oid;?>;
	function sendMsg(msg){
		server.emit("sendMsg",{mid:mId,id:sendTo,msg:msg});
	}
	function warpMsg(sendFlag,headImg,msg){
		var str="";
		if(sendFlag){
			str=sendTpl.replace("$$$IMG$$$",headImg);
			str=str.replace("$$$MSG$$$",msg);
			return str;
		}else{
			str=receiveTpl.replace("$$$IMG$$$",headImg);
			str=str.replace("$$$MSG$$$",msg);
			return str;
		}
	}
	login();
</script>
<script type="text/javascript">
	function smsg(){
		var content=$("#say").val();
		if(content!=""){
			sendMsg(content);
		}
	}
</script>
<?php
	echo $footer;
?>