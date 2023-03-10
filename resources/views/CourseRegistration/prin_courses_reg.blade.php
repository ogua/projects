<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Print Addmission Summary</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content=""
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<!-- Bootstrap-Core-Css -->
	<link rel="stylesheet" href="{{URL::to('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
	<!-- Testimonials-Css -->
	<link href="css/mislider.css" rel="stylesheet" type="text/css" />
	<link href="css/mislider-custom.css" rel="stylesheet" type="text/css" />
	<!-- Style-Css -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Font-Awesome-Icons-Css -->
	<link rel="stylesheet" href="{{URL::to('css/fontawesome-all.css')}}">
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
	<div class="container" style="border:1px solid #fff;margin-bottom: 40px;">

    <div class="row" style="margin-top: 20px;">
      <div class="col-md-2">
        <img width="100" height="150"src="{{URL::to('images/UPSA.png')}}"/>
      </div>
      <div class="col-md-8">
        <h2 class="text-center">Ogua College Management System</h2>
        <h3 class="text-center">Proof of Registeration</h3>
        <h3 class="text-center">{{$academicyear}} Academic Year {{$semester}} Registration Information</h3>
      </div>
      <div class="col-md-2">
        <img class="pull-right"width="150" height="150"src="{{asset('storage')}}/{{auth()->user()->pro_pic}}"/>
      </div>
    </div>


<br><br><br>

     <!--  Student Information -->
     <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table" style="border: none;">
                <tr>
                  <th>Name</th>
                  <th >{{$studentinfo->fullname}}</th>
                  <th class="text-right">Index Number</th>
                  <th class="text-right">{{auth()->user()->indexnumber}}</th>
                </tr>
                <tr>
                  <td>Date of Admission</td>
                  <td>{{$studentinfo->admitted}}</td>
                  <td class="text-right">
                    Date of Completion
                  </td>
                  <td class="text-right">{{$studentinfo->admitted}}</td>
                </tr>
                <tr>
                  <td>Entry Level</td>
                  <td>{{$studentinfo->entrylevel}}</td>
                  <td class="text-right">
                    Current Level
                  </td>
                  <td class="text-right">{{$studentinfo->currentlevel}}</td>
                </tr>
                <tr>
                  <td>Programme</td>
                  <td>{{$studentinfo->programme}}</td>
                  <td class="text-right">
                      Session
                  </td>
                  <td class="text-right">{{$studentinfo->session}}</td>
                </tr>
                <tr>
                  <td>Department</td>
                  <td>Department of Information Technology</td>
                  <td class="text-right">
                      Registeration Date
                  </td>
                  <td class="text-right">{{$studentinfo->created_at}}</td>
                </tr>
                <tr>
                  <td>Nationality</td>
                  <td colspan="3">{{$studentinfo->nationality}}</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.box -->

          <br><br>


          <div class="box-body">                           
                  <table id="example3" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th bgcolor="#ccc">Couse Code</th>
                      <th bgcolor="#ccc" class="text-center">Couse Title</th>
                      <th bgcolor="#ccc" class="text-center">Credit Hours</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($courses as $row)
                      <tr>
                        <td>{{$row->cource_code}}</td>
                        <td>{{$row->cource_title}}</td>
                        <td class="text-center">{{$row->credithours}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                 </table>
              </div>  


                <br><br><br><br><br>

                <ul class="list-inline">
                  <li>Student Signature:.............................</li>
                  <li class="pull-right">Office Signature:................................</li>
                </ul>

                <br><br>

                <h3><b><u>NOTE:</u></b></h3>

                <br><br>



                <ol>
                  <li>You are required to print two(2) copies of this slip to your Department Officer for endorsement after which one(1) copy of the slip will be given back to you to complete the process of registeration. Weekends School students are however required to do the endorsement of this slip at Room 7. Academic Affairs, Ground Floor, New Administration Block.</li>
                  <li>The slip must be presented before a student is allowed to add or drop elective course(s) or re-sit a paper.</li>
                  <li>In the event of any difficulty arising from a students registeration, the Academic Affairs Directorate shall demand an inspection of this slip.</li>
                </ol>

                
<div class="container text-center" style="padding: 15px;width: 70%;">
  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(substr(auth()->user()->indexnumber,3), 'S25+')}}" alt="barcode" />
  <br/>
  <br/>
  
</div>


      <br><br>

      <a href="{{route('student-reg-course')}}" >Click here to return to your Portal</a>

		</div>
		
		

   <!--  Student Information Here -->




	</div>
	<!-- Js files -->
	<!-- JavaScript -->
	<script src="{{URL::to('js/jquery-2.2.3.min.js')}}"></script>
	<!-- Default-JavaScript-File -->
	<script src="{{URL::to('js/bootstrap.js')}}"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	

	<!-- smooth scrolling -->
	<script src="{{URL::to('js/SmoothScroll.min.js')}}"></script>
	<!-- //smooth scrolling -->

	<!-- move-top -->
	<script src="{{URL::to('js/move-top.js')}}"></script>
	<!-- easing -->
	<script src="{{URL::to('js/easing.js')}}"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="{{URL::to('js/edulearn.js')}}"></script>

	<!-- //Js files -->
	<script>
		$('document').ready(function(){
			//alert('go');
			//window.print();
		});
	</script>

</body>

</html>