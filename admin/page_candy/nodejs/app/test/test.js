//server
var app=require('http').createServer(handler),
	io=require('socket.io')(app),
	fs=require('fs');

app.listen(1777);

function handler(req,res){
	fs.readFile(__dirname+'/index.html',
			function(err,data){
				if(err){
					err.writeHead(500);
					return res.end("file not found");
				}
				res.writeHead(200);
				res.end(data);
			});
}
var clients={};
io.on('connection',function(client){
	client.on('login',function(data){
		clients[data.id]=client;
		client.emit("login_ok",{result:"online"});
	});
	client.on('sendMsg',function(data){
		var sendTo=data.id;
		var mId=data.mid;
		var msg=data.msg;
		clients[sendTo].emit("receive_ok",{msg:msg});
		clients[mId].emit("send_ok",{msg:msg});
	});
	client.on('disconnect',function(){
		console.log("client disconnect");
	});
});