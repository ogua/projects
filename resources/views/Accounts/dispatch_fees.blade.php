@extends('layouts.main')


@section('title')
  OSMS | Fee Master
@endsection

@section('mtitle')
   Fee Master
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
          
          <div class="row">
                <!-- left column -->
              <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div class="alert alert-danger">
                         <p>Dispatch Fees To All Students.<br> 

                        <b> Make sure you go through all Mandatory fees before clicking on dispatch button </b>
                        </p>
                    </div>

                    <hr>
                    <p>Check Fees Here</p>
                    <ul class="list-inline">
                      <li><a href="{{ route('view_fees_level100') }}" class="btn btn-success">View Level 100 Fees</a></li>
                      <li><a href="{{ route('view_fees_level200') }}" class="btn btn-success">View Level 200 Fees</a></li>
                      <li><a href="{{ route('view_fees_level300') }}" class="btn btn-success">View Level 300 Fees</a></li>
                      <li><a href="{{ route('view_fees_level400') }}" class="btn btn-success">View Level 400 Fees</a></li>
                    </ul>

                    <hr>
                    
                    <a href="{{ route('dispatch_fees_now') }}" onclick="return confirm('Dispact Now')" class="btn btn-info btn-lg"> Dispact Fees Now</a>

                    <hr>

                    <div class="row">
                      <div class="col-md-4">

                        <form method="post" id="setdeadline" action="{{ route('payment_deadline') }}">
                          @csrf
                          <div class="form-group">
                            <label>Set Payment Deadline</label>
                            <input type="date" name="deadline" class="form-control" required>
                          </div>
                          <input type="submit" value="Set Payment Deadline" name="submit" class="btn btn-success" >
                        </form>
                      </div>
                      <div class="col-md-4">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Payment Deadline</th>
                              <th>Updated</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                           <td>{{ date('jS M y', strtotime($deadline->deadline))}}</td>
                            <td>{{ date('jS M y', strtotime($deadline->date))}}</td>
                           <td>

                            @php
                              $diffs = now()->diffInDays(\Carbon\Carbon::parse($deadline->deadline),false);
                            @endphp

                            @if($diffs < 0)
                            <label class="label-danger badge">Closed</label>
                            @else
                            <label class="label-info badge">Open</label>
                            @endif
                           </td>
                         </tbody>
                       </table>
                      </div>
                    </div>

                 
                </div>          
              </div>
            </div>         

        </div>
          
            

@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    
  	//start
    $(document).on("submit","#setdeadline", function(e){
      e.preventDefault();
      var _token = $('meta[name=csrf-token]').attr('content');     
                 $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('payment_deadline')}}',
                    type: 'POST',
                    data: $("form").serialize(),
                    success: function(data){ 

                        swal("Payment Deadline Set Successfully!",{
                          icon: 'success',
                        });


                    },
                      error: function (data) {
                        console.log('Error:', data);
                        
                      }
                });  
     
    });
    //end


  });

</script>


@endsection
