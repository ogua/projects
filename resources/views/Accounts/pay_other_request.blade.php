@extends('layouts.main')


@section('title')
  OSMS | Make Payment - Other Services Fees
@endsection

@section('mtitle')
  Make Payment - Other Services Fees
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
        <h3 class="box-title" style="width: 100%;">Make Payment - Other Services Fees <b class="pull-right" style="border: 2px solid #fff; background-color: #ccc; padding: 5px;">Wallet GH&cent; {{$wallet->balance}}</b></h3>
      </div>
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Other Services Fee</th>
                      <th>Currency</th>
                      <th>Bill</th>
                      <th>Paid</th>
                      <th>Owed</th>
                      <th>Current Payable</th>
                      <th>Patial Amount</th>
                      <th>Pay</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($semesterfee as $row)
                        @if($row->owed !== '0')
                          <tr>
                            <td><a href="#" cid="{{$row->id}}" data-fee="{{$row->fee}}"  class="delrequest btn btn-danger"><i class="fa fa-trash"></i></a></td>
                            <td>{{$row->fee}}</td>
                            <td>Gh&cent;</td>
                            <td>{{$row->feeamount}}</td>
                            <td>{{$row->paid}}</td>
                            <td>{{$row->owed}}</td>
                            <td>{{$row->owed}}</td>
                            <td>
                              <input type="hidden" name="amount" id="amount_{{$row->id}}" class="form-control" value="{{$row->owed}}" autocomplete="none">
                            </td>
                            <td><a href="#" cid="{{$row->id}}" data-fee="{{$row->fee}}"  class="paynow btn btn-success">Pay</a></td>
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
