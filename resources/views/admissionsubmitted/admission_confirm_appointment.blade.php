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
  <link rel="stylesheet" href="{{ URL::to('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css')}}">
  <!-- Testimonials-Css -->
  <link href="{{ URL::to('css/mislider.css')}}" rel="stylesheet" type="text/css" />
  <link href="css/mislider-custom.css" rel="stylesheet" type="text/css" />
  <!-- Style-Css -->
  <link rel="stylesheet" href="{{ URL::to('css/style.css')}}" type="text/css" media="all" />
  <!-- Font-Awesome-Icons-Css -->
  <link rel="stylesheet" href="c{{ URL::to('ss/fontawesome-all.css')}}">
  <!-- //Custom-Files -->

  <!-- Web-Fonts -->
  <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
   rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <!-- //Web-Fonts -->
<style>
  p{
    color: black;
    font-family: Tahoma;
  }
</style>
</head>


<body>
  <div class="container" style="border:1px solid #fff;">


    <div class="row" style="margin-top: 20px;">
      <div class="col-md-2">
        <img width="100" height="150"src="{{URL::to('images/UPSA.png')}}"/>
      </div>
      <div class="col-md-9">
        <h1>Ogua College School Management System</h1>
        <div class="col-md-10">
          <h1 class="text-center"> Application Declaration </h1>
          <img class="pull-right"width="150" height="150"src="{{asset('storage')}}/{{$user->pro_pic}}"/>
        </div>
      </div>
    </div>
    <hr style="border:1px solid black;">
    <ul class="list-unstyled">
      <li>{{$student->fullname}}</li>
      <li>{{$student->address}}</li>
      <li>{{$student->region}}</li>
    </ul>

    <br>
    <p>Dear @if($student->gender == 'Male') Mr @else Ms. @endif
      <?php
        $print = explode(" ", $student->fullname);
        echo $print[0];
      ?>
     </p>
     <br><br>
     <p><b><u>Offer of Admission</u></b></p>
     <p>We are pleased to offer you admission to the Univeristy of Ogua Management System. to Purpue a  @if($student->type == 'Degree Programme') a Four (4) @else a Three (3) @endif  years  <b> {{$student->programme}} </b> programme starting from the 2020/2021 academic year as Follows: <p>

    <ol style="margin-left: 40px;">
      <li>You are admitted to <b>{{$student->entrylevel}}</b> of the <b>{{$student->session}}</b> </li><br>
      <li>Your Index Number is <b>{{$student->indexnumber}}</b> </li><br>
      <li>You will be affliliated to ( Hall Name )</li><br>
      <li>The 2020/2021 academic year commerce on Monday 11th, August, 2020</li><br>
      <li>You are expected to report for the semester course registeration and participate fully in an orientation programme for all fresh students. Originals of certificate used to gain admission will be inspected before registration is completed</li><br>
      <li>The official dates for registration, orientation and commercement of lecturers are clearly stated on the programme of Acticities for fresh students attached to this letter.</li><br>
      <li>The offer is based on available information that you have satisfied the entry requirements for the above programme of study. You will be summarily dismissed in the event that the information provided is found to be false at any time in the course of your study. it is important to also note that all students are considered to be on probation for the entire duration of their programme and may be dismissed or withdrawn from the University for misconduct or unsatisfactory academic work.</li><br>
      <li>Please confirm your acceptance of our offer by paying the appropriate non-refundable initial payment of the total bill for the academic year as per the fee schedule for fresh students. the deadline for payment is friday, 15th November, 2020.</li><br>
      <li>In accepting this offer, you are required to fully comply with all the directives given in the Guidlines for fresh students (<i>Regulations, Programme of Activities and fee Schedule for Fresh Students)</i> attached to this letter. Failure to comply shall lead to the revocation or forfeiture of your admission.</li><br>

    </ol>
      <div style="margin-left: 30px;">
      <p>You are thus, welcome to the OSMS. Please accept my congratulations upon your admission.</p><br>

      <p>Yours sincerely</p>

      <p>Ahmed Amartei Kudjoe</p>
      <P>Director, Academic Affairs<br> For: REGISTRAR</P>
      </div><br>
        <ul><a href="{{route('admissions-confirm')}}">Click here to Return to your portal</a></ul>
      <br><br><br><br>
  </div>
  <!-- Js files -->
  <!-- JavaScript -->
  <script src="{{ URL::to('js/jquery-2.2.3.min.js')}}"></script>
  <!-- Default-JavaScript-File -->
  <script src="{{ URL::to('js/bootstrap.js')}}"></script>
  <!-- Necessary-JavaScript-File-For-Bootstrap -->

  <!-- testimonial-plugin -->
  <script src="{{ URL::to('js/mislider.js')}}"></script>
  <script>
    jQuery(function ($) {
      var slider = $('.mis-stage').miSlider({
        //  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
        stageHeight: 320,
        //  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
        slidesOnStage: false,
        //  The location of the current slide on the stage. Options: 'left', 'right', 'center'. Defualt: 'left'
        slidePosition: 'center',
        //  The slide to start on. Options: 'beg', 'mid', 'end' or slide number starting at 1 - '1','2','3', etc. Defualt: 'beg'
        slideStart: 'mid',
        //  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
        slideScaling: 150,
        //  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
        offsetV: -5,
        //  Center slide contents vertically - Boolean. Default: false
        centerV: true,
        //  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
        navButtonsOpacity: 1,
      });
    });
  </script>
  <!-- //testimonial-plugin -->

  <!-- smooth scrolling -->
  <script src="{{ URL::to('js/SmoothScroll.min.js')}}"></script>
  <!-- //smooth scrolling -->

  <!-- move-top -->
  <script src="{{ URL::to('js/move-top.js')}}"></script>
  <!-- easing -->
  <script src="{{ URL::to('js/easing.js')}}"></script>
  <!--  necessary snippets for few javascript files -->
  <script src="{{ URL::to('js/edulearn.js')}}"></script>

  <!-- //Js files -->
  <script>
    $('document').ready(function(){
      //alert('go');
      //window.print();
    });
  </script>

</body>

</html>