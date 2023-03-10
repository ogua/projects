$(document).ready(function(){                 						
	$(".publish").click(function(){
		var cid = $(this).attr("cid"); 
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {Publish: 1, cid: cid},
		 success: function(data){
			$("#displayresults").html(data);
		 }
		});
	});
	$(".deleteit").click(function(){
		var cid = $(this).attr("cid"); 
		 $.ajax({
		 url : "action.php",
		 method : "post",
		 data: {deleteit: 1, cid: cid},
		 success: function(data){
			$("#displayresults").html(data);
		 }
		});
	});
	
	$(".delekey").click(function(){
		var cid = $(this).attr("cid"); 
		 $.ajax({
		 url : "action.php",
		 method : "post",
		 data: {deleteUes: 1, cid: cid},
		 success: function(data){
			 if(data.match("Successfully")){
				 window.location.href = "profile.php";
			 }else{
				$("#displayresults").html(data); 
			 }
			
		 }
		});
	});
						
})