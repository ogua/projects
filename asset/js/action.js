$('document').ready(function(){
	//image select and show scripts
	$(document).on("change","#InputFile",function(e){
		e.preventDefault();
		showImages(this);
	});
	function showImages(input){
		if(input.files && input.files[0]){
			var imagetype = input.files[0].type;
			var imageExt = ["image/jpeg","image/png","image/gif"];
			if(!((imagetype==imageExt[0]) || (imagetype==imageExt[1]) || (imagetype==imageExt[2]) )){
			 alert("File is not a valid Image");
			}else{
				var reader = new FileReader();
				reader.onload = function(e){
					$("#imgs").attr("src",e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
		  }
							
		}
						
  }
  
  //Form Reference Script
	$(document).on("submit","#submit", function(e){
		e.preventDefault();
		//alert("tested");
		$.ajax({
			url: '',
			type: 'POST',
			contentType: false,
			processData: false,
			cache: false,
			data: new FormData(this),
			success: function(data){
			   if(data.match("success")){
				 alert("");
				 window.location.href="#";
			   }else{
				 alert(data);	
			   }
			}
		});
	});
	
	
	//Delect  Script
	$(document).on("click","#delect", function(e){
		e.preventDefault();
		//alert("tested");
		var cid = $(this).attr("cid");
		if(confirm("Are you sure you want to delect this #")){
			$.ajax({
				url: '',
				method: 'Post',
				data: {DelProg: 1, cid: cid},
				success: function(data){
					if(data.match("sucess")){
						alert("");
						window.location.href="#";
					}else if("Failed"){
						alert("Failed to Execute Action");
					}else{
						alert(data);
					}
				}
			});
		}		
	});
	
	
	//Print Script
	$(document).on("click","#print", function(e){
		e.preventDefault();
		//alert("goooo");
		var mode = 'iframe'; // popup
        var close = mode == "popup";
        var options = { mode : mode, popClose : close};
        $("#printArea").printArea(options);		
	});
	
	
	//alert('goo');
})