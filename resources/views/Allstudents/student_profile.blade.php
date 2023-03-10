@extends('layouts.main')


@section('title')
  OSMS | All ONLINE Admissions
@endsection

@section('mtitle')
  Student Admission Information
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

  
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('storage')}}/{{$personal->pro_pic}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$personal->fullname}}</h3>

              <p class="text-muted text-center">Student</p>

              <!-- <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Date of Birth</b> <a class="pull-right">{{$personal->dateofbirth}}</a>
                </li>
                <li class="list-group-item">
                  <b>Session</b> <a class="pull-right">{{$personal->session}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{$personal->email}}</a>
                </li>
              </ul> -->
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
         <!--  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Gurdian Information</h3>
            </div>
            <div class="box-body">
              <strong><i class="fa fa-pencil margin-r-5"></i>Name</strong>

              <p class="text-muted">
                {{$personal->gurdianname}}
              </p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i>Relationship</strong>

              <p class="text-muted">{{$personal->relationshp}}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i>Mobile Number</strong>

              <p>
                <span class="label label-danger">{{$personal->mobile}}</span>
              
              </p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i>Employed</strong>

              <p>{{$personal->employed}}</p>
            </div>
          </div> -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Information</a></li>
<!--               <li><a href="#settings" data-toggle="tab">Guidian IInformation</a></li>
 --><!--               <li><a href="#timeline" data-toggle="tab">Results</a></li>
 -->            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="alert alert-success" id="msg" style="display: none;">
              
                </div>
                <div class="alert alert-danger" id="error" style="display: none;">
              
                </div>

                <div class="box-body">
                        <table class="table table-bordered table-striped">
                          <thead>
                  
                          </thead>
                          <tbody>
                            <tr>
                                <td colspan="2"><b> Personnal Information </b></td>
                              </tr>
                            <tr>
                                <td>Fullname</td>
                                <td>{{$personal->fullname}}</td>
                               
                              </tr>
                              <tr>
                                <td>Date of birth</td>
                                <td>{{$personal->dateofbirth}}</td>
                                
                              </tr>
                    
                              <tr>
                                <td>Email</td>
                                <td>{{$personal->email}}</td>
                               
                              </tr>
                              <tr>
                                <td>Phone</td>
                                <td>{{$personal->phone}}</td>
                               
                              </tr>
                              <tr>
                              <td>Marital Status</td>
                                <td>{{$personal->maritalstutus}}</td>
                               
                              </tr>
                            </tbody>
                        </table>
                      </div>  

                      <hr>

                       <div class="box-body">
                        <table class="table table-bordered table-striped">
                          <thead>
                  
                          </thead>
                          <tbody>
                            <tr>
                                <td colspan="2"><b> Academic Information </b></td>
                              </tr>
                            <tr>
                                
                                <td>Entry Level</td>
                                <td>{{$personal->entrylevel}}</td>
                              </tr>
                              <tr>
                               
                                <td>Current Level</td>
                                <td>{{$personal->currentlevel}}</td>
                              </tr>
                    
                              <tr>
                              
                                <td>Programme</td>
                                <td>{{$personal->programme}}</td>
                              </tr>
                              <tr>
                               
                                <td>Session</td>
                                <td>{{$personal->session}}</td>
                              </tr>
                              <tr>
                              
                                <td>Index Number</td>
                                <td>{{$personal->indexnumber}}</td>
                              </tr>
                            </tbody>
                        </table>
                      </div>  


                      <hr>


                       <div class="box-body">
                        <table class="table table-bordered table-striped">
                          <thead>
                  
                          </thead>
                          <tbody>
                            <tr>
                                <td colspan="2"><b> Guidian Infomation </b></td>
                              </tr>
                            <tr>
                                <td>Guidian Fullname</td>
                                <td>{{$personal->gurdianname}}</td>
                              </tr>
                              <tr>
                                <td>Relationship</td>
                                <td>{{$personal->relationship}}</td>
                              </tr>
                    
                              <tr>
                                <td>Occupation</td>
                                <td>{{$personal->occupation}}</td>
                                
                              </tr>
                              <tr>
                                <td>Phone</td>
                                <td>{{$personal->mobile}}</td>
                                
                              </tr>
                            </tbody>
                        </table>
                      </div>  


              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                

  <!--- Backgtound image on this div ---->
     <!--  Student Information -->
       

              <!--- Background end -->

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                 

                <!-- Guidian Information -->

                




              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

@endsection




@section('script')

<script type="text/javascript">
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


	$('document').ready(function(){
		$(document).on('change','.progamme',function(e){
			e.preventDefault();
			var prog = $(this).val();
			var cid = $(this).attr("cid");
			var _token = $('meta[name=csrf-token]').attr('content');
			_this = $(this);
			$.ajax({
					url: '{{route('admissions-update-programme')}}',
					type: 'POST',
					data: {_token : _token , prog: prog, cid: cid},
					 dataType: 'json',
					success: function(data){
						$("#msg").text(data.msg).show();
					},
			          error: function (data) {
			            console.log('Error:', data);
			            $("#msg").text('Sorry, Something error :(').show();
			          }
				});
		});

		
    $(document).on('change','.appprove',function(e){
      e.preventDefault();
      var status = $(this).val();
      var cid = $(this).attr("cid");
      var _token = $('meta[name=csrf-token]').attr('content');
      _this = $(this);
      $.ajax({
          url: '{{route('admissions-approve-admission')}}',
          type: 'POST',
          data: {_token : _token , status: status, cid: cid},
           dataType: 'json',
          success: function(data){
            if (data.msg) {
              $("#msg").text(data.msg).show();
            }else{
              $("#error").text(data.error).show();
            }
            
          },
                error: function (data) {
                  console.log('Error:', data);
                  $("#msg").text(data.message).show();
                }
        });
    });


		


	$('#admission').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admissions-all-confirm') }}',
        dom: 'lBfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            'print'
        ],
        columns: [
            {data: 'id'},
            {data: 'profileimg', render: function(data){
            	return '<img src="{{asset('storage')}}/'+data+'" class="img-circle"width="50" height="50">';
            },
            orderable: false
        },
            {data: 'firstnames'},
            {data: 'gender'},
            {data: 'entrylevel'},
            {data: 'year'},
            {data: 'programme'},
            {data: 'indexnumber'},
           {data: 'approve', render: function(data,type,row,meta){
            	$html = "";
                $html += '<a href="#" class="btn btn-success confirm" cid="'+row['indexnumber']+'">';
                $html += 'confirm now</a>';
                return $html;
            }, 
             orderable: false
        },
            {data: 'action', name: 'action'},
        ]




    });





	$.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) { 
    	console.log(message);
};

	});
</script>


@endsection
