@extends('layouts.main')


@section('title')
  Doctotrs Appointment Booking | New Booking
@endsection

@section('mtitle')
  Booking
@endsection


@section('mtitlesub')
    New Booking
@endsection



@section('main_content')

    <div class="panel panel-info">
        <div class="panel panel-heading">Edit Booking </div>
        <div class="panel panel-body">

           @if(Session::has('message'))
            <div class="callout callout-success">
                <h4>successfully!</h4>
                <p>{{Session::get('message')}}</p>
              </div>
            @endif

            <form action="{{ route('Update-booking') }}" method="POST">
            <input type="hidden" name="bookid" value="{{ $booking->id }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('appid')has-error @enderror">
                        <label class="control-label" for="inputSuccess">Appointment ID</label>
                        <input type="text" class="form-control" name="appid" value="{{ ($booking->appid) }}" id="inputSuccess" placeholder="Enter ..." disabled>
                        <span class="help-block">@error('appid'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group @error('gender')has-error @enderror">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                        <option>{{ ($booking->gender) }}</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <span class="help-block">@error('gender'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('age') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Age</label>
                        <input type="number" class="form-control" value="{{ ($booking->age) }}"  name="age" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('age'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group @error('category') has-error @enderror">
                    <label>Select Category</label>
                    <select class="form-control" name="category">
                    <option>{{ ($booking->categoty) }}</option>
                    <option value="General Physician">General Physician</option>
																  <option value="Bone">Bone</option>                                
																<option value="Heart">Heart</option>
																  <option value="Dentist">Dentist</option>
																 <option value="Neurologist">Neurologist</option>
																 <option value="Kidney">Kidney</option>
																 <option value="Cardiologist">Cardiologist</option> 
																 <option value="Plastic Surgeon">Plastic Surgeon</option> 
                    </select>
                    <span class="help-block">@error('category'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('appdate') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Appointment Date</label>
                        <input type="date" class="form-control" value="{{ ($booking->appdate) }}" name="appdate" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('appdate'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="col-md-6">
                <div class="form-group @error('apptime') has-error @enderror">
                        <label class="control-label" for="inputSuccess">Appointment Time</label>
                        <input type="time" class="form-control" value="{{ ($booking->apptime) }}" name="apptime" id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">@error('apptime'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>


            <input type="submit" class="btn btn-info" value="Edit Booking">
            </form>
        </div>
    </div>

@endsection
