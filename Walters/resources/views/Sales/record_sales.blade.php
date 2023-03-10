@extends('layouts.main')


@section('title')
  Walters Dream Big | Record Sales
@endsection

@section('mtitle')
  Record Sales
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

      <?php 
          $code = Request::segment(2);
      ?>


       @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Success!</h4>
                    {{ session('message') }}
                </div>
            @endif

             @if (session()->has('messages'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                    {{ session('messages') }}
                </div>
            @endif

         @if ($agent->isMobile())            
            <div class="row">
      
                <!-- left column -->
                <div class="col-md-4">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Record Sales</h3>
                    </div>
                     <div class="box-body">
                         <form method="post" action="" style="margin :4px;" id="recordsales">
                    @csrf
                    <div class="form-group  @error('product-name') has-error @enderror">
                              <label>Select Product</label>
                              <select class="form-control select2" name="product-name"
                               id="proname" style="width: 100%;">
                                <option></option>              
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->productname}}</option>
                                @endforeach
                              </select>

                              <span class="invalid-feedbac has-error" role="alert" style="color: red;">
                                      <strong id="prodname"></strong>
                              </span>  
                           </div>


                      <div class="form-group  @error('product-type') has-error @enderror"style="display: none;" id="singledisplay">
                           <label class="control-label" for="inputError">Are You Selling All the Bundle or Some of It, Specify</label>
                          <select name="product-type" class="form-control" >
                            <option value="{{old('product-type')}}">{{old('product-type')}}</option>
                            <option value="Single Product">Selling Single</option>
                            <option value="Bundle Product">Selling Bundle</option>
                          </select>
                      </div>


                       <div class="form-group  @error('prodcut-qty') has-error @enderror">
                           <label class="control-label" for="inputError">Enter Quantity</label>
                           <input type="number" class="form-control" value="{{old('prodcut-qty')}}" name="prodcut-qty" id="proqty" placeholder="Enter ...">
                            <span class="help-block" id="prdqty" style="color: red;"></span>
                      </div>


                      <div class="form-group  @error('product-price') has-error @enderror">
                           <label class="control-label" for="inputError">Enter Price</label>
                           <input type="number" class="form-control" value="{{old('product-price')}}" name="product-price" id="propx" placeholder="Enter ...">
                            <span class="help-block" id="prdprx" style="color: red;"></span>
                      </div>


                     
                    <button class="btn btn-success" type="button" disabled id="display" style="display: none;">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                       Loading...
                    </button>

                      <input type="submit" name="submit" value="Record Sales" class="btn btn-success" id="submit">



                  </form> 
                     </div>
                        
                  </div>

                </div>
                      
            </div>
        @else    
            <div class="row">
              <div class="col-md-4">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Record Sales</h3>
                    <a href="{{route('new-record-sales',['code'=> $code])}}" onclick="return confirm('Record New Sales')" class="pull-right btn btn-success"><i class="fa fa-plus"></i></a>
                  </div>
                   <div class="box-body">
                      <form method="post" action="" style="margin :4px;" id="recordsales">
          @csrf
          <div class="form-group  @error('product-name') has-error @enderror">
                    <label>Select Product</label>
                    <select class="form-control select2" name="product-name"
                     id="proname" style="width: 100%;">
                      <option></option>              
                      @foreach($products as $product)
                          <option value="{{$product->id}}">{{$product->productname}}</option>
                      @endforeach
                    </select>

                    <span class="invalid-feedbac has-error" role="alert" style="color: red;">
                            <strong id="prodname"></strong>
                    </span>  
                 </div>


            <div class="form-group  @error('product-type') has-error @enderror"style="display: none;" id="singledisplay">
                 <label class="control-label" for="inputError">Are You Selling All the Bundle or Some of It, Specify</label>
                <select name="product-type" class="form-control" >
                  <option value="{{old('product-type')}}">{{old('product-type')}}</option>
                  <option value="Single Product">Selling Pieces</option>
                  <option value="Bundle Product">Selling Bundle</option>
                </select>
            </div>


             <div class="form-group  @error('prodcut-qty') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Quantity</label>
                 <input type="number" class="form-control" value="{{old('prodcut-qty')}}" name="prodcut-qty" id="proqty" placeholder="Enter ...">
                  <span class="help-block" id="prdqty" style="color: red;"></span>
            </div>

            <div class="form-group  @error('product-price') has-error @enderror">
                 <label class="control-label" for="inputError">Enter Price</label>
                 <input type="number" class="form-control" value="{{old('product-price')}}" name="product-price" id="propx" placeholder="Enter ...">
                  <span class="help-block" id="prdprx" style="color: red;"></span>
            </div>


         

           
          <button class="btn btn-success" type="button" disabled id="display" style="display: none;">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
             Loading...
          </button>

            <input type="submit" name="submit" value="Record Sales" class="btn btn-success" id="submit">



        </form> 
                   </div>
                      
                </div>

              </div>
              <div class="col-md-8">
                
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Sales Display</h3>
                  </div>
                    <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>                  
                <tr>
                  <th>S.N</th>
                  <th>Sold By</th>
                  <th>Branch</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>

               
                </thead>
               
                <tbody id="showdetails">
                  
                
                </tbody>
             </table>

             <div class="clearfix"></div>
             <div class="col-md-4">
               
             
             <div id="displayit"></div>
            
              <form target="_blank" method="post" action="{{route('print-invoice',['code'=> auth()->user()->branncode])}}">
                  @csrf
                  <tr>
                    <td colspan="2"><input type="text" name="customer" placeholder="customer Name" class="form-control" required></td>

                    <td colspan="2"><input type="text" name="phone" placeholder="Mobile Number" class="form-control" required></td>

                    <!-- <td colspan="1"><a href="" target="_blank" id="prints" class="pull-right btn btn-default">Print Invoice</a></td> -->

                    <td colspan="1"> <input type="submit" name="submit" value="Print Invoice" class="btn btn-default"> </td>
                  </tr>
                </form>

                </div>

            </div>  
                </div>
               
              </div>
                  
            </div>
        @endif
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


     $(document).on("click","#print",function(){
        var mode = 'iframe'; // popup
        var close = mode == "popup";
        var options = { mode : mode, popClose : close};
        $("#example19").printArea(options);
      });



     $(document).on("submit","#recordsales",function(e){
        e.preventDefault();
        //alert('working');

        var prd = $("#proname").val();
        var pqty = $("#proqty").val();
        var propx = $("#propx").val();

        if (prd == "" || pqty == "" || propx == "") {
         
          if (prd == "") {
            $("#prodname").html('Product name cant be empty');
          }else{
            $("#prodname").html('');
          }

          if (pqty == "") {
            $("#prdqty").html('Product name cant be empty');
          }else{
            $("#prdqty").html('');
          }


          if (propx == "") {
            $("#prdprx").html('Product name cant be empty');
          }else{
            $("#prdprx").html('');
          }

          // prodname,prdqty,prdprx
          return;
        }

        $("#prodname").html('');
        $("#prdqty").html('');
        $("#prdprx").html('');

        $.ajax({
          beforeSend:function(){
            $("#display").show();
            $("#submit").hide();
          },complete:function(){
            $("#display").hide();
            $("#submit").show();
          },
          url: '{{route('sale-save')}}',
          type: 'POST',
          contentType: false,
          processData: false,
          cache: false,
          data: new FormData(this),
          success: function(data){
             $("#alert").html(data);
            $("#proname").val("");
            $("#proqty").val("");
            $("#propx").val("");

             getdetails();
          }
        });
     })

 
     //load datatables

     getdetails();

    function getdetails(){

     var _token = $('meta[name=csrf-token]').attr('content');
      _this = $(this);

      var code = '{{$code}}';

      //alert(code);

      $.ajax({
          url: '/Walters/DreamBig/getyousale/user/'+code,
          type: 'POST',
          data: {_token : _token},
          success: function(data){

            $("#showdetails").html(data);
          },
                error: function (data) {
                  console.log('Error:', data);
                  $("#msg").text('Sorry, Something error :(').show();
                }
        });
    }






  });

</script>


@endsection