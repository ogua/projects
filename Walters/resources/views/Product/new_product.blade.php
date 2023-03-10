@extends('layouts.main')


@section('title')
  Walters Dream Big | Add Product
@endsection

@section('mtitle')
  Add Product
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
      
      <div id="alertdisplay"></div>
       <div class="row">
      
                <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add New Product</h3>
                </div>
                <div class="box-body">
                    <form method="post" action="{{route('save-product')}}" style="margin :4px;" id="saveproductd" >
                        @csrf
                        <div class="form-group  @error('product-name') has-error @enderror">
                               <label class="control-label" for="inputError">Product Name</label>
                               <input type="text" class="form-control" value="{{old('product-name')}}" name="product-name" id="prduname" placeholder="Enter ...">
                                <span class="help-block" id="prname" style="color: red;">@error('product-name') {{ $message }} @enderror</span>
                          </div>

                          <div class="form-group  @error('product-type') has-error @enderror">
                               <label class="control-label" for="inputError">Product Type</label>
                              <select name="product-type" id="product-type" class="form-control">
                                <option value="{{old('product-type')}}">{{old('product-type')}}</option>
                                <option value="Single Product">Single Product</option>
                                <option value="Bundle Product">Bundle Product</option>
                              </select>
                              <span class="help-block" id="prdtype" style="color: red;">@error('product-name') {{ $message }} @enderror</span>
                          </div>



                          <div class="form-group  @error('product-pieces') has-error @enderror" id="pieces" style="display: none;">
                               <label class="control-label" for="inputError">Number of Items in Bundle</label>
                             <input type="number" class="form-control" value="{{old('product-pieces')}}" name="product-pieces" id="prdctpieces" placeholder="Enter ...">
                                <span class="help-block" style="color: red;">@error('product-pieces') {{ $message }} @enderror</span>
                          </div>



                          <div class="form-group  @error('product-price') has-error @enderror">
                               <label class="control-label" for="inputError">Product Price</label>
                               <input type="text" class="form-control" value="{{old('product-price')}}" name="product-price" id="prodcutpx" placeholder="Enter ...">
                                <span class="help-block" id="prdvtpx" style="color: red;">@error('product-price') {{ $message }} @enderror</span>
                          </div>

                          <div class="form-group  @error('prodcut-qty') has-error @enderror">
                               <label class="control-label" for="inputError">Product Quantity</label>
                               <input type="number" class="form-control" value="{{old('prodcut-qty')}}" name="prodcut-qty" id="prductqty" placeholder="Enter ...">
                                <span class="help-block" id="prdqty" style="color: red;">@error('prodcut-qty') {{ $message }} @enderror</span>
                          </div>

                          <div class="form-group  @error('shortage') has-error @enderror">
                               <label class="control-label" for="inputError">Shottage Alert Number</label>
                               <input type="number" class="form-control" value="{{old('shortage')}}" name="shortage" id="alert" placeholder="Enter ...">
                                <span class="help-block" id="dalert" style="color: red;">@error('shortage') {{ $message }} @enderror</span>
                          </div>


                          <div class="form-group  @error('branch') has-error @enderror">
                               <label class="control-label" for="inputError">Product Recorded For Which Branch</label>

                                <select name="branch" id="branch" class="form-control">
                                <option value="{{old('branch')}}">{{old('branch')}}</option>
                                @foreach($branches as $branch)
                                  <option value="{{$branch->branchode}}">{{$branch->branchloc}} - Branch</option>
                                @endforeach
                              </select>
                              <span class="help-block" id="bcode" style="color: red;">@error('shortage') {{ $message }} @enderror</span>

                          </div>


                          <button class="btn btn-success" type="button" disabled id="display" style="display: none;">
                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                           Loading...
                        </button>


                          <input type="submit" name="submit" value="Add Product" class="btn btn-success">
                      </form>  
                  </div> 
                    
              </div>

            </div>


            <div class="col-md-8">
              
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Products Added</h3>
                </div>
                <div class="box-body table-responsive">
                    <table id="products" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>S.N</th>
                        <th>Branch</th>
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th width="25%">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        
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

      $(document).on("change","#product-type",function(e){
        e.preventDefault();
        var value = $(this).val();

        if (value == 'Single Product') {
            $("#pieces").fadeOut(1000);
        }else{
           $("#pieces").fadeIn(1000);
        }

      });


      $(document).on("submit","#saveproductd",function(e){
        e.preventDefault();

        var prduname = $("#prduname").val();
        var prdtype =  $("#product-type").val();
        var prodcutpx = $("#prodcutpx").val();
        var prductqty = $("#prductqty").val(); 
        var alert = $("#alert").val(); 
        var branch = $("#branch").val();


        if (prduname == "" || prdtype == "" || prodcutpx == "" || prductqty == "" || alert == "" || branch == "" ) {

          if (prduname == "") {
            $("#prname").html('Product name cant be Empty');
          }else{
             $("#prname").html('');
          }



          if (prdtype == "") {
            $("#prdtype").html('Product Type cant be Empty');
          }else{
             $("#prdtype").html('');
          }


          if (prodcutpx == "") {
            $("#prdvtpx").html('Product Price cant be Empty');
          }else{
             $("#prdvtpx").html('');
          }



          if (prductqty == "") {
            $("#prdqty").html('Product Quantity cant be Empty');
          }else{
             $("#prdqty").html('');
          }



          if (alert == "") {
            $("#dalert").html('Product Alert cant be Empty');
          }else{
             $("#dalert").html('');
          }


          if (branch == "") {
            $("#bcode").html('Branch cant be Empty');
          }else{
             $("#bcode").html('');
          }

          // prname,prdtype,prdvtpx,prdqty,dalert,bcode


          return;
        }


        $("#prname").html('');
        $("#prdtype").html('');
        $("#prdvtpx").html('');
        $("#prdqty").html('');
        $("#dalert").html('');
        $("#bcode").html('');



        $.ajax({
          beforeSend:function(){
            $("#display").show();
            $("#submit").hide();
          },complete:function(){
            $("#display").hide();
            $("#submit").show();
          },
          url: '{{route('save-product')}}',
          type: 'POST',
          contentType: false,
          processData: false,
          cache: false,
          data: new FormData(this),
          success: function(data){
             $("#alertdisplay").html(data);
             clearfield();
             $('#products').DataTable().ajax.reload();
          }
        });

      });


      function clearfield(){
        $("#prduname").val("");
        $("#product-type").val("");
        $("#prodcutpx").val("");
        $("#prductqty").val(""); 
       $("#alert").val(""); 
       $("#branch").val("");
      }



      $(document).on("click","#deleteprdct", function(e){
        e.preventDefault();
        var cid = $(this).attr("cid");
        //alert(cid);
        var ajaxs = 'ajax';
        //return;
        if (confirm("Are You Sure ?")) {
          $.ajax({
            url: '/Walters/DreamBig/delete-product/'+cid,
            method: 'get',
            data: {ajaxs: ajaxs},
            success: function(data){
              $("#alertdisplay").html(data);
              $('#products').DataTable().ajax.reload();
            }
          });
        }
      });



    // getdetails();

    // function getdetails(){

    //  var _token = $('meta[name=csrf-token]').attr('content');
    //   _this = $(this);

    //   $.ajax({
    //       url: '/Walters/DreamBig/getproducts/user',
    //       type: 'POST',
    //       data: {_token : _token},
    //       success: function(data){
    //         $("#showdetails").html(data);
    //       },
    //             error: function (data) {
    //               console.log('Error:', data);
    //               $("#msg").text('Sorry, Something error :(').show();
    //             }
    //     });
    // }





$('#products').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('all-product-display') }}',
        dom: 'lBfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            'print'
        ],
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'branchcode'},
            {data: 'productname'},
            {data: 'productType'},
            {data: 'quantuty'},
            {data: 'productprice'},
            {data: 'action', name: 'action'},
        ]




    });








  });

</script>


@endsection
