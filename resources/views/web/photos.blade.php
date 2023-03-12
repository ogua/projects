@extends('web.layout')

@section('style')

 <link href="{{ URL::to('web/css/gallarys.css')}}" rel='stylesheet' type='text/css' />

  <link href="{{ URL::to('web/css/lightbox.css')}}" rel='stylesheet' type='text/css' />

<link rel="stylesheet" type="text/css" href="{{ URL::to('web/css/set1.css')}}" />
@endsection


@section('banner')

@endsection

@section('main_content')

 <!--Gallery-->
      <section class="gallery py-lg-4 py-md-3 py-sm-3 py-3" Id="gallery">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <div class="title-sub text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
               <h3 class="text-left" style="border-bottom: 4px solid #272262">Photos of Stella Jomo</h3>
               <div class="line-w3ls-title text-center mb-md-4 mb-sm-3 mb-3"></div>
            </div>
            <div class="row grid gallery-info">
               
                  @foreach ($photos as $photo)
                  <div class="col-lg-3 col-md-6 col-sm-6 gallery-images">
                     <div class="gallery-grids">
                     <figure class="effect-milo">
                        <img src="{{asset('storage')}}/{{$photo->photos}}" alt="" class="img-fluid">
                        <figcaption>
                           <h5>Stella Jomo<span>Ministries</span></h5>
                           <p></p>
                           <a href="{{asset('storage')}}/{{$photo->photos}}" class="gallery-box" data-lightbox="example-set" data-title="">
                           </a>
                        </figcaption>
                     </figure>
                  </div>
                   </div>
                  @endforeach
               </div>
               
           
         </div>
      </section>
      <!--//Gallery-->

@endsection


@section('main_content_extral')

@endsection





@section('scriptTag')
  <script src="{{ URL::to('web/js/lightbox-plus-jquery.min.js')}}"></script>
@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    
  	//start
    $(document).on("","#", function(e){
      e.preventDefault();
      
     
    });
    //end


  });

</script>


@endsection