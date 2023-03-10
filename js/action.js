$(document).ready(function(){
	$("#creaCcc").click(function(event){
		event.preventDefault();
		var fname = $("#fname").val();
		var text2 = $("#lname").val();
		var text3 = $("#pwd").val();
		var text4 = $("#pwd2").val();
		var text5 = $("#aln1").val();
		var text6 = $("#aln2").val();
		var text7 = $("#mobil").val();
		var text8 = $("#email").val();
		var text9 = $("#alNmae").val();
		var text10 = $("#alNumb").val();
		  if(fname ==""){
			alert("FIRSTNAME CANT BE EMPTY");
			return false;
		}if(text2 ==""){
			alert("LASTNAME CANT BE EMPTY");
			return false;
		}if(text3 ==""){
			alert("PASSWORD1 CANT BE EMPTY");
			return false;
		}if(text4 ==""){
			alert("PASSWORD2 CANT BE EMPTY");
			return false;
		}if(text5 ==""){
			alert("ADDRESS LINE 1 CANT BE EMPTY");
			return false;
		}if(text7 ==""){
			alert("PHONE NUMBER CANT BE EMPTY");
			return false;
		}if(text8 ==""){
			alert("EMAIL CANT BE EMPTY");
			return false;
		}
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {Acountcreate:1, fname: fname, text2: text2, text3: text3, text4: text4, text5: text5, text6: text6, text7: text7, text8: text8,text9: text9, text10: text10},
		 success: function(data){
			 if(data.match("go")){
			window.location.href = "seletpaymode.php";
			}else{
				$("#displayEr").html(data);
			}	
		 }
		});
	});
	
	$("#gsend").click(function(event){
		event.preventDefault();
		$.ajax({
		 url : "register3.php",
		 method : "post",
		 data: $("form").serialize(),
		 success: function(data){
			 if(data.match("go")){
			window.location.href = "seletpaymode.php";
			}else{
				$("#displayError").html(data);
			}	
		 }
		});
	});
	
	
	$("#payon").click(function(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {payon: 1},
		 success: function(data){
			$("#disply").html(data);
		 }
		});
	});
	
	$("body").delegate("#subOrders", "click", function(e){
		e.preventDefault();
		alert("gooooooooo");
		return;
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {subOrder: 1},
		 success: function(data){
			 if(data.match("Orderfailed")){
				 alert("Order Has Already Been Submitted Successful!");
			 }else if(data.match("success")){
				 alert("Message_sent_SuccessFully");
				 window.location.href = "pickup.php";
			 }else if(data.match("success2")){
				 alert("Message_sent_SuccessFully");
				 window.location.href = "pickup2.php";
			 }else if(data.match("failed")){
				  alert("Error Please Try again Later");
			 }else{
				 alert("Error sending Text Message");
				 window.location.href = "pickup.php";
			 }
		 }
		});
	});
	
	$("#paym").click(function(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {paym: 1},
		 success: function(data){
			$("#disply").html(data);
		 }
		});
	});
	
	customerOrders();
	function customerOrders(){
	$("#CusOrder").click(function(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {CusOrder: 1},
		 success: function(data){
			$("#adminshow").html(data);
		 }
		});
	});
	}
	
	
	$("body").delegate("#delorder", "click", function(event){
		event.preventDefault();
		var text = $("#serchord").val();
		if(text ==""){
			alert("Ref ID Cant be empty");
			return false;
		}
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {delcusord: 1, text: text},
		 success: function(data){
			$("#displMesage").html(data);
			$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {CusOrder: 1},
		 success: function(data){
			$("#adminshow").html(data);
		 }
		});
		 }
		});
	});
	
	$("#editProfile").click(function(){
	   $.ajax({
		 url : "action.php",
		 method : "post",
		 data: {editProfile: 1},
		 success: function(data){
			$("#showHere").html(data);
		 }
		});
	});
	
	$("body").delegate("#updateProfile","click", function(event){
		event.preventDefault();
		var text3 = $("#padress").val();
		var text4 = $("#pcont").val();
		var text5 = $("#pemail").val();
		var text6 = $("#pebmail").val();
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {updateProfile: 1,text3: text3, text4: text4, text5: text5, text6: text6},
		 success: function(data){
			$("#deleupmsg").html(data);
		 }
		});
		
	});
	
	$("body").delegate("#slidedo","click", function(event){
		event.preventDefault();
		$("#disAkkls").slideToggle();
	});
	
	$("body").delegate("#addAl","click", function(event){
		event.preventDefault();
		var text5 = $("#fulNa").val();
		var text6 = $("#mob").val();
		if(text5 ==""){
			alert("FULL NAME CANT BE EMPTY");
			return false;
		}if(text6 ==""){
			alert("PHONE NUMBER CANT BE EMPTY");
			return false;
		}
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {ADDaETR: 1,text5: text5, text6: text6},
		 success: function(data){
			$("#diplaAlg").html(data);
		 }
		});
	});
	
	$("#genReport").click(function(event){
		event.preventDefault();
	   $.ajax({
		 url : "gemrep.php",
		 method : "post",
		 data: {GenReport: 1},
		 success: function(data){
			$("#adminshow").html(data);
		 }
		});
	});
	
	$("body").delegate("#sdates", "click", function(event){
		event.preventDefault();
		var text1 = $("#kwame").val();
		var text2 = $("#kwames").val();
		$.ajax({
		 url : "gemrep.php",
		 method : "post",
		 data: {GenReport2: 1, text1: text1, text2: text2},
		 success: function(data){
			$("#showRep").html(data);
		 }
		});
	});
	
	$("body").delegate("#UpStaa", "change", function(event){
		event.preventDefault();
		var text = $(this).val();
		var cid = $(this).attr("cid");
		$.ajax({
		 url : "gemrep.php",
		 method : "post",
		 data: {upcustom: 1, text: text, cid: cid},
		 success: function(data){
			alert(data);
			$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {CusOrder: 1},
		 success: function(data){
			$("#adminshow").html(data);
		 }
		});
		 }
		});
	});
	
	$(".UpStaaaaaaa").on("change",function(){
		var text = $(this).val();
		var cid = $(this).attr("cid");
		alert("go");
		/*$.ajax({
		 url : "gemrep.php",
		 method : "post",
		 data: {upcustom: 1, text: text, cid: cid},
		 success: function(data){
			alert(data);
			if(text.match("0")){
				$("#curntstst").html('<a href="#" class="btn btn-info btn-sm pull-right" >Processing</a>');
			}if(text.match("1")){
				$("#curntstst").html('<a href="#" class="btn btn-success btn-sm pull-right" >Completed</a>');
			}if(text.match("2")){
				$("#curntstst").html('<a href="#" class="btn btn-default btn-sm pull-right" >Ready For Pickup</a>');
			}if(text.match("3")){
				$("#curntstst").html('<a href="#" class="btn btn-danger btn-sm pull-right" >Cancelled</a>');
			}
		 }
		});*/
		
		
	});
	
	
})