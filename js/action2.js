$(document).ready(function(){
	$("#buyer").click(function(e){
		e.preventDefault();
		$("#duyerdisplay").toggle(2000);
		$("#seller").toggle(1000);
	});
	
	$("#seller").click(function(e){
		e.preventDefault();
		$("#sellerdisplay").toggle(2000);
		$("#buyer").toggle(1000);
	});
	
	
	$("#duyerdisplay").on("submit",function(e){
		e.preventDefault();
		$.ajax({
		 url : "buyersigup.php",
		 method : "POST",
		 contentType: false,
		 processData: false,
		 cache: false,
		 data: new FormData(this),
		 success: function(data){
			 if(data.match("EmailError")){
				 alert("Email Already Exit, Try a different email");
			 }else if(data.match("passnotmatch")){
				 alert("Password does not match");
			 }else if(data.match("ferror")){
				 alert("First name must start with upper case letter and cant contain numbers");
			 }else if(data.match("lasterr")){
				 alert("Last name must start with upper case letter and cant contain numbers");
			 }else if(data.match("Registered")){
				 alert("Registered_Successfully");
				 window.location.href="registration.php";
			 }else if(data.match("Error")){
				 alert("Error, Please Try again Later !");
			 }
			
		 }
		});
	});
	
	$("#duyerdisplay2").on("submit",function(e){
		e.preventDefault();
		$.ajax({
		 url : "buyersigup.php",
		 method : "POST",
		 contentType: false,
		 processData: false,
		 cache: false,
		 data: new FormData(this),
		 success: function(data){
			 if(data.match("EmailError")){
				 alert("Email Already Exit, Try a different email");
			 }else if(data.match("passnotmatch")){
				 alert("Password does not match");
			 }else if(data.match("ferror")){
				 alert("First name must start with upper case letter and cant contain numbers");
			 }else if(data.match("lasterr")){
				 alert("Last name must start with upper case letter and cant contain numbers");
			 }else if(data.match("Registered")){
				 alert("Registered_Successfully");
				 window.location.href="paymentmode.php";
			 }else if(data.match("Error")){
				 alert("Error, Please Try again Later !");
			 }
			
		 }
		});
	});
	
	$("#sellerdisplay").on("submit",function(e){
		e.preventDefault();
		$.ajax({
		 url : "sellersignup.php",
		 method : "POST",
		 contentType: false,
		 processData: false,
		 cache: false,
		 data: new FormData(this),
		 success: function(data){
			 if(data.match("EmailError")){
				 alert("Mobile Number Already Exit, Try a different Number");
			 }else if(data.match("passnotmatch")){
				 alert("Password does not match");
			 }else if(data.match("ferror")){
				 alert("First name must start with upper case letter and cant contain numbers");
			 }else if(data.match("lasterr")){
				 alert("Last name must start with upper case letter and cant contain numbers");
			 }else if(data.match("Registered")){
				 alert("Registered_Successfully");
				 window.location.href="registration.php";
			 }else if(data.match("Error")){
				 alert("Error, Please Try again Later !");
			 }
			
		 }
		});
	});
	
	function loadcart(){
		getnumCart();
		CheckOutGrandTotal();
		setTimeout(function(){
		timercart();
		},2000);
	}
	
	function timercart(){
		setTimeout(function(){
		loadcart();
		},2000);
	}
	timercart();
	
getCategory();
	function getCategory(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getCategory:1},
		 success: function(data){
			$("#getCate").html(data);
		 }
		});
	}
	
	getCategory2();
	function getCategory2(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getCategory2:1},
		 success: function(data){
			$("#getCate2").html(data);
		 }
		});
	}
	
	getBrand();
	function getBrand(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getBrand:1},
		 success: function(data){
			$("#getbrand").html(data);
		 }
		});
	}
	getProducts();
	function getProducts(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getProd:1},
		 success: function(data){
			$("#getProct").html(data);
		 }
		});
	}
	 	
	
	$("body").delegate(".getbrands", "click", function(){
		var cid = $(this).attr("cid");
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getbrands:1 , cid: cid},
		 success: function(data){
			$("#getProct").html(data);
		 }
		});
	});
	
	
	$("#search_btn").click(function(e){
		e.preventDefault();
		var text1 = $("#search_text").val();
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {text1: text1},
		 success: function(data){
			 if(data.match("failed")){
				 alert("No results found, Try Again");
				 window.location.href="index.php";
			 }else{
				 $("#getProct").html(data);
			 }
		 }
		});
	});
	
	$("#send").click(function(event){
		event.preventDefault();
		$.ajax({
		 url : "register.php",
		 method : "post",
		 data: $("form").serialize(),
		 success: function(data){
			$("#displayError").html(data);
		 }
		});
	});
	
	
	$("#login").click(function(event){
		event.preventDefault();
		var text1 = $("#email").val();
		var text2 = $("#pass").val();
		var text3 = $("#status").val();
		$.ajax({
		 url : "Qlogin.php",
		 method : "post",
		 data: {text1:text1, text2:text2, text3:text3},
		 success: function(data){
			if(data == "sell"){
			window.location.href = "profile.php";
			}else if(data == "buy"){
			window.location.href = "profile2.php";
			}else if(data == "admin"){
			window.location.href = "admin.php";
			}else{
				alert(data);
			}
			
		 }
		});
	});
	
	getnumCart();
	function getnumCart(){
	var genid = $("#genNum").val();
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getnumCart:1, genid: genid},
		 success: function(data){
			$("#bage").html(data);
		 }
		});
	}
	
	
	
	CheckOut();
	function CheckOut(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {CheckOut:1},
		 success: function(data){
			$("#customercheckedOut").html(data);
		 }
		});
	}
	
	
	$(".updatetots").on("keyup",function(){
		var cid = $("#prdctid").val();
		var tot = $("#key-"+cid).val();
		var text = parseInt(tot);
		alert(cid+text);
		if(text > 0){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {updakey:1, cid: cid, text: text},
		 success: function(data){
			$("#showtot-"+cid).text(data);
			CheckOutGrandTotal();
		 }
		});	 
		}else{
			//alert("zero");
		var text = 1;
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {updakey:1, cid: cid, text: text},
		 success: function(data){
			$("#showtot-"+cid).text(data);
			CheckOutGrandTotal();
		 }
		});	 
		}		 
		
	});
	
	$("body").delegate(".updatetot", "keyup", function(){
		var cid = $(this).attr("cid");
		var tot = $("#key-"+cid).val();
		var text = parseInt(tot);
		if(text > 0){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {updakey:1, cid: cid, text: text},
		 success: function(data){
			$("#showtot-"+cid).text(data);
			CheckOutGrandTotal();
		 }
		});	 
		}else{
			//alert("zero");
		var text = 1;
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {updakey:1, cid: cid, text: text},
		 success: function(data){
			$("#showtot-"+cid).text(data);
			CheckOutGrandTotal();
		 }
		});	 
		}		 
	});
	
	$("body").delegate(".delekey", "click", function(event){
	     event.preventDefault();
		 var cid = $(this).attr("cid");	
		 $.ajax({
		 url : "action.php",
		 method : "post",
		 data: {delekey:1, cid: cid},
		 success: function(data){
			$("#deleupmsg").html(data);
			CheckOut();
			getnumCart();
			CheckOutGrandTotal();
		 }
		});	 
	});
	
	$("body").delegate(".updakey", "click", function(event){
	     event.preventDefault();
		 var cid = $(this).attr("cid");	
		 var text = $("#key-"+cid).val();
		 var text2 = $("#key2-"+cid).val();
		 var text3 = $("#key3-"+cid).val();
		  $.ajax({
		 url : "action.php",
		 method : "post",
		 data: {updakey:1, cid: cid, text: text, text2: text2, text3: text3},
		 success: function(data){
			$("#deleupmsg").html(data);
			CheckOut();
			CheckOutGrandTotal();
		 }
		});	 
	});
	
	CheckOutGrandTotal();
	function CheckOutGrandTotal(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {CheckOutGrandTotal:1},
		 success: function(data){
			$(".getGrandtotal").html(data);
		 }
		});
	}
	
	setPages();
	function setPages(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {setPageno:1},
		 success: function(data){
			$("#pageno").html(data);
		 }
		});
	}
	
	$("body").delegate("#Page","click",function(){
		var id = $(this).attr("page");
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getProd: 1, setPages:1, id: id},
		 success: function(data){
			$("#getProct").html(data);
			$("#dispcatName").html("Products");
		 }
		});
	});
	
	$("#addbook").click(function(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {addbook: 1},
		 success: function(data){
			$("#adminshow").html(data);
		 }
		});
	});
	
	$("body").delegate("#add_Error","click", function(){
		var buktitle = $("#lname").val();
		var bukcat = $("#cat").val();
		var bukisbn = $("#pwd").val();
		var bukAut = $("#pwd2").val();
		var bukpx = $("#aln1").val();
		var bukdec = $("#drudpre").val();
		var bukimg = $("#mobil").val();
		if(buktitle ==""){
			alert("Book Title cant be empty");
			return false;
		}if(bukcat ==""){
			alert("Book Category cant be empty");
			return false;
		}if(bukAut ==""){
			alert("Book Author cant be empty");
			return false;
		}if(bukpx ==""){
			alert("Book Price cant be empty");
			return false;
		}if( bukimg ==""){
			alert("Book Image Url cant be empty");
			return false;
		}
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: $("form").serialize(),
		 success: function(data){
			$("#displMesage").html(data);
		$("#lname").val("");
		$("#cat").val("");
		$("#pwd").val("");
		$("#pwd2").val("");
		$("#aln1").val("");
		$("#drudpre").val("");
		$("#mobil").val("");
		 }
		});
	});
	
	
	
	
	Addbuks();
	function Addbuks(){
	$("#addbooks").click(function(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {Addbukks: 1},
		 success: function(data){
			$("#adminshow").html(data);
		 }
		});
	});
	}
	
	delbuks();
	function delbuks(){
	$("#delbuks").click(function(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {delBooks: 1},
		 success: function(data){
			$("#adminshow").html(data);
		 }
		});
	});
	}
	
	
	$("body").delegate(".deleBUK","click", function(event){
		event.preventDefault();
		var cid = $(this).attr("cid");
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {delBok: 1, cid: cid},
		 success: function(data){
		 delbuk2();		
		 }
		});
	});
	
	$("#orderse").click(function(){
	   var text2 = $("#ordersetext").val();
	   $.ajax({
		 url : "action.php",
		 method : "post",
		 data: {CustmerOrder: 1, text2: text2},
		 success: function(data){
			$("#adminshow").html(data);
		 }
		});
	});
	
	$("body").delegate("#sendmail","click", function(event){
		event.preventDefault();
		var temail = $("#emaile").val();
		var tsub  = $("#subj").val();
		var tmsg = $("#msg").val();
		if(temail ==""){
			alert("Email Cant Be Empty");
			return false;
		}if(tsub ==""){
			alert("Subject Cant Be Empty");
			return false;
		}if(tmsg ==""){
			alert("Message Cant Be Empty");
			return false;
		}
		  $.ajax({
		 url : "action.php",
		 method : "post",
		 data: {Sendmailss: 1, temail: temail, tsub: tsub, tmsg: tmsg},
		 success: function(data){
			showMailSent();
		 }
		});
	});
	
	$("body").delegate("#deteCusOrder","click", function(event){
		 var text3 = $("#ordersetext").val();
		event.preventDefault();
		 $.ajax({
		 url : "action.php",
		 method : "post",
		 data: {deteleCusOrder: 1, text3: text3},
		   success: function(data){
		   $("#displMesage").html(data);
			showCustomerOrderDelete();
		 }
		});
	});
	
	function showMailSent(){
		$("#mespop").fadeIn(2000).fadeOut(4000);
	}
	function showCustomerOrderDelete(){
		$("#mesdelte").fadeIn(2000).fadeOut(4000);
	}
	
	$("body").delegate(".getCateg", "click", function(){
		var cid = $(this).attr("cid");
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getCateg:1 , cid: cid},
		 success: function(data){
			$("#getProct").html(data);
			$("#pageno").fadeOut(2000);
		 }
		});
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getCategName:1 , cid: cid},
		 success: function(data){
			$("#dispcatName").html(data);
		 }
		});
	});
	
	$("body").delegate("#cathead","click", function(event){
		event.preventDefault();
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getProd:1},
		 success: function(data){
			$("#getProct").html(data);
			$("#dispcatName").html("");
			$("#pageno").fadeIn(2000);
		 }
		});
	});
	
	$("#search_text").keyup(function(event){
		if(event.which == 13){
			var Entertext = $("#search_text").val();
			$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {Entertext: Entertext},
		 success: function(data){
			$("#getProct").html(data);
		 }
		});
		}
	});
	
	
	getgenrate();
	function getgenrate(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getgenrate:1},
		 success: function(data){
			$("#genNum").val(data);
		 }
		});
	}
	
	getCart();
	function getCart(){
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {getCart:1},
		 success: function(data){
			$("#getCart").html(data);
		 }
		});
	}
	
	$("body").delegate(".insercart", "click", function(){
			var cid = $(this).attr("cid");
			var gemnid = $("#genNum").val();
			$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {insercart:1, cid:cid, gemnid: gemnid},
		 success: function(data){
			 alert(data);
			 getnumCart();
			 getCart();
		 }
		});
	});
	
	$("body").delegate(".editBUK","click", function(event){
		event.preventDefault();
		var cid = $(this).attr("cid");
		$.ajax({
		 url : "action.php",
		 method : "post",
		 data: {ediBok: 1, cid: cid},
		 success: function(data){
		 	$("#adminshow").html(data);	
		 }
		});
	});
	
	$("body").delegate("#updatebook","click", function(event){
		event.preventDefault();
		var text1 = $("#lname").val();
		var text2 = $("#pwd2").val();
		var text3 = $("#pwd").val();
		var text4 = $("#autho").val();
		var text5 = $("#aln1").val();
		var text6 = $("#drudpre").val();
		var text7 = $("#buifd").val();
		$.ajax({
		 url : "gemrep.php",
		 method : "post",
		 data: {ediBok2: 1, text1: text1, text2: text2,text3: text3,text4: text4,text5: text5,text6: text6, text7: text7},
		 success: function(data){
		 	$("#displMesage").html(data);	
		 }
		});
		
	});
	
	
	
})