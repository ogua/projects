@extends('layouts.main')


@section('title')
  Walters Dream Big | Edit Product
@endsection

@section('mtitle')
  Update Product
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

	   <div class="row">
      
                <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Product</h3>
                </div>
                 <div class="box-body">
                    <form method="post" action="{{route('update-product',['id'=>$product->id])}}" style="margin :4px;">
					@csrf

					<div class="form-group  @error('product-name') has-error @enderror">
				         <label class="control-label" for="inputError">Product Name</label>
				         <input type="text" class="form-control" value="{{$product->productname}}" name="product-name" id="inputError" placeholder="Enter ...">
				          <span class="help-block">@error('product-name') {{ $message }} @enderror</span>
				    </div>

				    <div class="form-group  @error('product-type') has-error @enderror">
				         <label class="control-label" for="inputError">Product Type</label>
				        <select name="product-type" class="form-control">
				        	<option value="{{$product->productType}}">{{$product->productType}}</option>
				        	<option value="Single Product">Single Product</option>
				        	<option value="Bundle Product">Bundle Product</option>
				        </select>
				    </div>


				    @if(empty($product->pieces))
					     <div class="form-group  @error('product-pieces') has-error @enderror" id="pieces" style="display: none;">
			                 <label class="control-label" for="inputError">Number of Items in Bundle</label>
			               <input type="number" class="form-control" value="{{$product->pieces}}" name="product-pieces" id="inputError" placeholder="Enter ...">
			                  <span class="help-block">@error('product-pieces') {{ $message }} @enderror</span>
			            </div>
		            @endif



				    <div class="form-group  @error('product-price') has-error @enderror">
				         <label class="control-label" for="inputError">Product Price</label>
				         <input type="number" class="form-control" value="{{$product->productprice}}" name="product-price" id="inputError" placeholder="Enter ...">
				          <span class="help-block">@error('product-price') {{ $message }} @enderror</span>
				    </div>



				    <div class="form-group  @error('prodcut-qty') has-error @enderror">
				         <label class="control-label" for="inputError">Product Quantity</label>
				         <input type="number" class="form-control" value="{{$product->quantuty}}" name="prodcut-qty" id="inputError" placeholder="Enter ...">
				          <span class="help-block">@error('prodcut-qty') {{ $message }} @enderror</span>
				    </div>


				    <div class="form-group  @error('shortage') has-error @enderror">
				         <label class="control-label" for="inputError">Shottage Alert Number</label>
				         <input type="number" class="form-control" value="{{$product->alert}}" name="shortage" id="inputError" placeholder="Enter ...">
				          <span class="help-block">@error('shortage') {{ $message }} @enderror</span>
				    </div>


				    <div class="form-group  @error('branch') has-error @enderror">
				         <label class="control-label" for="inputError">Product Recorded For Which Branch</label>

				          <select name="branch" class="form-control">
				        	
				        	 @foreach($branches as $branch)
			                  		@if($branch->branchode == $product->branchcode )
			                  			<option value="{{$product->branchcode}}">{{$branch->branchloc}} - Branch</option>
					        			
					        		@endif
					         @endforeach
				        	@foreach($branches as $branch)
				        		<option value="{{$branch->branchode}}">{{$branch->branchloc}} - Branch</option>
				        	@endforeach
				        </select>
				         
				    </div>

				    <input type="submit" name="submit" value="Update Product Info" class="btn btn-success">

				</form> 
                 </div>
                    
              </div>

            </div>


            <!-- <div class="col-md-8">
              
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">All Branches</h3>
                </div>
              
              </div>
             
            </div> -->



                  
        </div>


@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){


  });

</script>


@endsection
