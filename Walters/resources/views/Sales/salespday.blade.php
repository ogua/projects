@extends('layouts.main')


@section('title')
Walters Dream Big |  Sales Per Day
@endsection

@section('mtitle')
Sales Per Day
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
        <h3 class="box-title">Sales Per Day</h3>
      </div>

      <div class="box-body">
       <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th colspan="6">Sales Per Today</th>
            </tr>
            <tr>
              <th>S.N</th>
              <th>Sold By</th>
              <th>Branch</th>
              <th>Product Name</th>
              <th>Qty Sold</th>
              <th>Qty Before Sales</th>
              <th>Qty After Sales</th>
              <th>Price</th>
              <th>Description</th>
              <th>Sold</th>
            </tr>
          </thead>

          <tbody>
            @foreach($sales as $row)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>
               @foreach($users as $user)
               @if($user->id == $row->user_id)
               {{auth()->user()->fullname}}
               @endif                   
               @endforeach
             </td>
             <td>
              @foreach($branches as $branch)
              @if($branch->branchode == $row->brancode)
              {{$branch->branchloc}}
              @endif
              @endforeach
              <td>{{$row->productname}}</td>
              <td>{{$row->quantity}}</td>
              <td>{{$row->nbs}}</td>
              <td>{{$row->nas}}</td>
              <td>{{$row->price}}</td>
              <td>{{$row->sold}}</td>
              <td>{{\Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>    
    </div>

  </div>

</div>


</div>
@endsection




@section('script')

<script type="text/javascript">

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('document').ready(function(){

    $(document).on("change","#product-types",function(e){
      e.preventDefault();
      var value = $(this).val();
      //alert(value);
      //return;
      if (value == 'Bundle Product') {
        $("#singledisplay").show();
      }else{
        $("#singledisplay").hide();
      }
    });


    $(document).on("change","#proname",function(e){
      e.preventDefault();
      var value = $(this).val();
      var _token = $('meta[name=csrf-token]').attr('content');
      _this = $(this);
      //alert(value);
      $.ajax({
        url: '{{route('search-product')}}',
        type: 'POST',
        data: {_token : _token , value: value},
        success: function(data){
          if (data.match("bundel")) {
            $("#singledisplay").show();
          }else{
            $("#singledisplay").hide();
          }
        },
        error: function (data) {
          console.log('Error:', data);
          $("#msg").text('Sorry, Something error :(').show();
        }
      });
      
    });
    

  });

</script>


@endsection
