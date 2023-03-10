@extends('layouts.main')


@section('title')
  OSMS | Online Polls
@endsection

@section('mtitle')
  Polls Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

      @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Success!</h4>
                          {{ session('message') }}
        </div>
      @endif

            <div class="row">
      
                <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Start Voting</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <!-- form start -->

                  <div id="showvoting">
            <a href="#" id="startvoting" class="btn btn-success">Start Voting Now</a>
          <br><br>
            <div id="alert">
               <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                Once Voting Starts, You can't start voting again, Make sure you finish with the voting process before logging out or switching from this page
                </div>
             </div>
           </div>

                 <!-- / form start -->
                </div>
              </div>
              <!-- /.box -->
            </div>



           
        </div>
            


@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    //start
    $(document).on("click","#startvoting", function(e){
      e.preventDefault();
      var _token = $('meta[name=csrf-token]').attr('content');      
        if (confirm("Start Voting")) {
            $.ajax({
                    url: '{{route('start-votes')}}',
                    type: 'POST',
                    data: {_token : _token},
                      success: function(data){
                        if(data.match("success")){
                          //alert('success');
							            window.location.href='/Polls/start/vote'; 
          						  }else if("failed"){
                          $("#alert").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close"data-dismiss="alert"aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Alert!</h4> Voting has been Closed</div>').show();
                        }else{
          							  $("#alert").html(data);
          						  }
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#alert").text(data).show();
                      }
                });

          }
          
     
    });
    //end

  });

</script>


@endsection
