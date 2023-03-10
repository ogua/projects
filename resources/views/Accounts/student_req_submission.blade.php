@extends('layouts.main')


@section('title')
  OSMS | Student Requests Submitted
@endsection

@section('mtitle')
  Student Requests Submitted
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
        <h3 class="box-title" style="width: 100%;">Student Requests Submitted <b class="pull-right" style="border: 2px solid #fff; background-color: #ccc; padding: 5px;">Wallet GH&cent; {{$wallet->balance}}</b></h3>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Transaction Date</th>
                      <th>Index Number</th>
                      <th>Entity Name</th>
                      <th>Fee Type</th>
                      <th>Fee Amount</th>
                      <th>Amount Paid</th>
                      <th>Currency</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($semesterfee as $row)
                        @if($row->owed == '0')
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->created_at}}</td>
                            <td>{{auth()->user()->indexnumber}}</td>
                            <td>{{auth()->user()->name}}</td>
                            <td>{{$row->fee}}</td>
                            <td>{{$row->feeamount}}</td>
                            <td>{{$row->paid}}</td>
                            <td>GH&cent;</td>
                            <td>Submitted</td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                 </table>
      </div>
    </div>
  </div>
</div>
           
@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){

   $(document).on("click",".paynow",function(e){
    e.preventDefault();
    var id = $(this).attr("cid");
    var fee = $(this).data('fee');
    var amount = $("#amount_"+id).val();
    var _token = $('meta[name=csrf-token]').attr('content'); 

    var url = '{{ route('pay_other_services_fees') }}';


    swal({
     title: "Are you sure?",
     text: "Proceed to pay Gh₵"+amount+" for "+fee,
     icon: "warning",
     buttons: ['Cancel', 'Yes Pay'],
     dangerMode: true,
   })
    .then((willDelete) => {
     if (willDelete) {


      $.ajax({

        beforeSend: function(){
          $.LoadingOverlay("show");
        },
        complete: function(){
          $.LoadingOverlay("hide");
        },

        url: '{{route('pay_mandatory_student')}}',
        type: 'POST',
        data: {_token : _token , id: id, fee: fee, amount: amount},
        success: function(data){ 

          if(data.match("success")){

               swal("Fee Paid Successfully!",{
                 icon: 'success',
               });

               window.location.href=url;
          }else{

               swal("Faid! Try again Later",{
                 icon: 'warning',
               });
          }


        },
        error: function (data) {
          console.log('Error:', data);
        }
      });  

      }
  });


  });




   $(document).on("click",".delrequest",function(e){
    e.preventDefault();
    var id = $(this).attr("cid");
    var fee = $(this).data('fee');
    var _token = $('meta[name=csrf-token]').attr('content'); 

    var url = '{{ route('pay_other_services_fees') }}';


    swal({
     title: "Are you sure?",
     text: "Proceed to Remove "+fee+" From Requests",
     icon: "warning",
     buttons: ['Cancel', 'Yes Remove'],
     dangerMode: true,
   })
    .then((willDelete) => {
     if (willDelete) {


      $.ajax({

        beforeSend: function(){
          $.LoadingOverlay("show");
        },
        complete: function(){
          $.LoadingOverlay("hide");
        },

        url: '{{route('remove_request_services')}}',
        type: 'POST',
        data: {_token : _token , id: id},
        success: function(data){ 

          if(data.match("success")){

               swal("Fee Request Removed Successfully!",{
                 icon: 'success',
               });

               window.location.href=url;
          }else{

               swal("Faid! Try again Later",{
                 icon: 'warning',
               });
          }


        },
        error: function (data) {
          console.log('Error:', data.message);
        }
      });  

      }
  });


  });











  });

</script>


@endsection
