@extends('layouts.main')


@section('title')
  OSMS | Request - Other Services
@endsection

@section('mtitle')
  Request - Other Services
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
        <h3 class="box-title" style="width: 100%;">Request - Other Services<b class="pull-right" style="border: 2px solid #fff; background-color: #ccc; padding: 5px;">Wallet GH&cent; {{$wallet->balance}}</b></h3>
      </div>
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Other Services</th>
                      <th>Currency</th>
                      <th>Qty</th>
                      <th>Amount</th>
                      <th>Request</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($semesterfee as $row)
                          <tr>
                            <td>{{$row->title}}</td>
                            <td>Gh&cent;</td>
                            <td>
                              <input type="number" name="qty" id="qty_{{$row->id}}" class="form-control" value="1" autocomplete="none">
                            </td>
                            <td>{{$row->fee}}</td>
                            <td><a href="#" cid="{{$row->id}}" data-title="{{$row->title}}" data-fee="{{$row->fee}}" data-feecode="{{$row->feecode}}" class="paynow btn btn-success">Request</a></td>
                          </tr>
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
    var title = $(this).data('title');
    var feecode = $(this).data('feecode');
    var qty = $("#qty_"+id).val();
    var _token = $('meta[name=csrf-token]').attr('content'); 

    var url = '{{ route('pay_other_services_fees') }}';

    //alert(fee + title + feecode + qty);

    //return;

    swal({
     title: "Are you sure?",
     text: title+" Others Services Request",
     icon: "warning",
     buttons: ['No', 'Yes Request'],
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

        url: '{{route('request_services')}}',
        type: 'POST',
        data: {_token : _token , id: id, fee: fee, title: title, qty: qty, feecode: feecode},
        success: function(data){ 

          if(data.match("success")){

               swal("Other Services Requested Successfully!",{
                 icon: 'success',
               });

               window.location.href=url;

          }else{

                swal("Failed To Request Other Services",{
                 icon: 'success',
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






  });

</script>


@endsection
