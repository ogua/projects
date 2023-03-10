$("document").ready(function(){	
	$("#submitReg").on("submit",function(e){
		e.preventDefault();
		$.ajax({
			url: 'Register.php',
			type: 'POST',
			contentType: false,
			processData: false,
			cache: false,
			data: new FormData(this),
			success: function(data){
				$("#displayResult").html(data);
			}
		});
	});
	
	$("#LoginUser").on("submit",function(e){
		e.preventDefault();
		alert("gooo");
		return;
		$.ajax({
			url: 'Login.php',
			type: 'POST',
			contentType: false,
			processData: false,
			cache: false,
			data: new FormData(this),
			success: function(data){
				alert(data);
				//$("#userlogin").html(data);
			}
		});
	});
	
	$("#submitapptmnt").on("submit",function(e){
		e.preventDefault();
		$.ajax({
			url: 'appointment.php',
			type: 'POST',
			contentType: false,
			processData: false,
			cache: false,
			data: new FormData(this),
			success: function(data){
				if(data.match("success")){
					alert("Appointment Submited Successfully");
					window.location.href="index.php";
				}else{
					$("#displayMsg").html(data);
				}
			}
		});
	});
	
})