@extends('layouts.main')


@section('title')
  Walters Dream Big | Edit Branch Information
@endsection

@section('mtitle')
  Edit Branch
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
                  <h3 class="box-title">Update Branch Info</h3>
                </div>
                    <form method="post" action="{{route('update-branch',['id'=> $branch->id])}}" style="margin :4px;">
                          @csrf
                          <div class="box-body">
                              <div class="form-group  @error('branch-location') has-error @enderror">
                                     <label class="control-label" for="inputError">Branch Location</label>
                                     <input type="text" class="form-control" value="{{$branch->branchloc}}" name="branch-location" id="inputError" placeholder="Enter ...">
                                      <span class="help-block">@error('branch-location') {{ $message }} @enderror</span>
                                </div>

                                <div class="form-group  @error('contact-number') has-error @enderror">
                                     <label class="control-label" for="inputError">Contact Number</label>
                                     <input type="text" class="form-control" value="{{$branch->contact}}" name="contact-number" id="inputError" placeholder="Enter ...">
                                      <span class="help-block">@error('contact-number') {{ $message }} @enderror</span>
                                </div>

                                <input type="submit" name="submit" value="Update Information" class="btn btn-success">
                          </div>

                    </form> 
                    
              </div>

            </div>


           <!--  <div class="col-md-8">
              
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
