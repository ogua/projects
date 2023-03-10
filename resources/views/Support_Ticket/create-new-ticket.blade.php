@extends('layouts.main')

@section('title')
  OSMS | CREATE NEW TICKET
@endsection

@section('mtitle')
  CREATE NEW TICKET
@endsection

@section('main_content')
  
  <div class="row">
  <!-- left column -->
  <div class="col-md-7">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">CREATE NEW TICKET</h3>
      </div>
      <div class="box-body">
        <form method="POST" action="{{ route('post_ticket') }}">
          @csrf

          <div class="form-group @error('subject') has-error @enderror">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" value="{{old('subject')}}" id="subject" name="subject">
          </div>

          <div class="form-group  @error('message') has-error @enderror">
            <label for="message">Message</label>
            <textarea class="textarea-wysihtml5 form-control" value="{{old('message')}}" name="message">{{old('message')}}</textarea>
          </div>

          <div class="form-group  @error('did') has-error @enderror">
            <label for="did">Department</label>
            <select name="did" class="selectpicker form-control" value="{{old('did')}}">
              <option value=""></option>
              <option value="Admin">Admin / IT Office</option>
              <option value="Front Desk">Front Desk</option>
              <option value="Accounts">Accounts</option>
              <option value="Academics">Academics</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Create Ticket</button>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    


  });

</script>


@endsection