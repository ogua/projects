@extends('layouts.main')


@section('title')
  Walters Dream Big | Update Product Quantity
@endsection

@section('mtitle')
  update quantity
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

             @if (session()->has('messages'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                    {{ session('messages') }}
                </div>
            @endif

            <div class="row">
      
                <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Product Quantity</h3>
                </div>
                 <div class="box-body"> 
        <form method="post" action="{{route('qantity-update-save',['id'=>$product->id])}}" style="margin :4px;">
          @csrf

          <div class="form-group  @error('product-name') has-error @enderror">
                 <label class="control-label" for="inputError">Product Name</label>
                 <input type="text" class="form-control" value="{{$product->productname}}" name="product-name" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('product-name') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('product-type') has-error @enderror">
                 <label class="control-label" for="inputError">Product Type</label>
                 <input type="text" name="product-type" value="{{$product->productType}}" class="form-control" >
               
            </div>



            <div class="form-group  @error('prodcut-qty') has-error @enderror">
                 <label class="control-label" for="inputError">Quantity Left</label>
                 <input type="number" class="form-control" value="{{$product->quantuty}}" name="prodcut-qty" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('prodcut-qty') {{ $message }} @enderror</span>
            </div>

            <div class="form-group  @error('prodcut-add') has-error @enderror">
                 <label class="control-label" for="inputError">Quantity To Add</label>
                 <input type="number" class="form-control" value="{{old('prodcut-add')}}" name="prodcut-add" id="inputError" placeholder="Enter ...">
                  <span class="help-block">@error('prodcut-add') {{ $message }} @enderror</span>
            </div>  
            


           

            <input type="submit" name="submit" value="Update Product Quantity" class="btn btn-success">

        </form> 
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

  });

</script>


@endsection
