$(document).ready(function(){
	
	//alert("go");
	getrateDocid();
	function getrateDocid(){
		$.ajax({
		url: "action.php",
		method: "post",
		data: {getIDDoc: 1},
		success: function(data){
			$("#docid").val(data);
		}
		});
	}
		
	$("#add").click(function(){
		var text = $("#docid").val();
		var text2 = $("#docname").val();
		var text3 = $("#address").val();
		var text4 = $("#docmob").val();
		var text5 = $("#docemail").val();
		var text6 = $("#categoty").val();
		var text7 = $("#docuname").val();
		var text8 = $("#docepass").val();
		var text9 = $("#docrole").val();
			
		var valide = true;
		var res = "";
					
		if(text2 == ""){
			res += " DOC NAME,";
			valide = false;
		//alert("DOC NAME CANT BE EMPTY");
		//return false;
		}else{
			valide = true;
		}
		
		if(text3 == ""){
			res += " ADDRESS,";
			valide = false;
			//alert(" ADDRESS CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text4 == ""){
			res += " MOBILE NUMBER,";
			valide = false;
		//alert(" MOBILE NUMBER CANT BE EMPTY");
		//return false;
		}else{
			valide = true;
		}
		
		if(text5 == ""){
			res += " EMAIL,";
			valide = false;
		//alert("EMAIL CANT BE EMPTY");
		//return false;
		}else{
			valide = true;
		}
		
		if(text6 == ""){
			res += " CATEGORY,";
			valide = false;
		//alert("CATEGORY CANT BE EMPTY");
		//return false;
		}else{
			valide = true;
		}
		
		if(valide == false){
			alert(res+" CANT BE EMPTY");
			return;
		}
		
		
		/*if(filter_var(text5, FILTER_VALIDATE_EMAIL)){
			
		}*/
		$.ajax({
		url: "action.php",
		method: "post",
		data: {addDoctor: 1, text:text , text2: text2, text3:text3, text4: text4, text5: text5, text6: text6, text7:text7,text8:text8,text9:text9},
		success: function(data){
			if(data.match("error1")){
				alert("Phone Number is Invalid");
			}
			else if(data.match("error2")){
				alert("Email Address is Invalid");
			}else if(data.match("error3")){
				alert("Password should Contain atleast 6 characters");
			}
			else if(data.match("success")){
				alert("Doctor Added SuccessFully!");
				getrateDocid();
				$("#docname").val("");
				$("#address").val("");
				$("#docmob").val("");
				$("#docemail").val("");
				$("#categoty").val("");
			   $("#docuname").val("");
			   $("#docepass").val("");
			   $("#docrole").val("");
			   viewDoc();
			   ViewAppmntadmi();
			   ViewPatince();
			}
			else if(data.match("error3")){
				alert("Failed! Try again Later");
			}
		}
		});
	});
	
	viewDoc();
	function viewDoc(){
		$.ajax({
		url: "action.php",
		method: "post",
		data: {viewDoc: 1},
		success: function(data){
			$("#view_doc").html(data);
		}
		});
	}
	
	ViewAppmnt();
	function ViewAppmnt(){
		$.ajax({
		url: "action.php",
		method: "post",
		data: {ViewAppmnt: 1},
		success: function(data){
			$("#viewapp").html(data);
		}
		});
	}
	
	ViewAppmntadmi();
	function ViewAppmntadmi(){
		$.ajax({
		url: "action.php",
		method: "post",
		data: {ViewAppmntadmi: 1},
		success: function(data){
			$("#viewapp2").html(data);
		}
		});
	}

	ViewAppmntaddoc();
	function ViewAppmntaddoc(){
		$.ajax({
		url: "action.php",
		method: "post",
		data: {ViewAppmntaddoc: 1},
		success: function(data){
			$("#docAppointmnt").html(data);
		}
		});
	}


	ViewAppmntid();
	function ViewAppmntid(){
		$.ajax({
		url: "action.php",
		method: "post",
		data: {ViewAppmntid: 1},
		success: function(data){
			$("#newid").val(data);
		}
		});
	}
	
	ViewBooking();
	function ViewBooking(){
		$.ajax({
		url: "action.php",
		method: "post",
		data: {ViewBooking: 1},
		success: function(data){
			$("#viewbook").html(data);
		}
		});
	}ViewBooking2();
	function ViewBooking2(){
		$.ajax({
		url: "action.php",
		method: "post",
		data: {ViewBooking2: 1},
		success: function(data){
			$("#viewbook2").html(data);
		}
		});
	}
	
	ViewUserid();
	function ViewUserid(){
		$.ajax({
		url: "action.php",
		method: "post",
		data: {ViewUserid: 1},
		success: function(data){
			$("#patid").val(data);
		}
		});
	}
	
	ViewPatince();
	function ViewPatince(){
		$.ajax({
		url: "action.php",
		method: "post",
		data: {ViewPatince: 1},
		success: function(data){
			$("#view_pat").html(data);
		}
		});
	}
	
	$("#check").click(function(e){
		e.preventDefault();
		var text = $("#newid").val();
		var text2 = $("#userid").val();
		var text3 = $("#categotys").val();
		var text4 = $("#docnames").val();
		var text5 = $("#docdates").val();
		var text6 = $("#nbukfrom").val();
		var text7 = $("#nbukto").val();
		var text8 = $("#Genda").val();
		var text9 = $("#Age").val();
		var text10 = $("#mobnum").val();
		var text11 = $("#uaddres").val();
		
		
		var valide = true;
		var res = "";
					
		if(text8 == ""){
			res += " Gender,";
			valide = false;
			//alert("Gender CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text9 == ""){
			res += " Age,";
			valide = false;
			//alert("Age CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text10 == ""){
			res += " Mobile Number,";
			valide = false;
			//alert("Mobile Number CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text11 == ""){
			res += " ADDRESS,";
			valide = false;
			//alert("ADDRESS CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		
		
		if(text3 == ""){
			res += " CATEGORY,";
			valide = false;
			//alert("CATEGORY CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text4 == ""){
			res += " DOCTOR,";
			valide = false;
			//alert("DOCTOR CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text5 == ""){
			res += " DATE,";
			valide = false;
			//alert("DATE CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		
		if(valide == false){
			alert(res+" CANT BE EMPTY");
			return;
		}
		$.ajax({
		url: "action.php",
		method: "post",
		data: {check: 1, text4: text4, text10: text10},
		success: function(data){
			$("#displayCheck").html(data);
		}
		});
	});
	
	$("#addPat").click(function(e){
		e.preventDefault();
		var text = $("#patid").val();
		var text2 = $("#patname").val();
		var text3 = $("#address").val();
		var text4 = $("#docmob").val();
		var text5 = $("#docemail").val();
		var text6 = $("#docuname").val();
		var text7 = $("#docepass").val();
		var valide = true;
		var res = "";
		if(text2 == ""){
			 res += " PATIENTS NAME";
			valide = false;
		}else{
			valide = true;
		}
		if(text3 == ""){
			 res += " PATIENTS ADDRESS, ";
			valide = false;
		}else{
			valide = true;
		}if(text4 == ""){
			 res += " PATIENTS NUMBER,";
			valide = false;
		}else{
			valide = true;
		}if(text5 == ""){
			 res += " PATIENTS EMAIL,";
			valide = false;
		}else{
			valide = true;
		}if(text6 == ""){
			 res += " PATIENTS USERNAME,";
			valide = false;
		}else{
			valide = true;
		}if(text7 == ""){
			 res += " PATIENTS PASSWORD,";
			valide = false;
		}else{
			valide = true;
		}
		
			if(valide == false){
				alert(res+" CANT BE EMPTY");
				return;
			}
		$.ajax({
		url: "action.php",
		method: "post",
		data: {Signup: 1, text: text, text2: text2, text3: text3, text4: text4,
		text5: text5, text6: text6, text7: text7},
		success: function(data){
			alert(data);
			if(data.match("Successfully")){
				alert("Registered_Successfully");
				window.location.href="index.php";
			}
			
			else if(data.match("failed")){
				alert("Patient Signup failed!");
			}
			
			
		}
		});
		
	});
	
	
	$("body").delegate(".addbook","click",function(){
		var text = $("#newid").val();
		var text2 = $("#userid").val();
		var text3 = $("#categotys").val();
		var text4 = $("#docnames").val();
		var text5 = $("#docdates").val();
		var text6 = $("#nbukfrom").val();
		var text7 = $("#nbukto").val();
		var text8 = $("#Genda").val();
		var text9 = $("#Age").val();
		var text10 = $("#mobnum").val();
		var text11 = $("#uaddres").val();
		
		
		var valide = true;
		var res = "";
					
		if(text8 == ""){
			res += " Gender,";
			valide = false;
			//alert("Gender CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text9 == ""){
			res += " Age,";
			valide = false;
			//alert("Age CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text10 == ""){
			res += " Mobile Number,";
			valide = false;
			//alert("Mobile Number CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text11 == ""){
			res += " ADDRESS,";
			valide = false;
			//alert("ADDRESS CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		
		
		if(text3 == ""){
			res += " CATEGORY,";
			valide = false;
			//alert("CATEGORY CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text4 == ""){
			res += " DOCTOR,";
			valide = false;
			//alert("DOCTOR CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text5 == ""){
			res += " DATE,";
			valide = false;
			//alert("DATE CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text6 == ""){
			res += " TIME,";
			valide = false;
			//alert("TIME CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		if(text7 == ""){
			res += " TIME TO,";
			valide = false;
			//alert("TIME TO  CANT BE EMPTY");
			//return false;
		}else{
			valide = true;
		}
		
		
		if(valide == false){
			alert(res+" CANT BE EMPTY");
			return;
		}
		
		
		
		$.ajax({
		url: "action.php",
		method: "post",
		data: {Newbooking: 1, text: text, text2: text2, text3: text3, text4: text4,
		text5: text5, text6: text6, text7: text7, text8: text8, text9: text9, text10: text10, text11: text11},
		success: function(data){
			alert(data);
			$("#categotys").val("");
		    $("#docnames").val("");
		    $("#docdates").val("");
		    $("#nbukfrom").val("");
		    $("#nbukto").val("");
			ViewBooking2();
			ViewBooking();
		}
		});
	});
	
	$("#updatep").click(function(){
		var text = $("#padress").val();
		var text2 = $("#pcont").val();
		var text3 = $("#pemail").val();
		$.ajax({
		url: "action.php",
		method: "post",
		data: {updatePat: 1, text: text, text2: text2, text3: text3
		},
		success: function(data){
			alert(data);		
		}
		});
	});
	
	$("#serpat").click(function(){
		var text = $("#searcat").val();
		var text2 = $("#sertext").val();
		if(text == ""){
			alert("Select Type Of Search");
			return false;
		}if(text2 == ""){
			alert("Text Box Cant Be Empty");
			return false;
		}
		$.ajax({
		url: "action.php",
		method: "post",
		data: {SearchDoc: 1, text: text, text2: text2
		},
		success: function(data){
			$("#SearchResults").html(data);
			$("#searcat").val("");
			$("#sertext").val("");
		}
		});
	});
	
	
	
	
	$("body").delegate(".deleadmin","click",function(){
		var cid = $(this).attr("cid");
		$.ajax({
		url: "action.php",
		method: "post",
		data: {deleadmin2: 1, cid: cid
		},
		success: function(data){
			$("#displayCartMessage").html(data);
			$('#myModa2').modal('show');
			//ViewAppmntadmi();
		}
		});
	});
	
	
	$("body").delegate(".deletit","click",function(){
				var cid = $(this).attr("cid");
				$.ajax({
				url: "action.php",
				method: "post",
				data: {deleadmin: 1, cid: cid
				},
				success: function(data){
					$('#myModa2').modal('hide');
					alert(data);
					ViewAppmntadmi();
				}
				});
			});
	
			$("body").delegate(".deletenot","click",function(){
				$('#myModa2').modal('hide');
			});
	getrateNumPa();
	function getrateNumPa(){
		var text = "APMT";
		var text2 = $("#pidkey").val(text);
	}
	
	$("#serachpid").click(function(){
		var text = $("#pidkey").val();
		$.ajax({
		url: "action.php",
		method: "post",
		data: {getTreatment: 1, text: text
		},
		success: function(data){
			$("#displayTratment").html(data);
		}
		});
	});
	
	$("body").delegate("#ssend","click",function(){
		var text = $("#stretf").val();
		var text2 = $("#stret").val();
		var text3 = $("#snote").val();
		var text4 = $("#pidkey").val();
		if(text2 ==""){
			alert("ALL FIELDS MUST BE FILED");
			return false;
		}if(text3 ==""){
			alert("ALL FIELDS MUST BE FILED");
			return false;
		}if(text4 ==""){
			alert("ALL FIELDS MUST BE FILED");
			return false;
		}
		$.ajax({
		url: "action.php",
		method: "post",
		data: {searchSubmit: 1, text: text, text2: text2, text3: text3, text4: text4
		},
		success: function(data){
			$("#displayCartMessage").html(data);
			$("#stretf").val("");
		    $("#stret").val("");
		    $("#snote").val("");
		}
		});
	});
	
	$("#categotys").change(function(){
		var text = $(this).val();
		$.ajax({
		url: "action.php",
		method: "post",
		data: {SearchSelect: 1, text: text
		},
		success: function(data){
			$("#dispseletDoct").html(data);			
		}
		});
	 });
	 
	 
	 
	$("#logout").click(function(e){
			e.preventDefault();
			$.ajax({
		url: "logout.php",
		method: "post",
		success: function(data){
			if(data.match("go")){
				window.location.href="index.php";
			}
		}
		});
	});
	
	
	
	
})