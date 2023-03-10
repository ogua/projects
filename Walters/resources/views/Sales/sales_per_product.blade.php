@extends('layouts.main')


@section('title')
  Walters Dream Big |  Sales Per Product
@endsection

@section('mtitle')
  Sales Per Product
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
                  <h3 class="box-title">Sales Per Product</h3>
                </div>
                 <div class="box-body">
                   <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th colspan="6">Sales Per Product</th>
                  </tr>

                  

                  <tr>
                    <th colspan="3">Select Product</th>
                    <th colspan="1"></th>
                    <th colspan="1"></th>
                  </tr>

                  <tr>
                    <th colspan="3">
                       <select class="form-control select2" name="product-name" id="proname" style="width: 100%;">
                        <option></option>              
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->productname}}</option>
                        @endforeach
                    </select>
                    </th>
                    <th colspan="1"></th>
                    <th colspan="1"></th>
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
  		var code = '{{$code}}';

       $('#example1').DataTable({
        processing: true,
        serverSide: true,
        "bDestroy": true,
        ajax: '/Walters/DreamBig/salepProduct/data/'+code+'/'+value,
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

    console.log('/Walters/DreamBig/salepProduct/data/'+code+'/'+value);

    $("#value").val("");

  		
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

  		var _token = $('meta[name=csrf-token]').attr('content');
			_this = $(this);
  		
  		$.ajax({
					url: '{{route('sales-per-month-data',['code'=> '+code+'])}}',
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


  	

  });

</script>


@endsection
