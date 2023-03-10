@extends('layouts.main')


@section('title')
Walters Dream Big |  Sales Per Month
@endsection

@section('mtitle')
Sales Per Month
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
        <h3 class="box-title">Sales Report</h3>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <labal>Select Date</labal>
                <input type="date" name="cdate" id="cdate" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <a href="#" id="getdetails" style="margin-top: 20px;" class="btn btn-success">Search</a>
            </div>
          </div>                   
        </div>
        <div class="col-md-4">
          <lable>Sales Per Month & Year</lable>
          <div class="row">
            <div class="col-md-6">
              <select class="form-control">
                <option>Month</option>
                <option>_________________</option>
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">Aug</option>
                <option value="9">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
              </select>
            </div>
            <div class="col-md-6">
             <select class="form-control">
              <option>Year</option>
              <option>2020</option>
              <option>2021</option>
              <option>2022</option>
              <option>2023</option>
              <option>2024</option>
              <option>2025</option>
            </select>
          </div>
        </div>
        <a href="#" id="getsalmnthyear" class="btn btn-success" style="margin-top: 5px;">Search</a>
      </div>
      <div class="col-md-4"></div>
    </div>


    <div class="clearfix"></div>

    <div class="box-body">
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th colspan="6">Sales Per Month</th>
            </tr>



            <tr>
              <th colspan="2">Start Date</th>
              <th colspan="2">End Date</th>
              <th colspan="1"></th>
            </tr>

            <tr>
              <th colspan="2"><input type="date" id="data1" class="form-control"></th>
              <th colspan="2"><input type="date" id="data2" class="form-control"></th>
              <th colspan="1"><a href="#" class="btn btn-success" id="searchs">Seach</th>
                <th colspan="1"></th>
              </tr>

              <tr>
                <th>S.N</th>
                <th>Sold By</th>
                <th>Branch</th>
                <th>Product Name</th>
                <th>Qty Sold</th>
                <th>Qty BFS</th>
                <th>Qty AFS</th>
                <th>Price</th>
                <th>Description</th>
                <th>Sold</th>
                <th>Date</th>
              </tr>
            </thead>

            <tbody>
              @foreach($sales as $row)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                  @foreach($users as $user)
                  @if($user->id == $row->user_id)
                  {{$user->fullname}}
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
                  <td>{{$row->created_at}}</td>

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


     $(document).on("click","#searchss",function(e){
      e.preventDefault();

      var sdate = $("#data1").val();
      var edate = $("#data2").val();
      var code = '{{$code}}';

      if (sdate == "") {
       alert("Start Date Cant be Empty");
       return;
     }

     if (edate == "") {
       alert("End Date Cant be Empty");
       return;
     }

     var _token = $('meta[name=csrf-token]').attr('content');
     _this = $(this);

     $.ajax({
       url: '/Walters/DreamBig/salesmonth/data/'+code,
       type: 'POST',
       data: {_token : _token , sdate: sdate, edate: edate},
       success: function(data){
						//alert(data);
						$("#displayhere").html(data);
           $("#data1").val("");
           $("#data2").val("");
         },
         error: function (data) {
           console.log('Error:', data);
           $("#msg").text('Sorry, Something error :(').show();
         }
       });



   });




     $(document).on("click","#searchs",function(e){
      e.preventDefault();

      


      var sdate = $("#data1").val();
      var edate = $("#data2").val();
      var code = '{{$code}}';

      if (sdate == "") {
        alert("Start Date Cant be Empty");
        return;
      }

      if (edate == "") {
        alert("End Date Cant be Empty");
        return;
      }

      // var url = '/Walters/DreamBig/salesmonth/data/'+code+'/'+sdate+'/'+edate;

      //console.log(url);
      //return;


      $('#example1').DataTable({
        processing: true,
        serverSide: true,
        "bDestroy": true,
        ajax: '/Walters/DreamBig/salesmonth/data/'+code+'/'+sdate+'/'+edate,
        dom: 'lBfrtip',
        buttons: [
        'copy',
        'csv',
        'excel',
        'pdf',
        'print'
        ],
        columns: [
        {data:  'DT_RowIndex'},
        {data: 'add_user'},
        {data: 'add_branch'},
        {data: 'productname'},
        {data: 'quantity'},
        {data: 'nbs'},
        {data: 'nas'},
        {data: 'price'},
        {data: 'sold'},
        {data: 'created_at'},
        {data: 'date'}
        ]

      });


      console.log('/Walters/DreamBig/salesmonth/data/'+code+'/'+sdate+'/'+edate);

      $("#data1").val("");
      $("#data2").val("");

      $('#salespermonth').DataTable().fnDestroy();



    });


     $(document).on('click', '#getdetails', function(event) {
      event.preventDefault();
      /* Act on the event */
      var date = $("#cdate").val();
      var code = '{{$code}}';
      if(date == ""){
        alert("Date Cant be Empty");
      }else{


        $('#example1').DataTable({
          processing: true,
          serverSide: true,
          "bDestroy": true,
          ajax: '/Walters/DreamBig/sales/record/perdate/'+code+'/'+date,
          dom: 'lBfrtip',
          buttons: [
          'copy',
          'csv',
          'excel',
          'pdf',
          'print'
          ],
          columns: [
          {data:  'DT_RowIndex'},
          {data: 'add_user'},
          {data: 'add_branch'},
          {data: 'productname'},
          {data: 'quantity'},
          {data: 'nbs'},
          {data: 'nas'},
          {data: 'price'},
          {data: 'sold'},
          {data: 'created_at'},
          {data: 'date'}
          ]

        });

        console.log('/Walters/DreamBig/sales/record/perdate/'+code+'/'+date);

      }
      
    });









   });

 </script>


 @endsection
