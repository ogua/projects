@extends('layouts.main')


@section('title')
  OSMS | Debit Wallet
@endsection

@section('mtitle')
  OSMS Debit Wallet
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

  <div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Debit Wallet</h3>
      </div>
      <div class="box-body">
          <div class="col-md-2">
            <img width="50" height="100"src="{{URL::to('images/UPSA.png')}}"/>
          </div>
      <div class="col-md-8">
        <h1 class="text-center">Ogua College Management System</h1>
        <hr>
        <h3 class="text-center">Student Information</h3>        
        <div class="row">
          <div class="col-md-8">
            <ul class="list-unstyled">
              <li>Name: {{$studentinfo->fullname}}</li>
              <li>Date of Birth: {{$studentinfo->dateofbirth}}</li>
              <li>Programme: {{$studentinfo->programme}}</li>
          </ul>
          </div>
           <div class="col-md-4">
              <ul class="list-unstyled pull-right">
                <li>Student Number: {{$studentinfo->indexnumber}}</li>
                <li >Sex: {{$studentinfo->gender}}</li>
                <li >Period: {{$studentinfo->admitted}}</li>
               </ul>
           </div>
        </div>
        
      </div>
      <div class="col-md-2">
        <img class="pull-right"width="150" height="150" 
        src="{{asset('storage')}}/{{$user->pro_pic}}"/>
      </div>

      
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Debit Wallet</h3>
      </div>
      <div class="box-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('search_student') }}" class="btn btn-success">&larr;back</a>
                <form method="post" role="form" 
                action="{{route('debit-wallet')}}" id="add-mandebit-walletdatory-fees">
                     <div class="box-body">
                @csrf
                <input type="hidden" name="studntid" value="{{$studentinfo->user_id}}">
                <div class="form-group  @error('amount') has-error @enderror">
                       <label class="control-label" for="amount">Debit Amount</label>
                       <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter ..." required>
                        <span class="help-block">@error('amount') {{ $message }} @enderror</span>
                  </div>

                  <div class="form-group  @error('confirmamount') has-error @enderror">
                       <label class="control-label" for="confirmamount">Confirm Amount</label>
                       <input type="number" class="form-control" name="confirmamount" id="confirmamount" placeholder="Enter ..." required>
                        <span class="help-block">@error('confirmamount') {{ $message }} @enderror</span>
                  </div>
        
                  <input type="submit" name="submit" value="Debit Wallet" class="btn btn-success">
              </div>
            </form> 
              </div>
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
    $(document).on("change",".checkit", function(e){
      e.preventDefault();
      var cid = $(this).attr("cid");
      var _token = $('meta[name=csrf-token]').attr('content');
    
      if ($(this).prop('checked')) {
          
        if (confirm("Confirm Academic Year Activation")) {
            $.ajax({
                    url: '{{route('academic-year-update-status')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid, status: 1},
                     dataType: 'json',
                    success: function(data){
                        if (data.msg) {
                            alert(data.msg);
                        }else{
                            $("#error").text(data.error).show();
                        }
                        
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });

          }


      }else{
         
        if (confirm("Confirm Academic Year Deactivation !")) {
            $.ajax({
                    url: '{{route('academic-year-update-status')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid, status: 0},
                     dataType: 'json',
                    success: function(data){
                        if (data.msg) {
                            alert(data.msg);
                        }else{
                            $("#error").text(data.error).show();
                        }
                        
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });

          }

      }
          
     
    });
    //end

  });

</script>


@endsection
