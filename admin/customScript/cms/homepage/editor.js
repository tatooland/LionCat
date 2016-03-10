console.log($('#webEditor'));
			$(document).ready(function(){
				$("#summernote").summernote({
					height:300,
					onImageUpload:function(files,editor,$editable){
						//console.log(files[0]);
						sendFile(files[0],editor,$editable);
						//$("#imgUpdPluginModal").modal("show");
					},
					codemirror:{
						theme:'monokai'
					}
				});
			});
			function sendFile(file,editor,$editable){
				var data=new FormData();
				data.append("file",file);
				$.ajax({
					type:"POST",
					url:"index.php?route=cms/homepage/uploadImage&token=1",
					data:data,
					cache:false,
					processData:false,
					contentType:false,
					success:function(data){
						console.log(data);
						var obj=eval("("+data+")");
						if(obj.result=="success"){
							//editor.summernote('insertImage',obj.url);
							//alert(obj.result);
							editor.insertImage($editable,obj.url);
						}
					},
					error:function(){
						alert("system error");
					}
				});
			}

