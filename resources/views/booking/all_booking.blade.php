@extends('layouts.main')


@section('title')
  Doctotrs Appointment Booking | All Booking
@endsection

@section('mtitle')
  Booking
@endsection


@section('mtitlesub')
    all Booking
@endsection



@section('main_content')

    <div class="panel panel-info">
        <div class="panel panel-heading">All Booking </div>
        <div class="panel panel-body">

           @if(Session::has('message'))
            <div class="callout {{Session::get('type')}}">
                <h4>{{Session::get('title')}}</h4>
                <p>{{Session::get('message')}}</p>
              </div>
            @endif

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Appoitment ID</th>
                  <th>User id</th>
                  <th>Gender</th>
                  <th>Age</th>
                  <th>Category</th>
                  <th>Booked on</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($booking as $bookings)
                <tr>
                  <td>{{$bookings->appid}}</td>
                  <td>{{$bookings->user_id}}</td>
                  <td>{{$bookings->gender}}</td>
                  <td>{{$bookings->age}}</td>
                  <td>{{$bookings->categoty}}</td>
                  <td>{{$bookings->created_at}}</td>
                  <td>
                    <a href="{{ route('edit-booking', ['id'=> $bookings->id]) }}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Edit</a>
                    <a href="{{ route('edit-booking', ['id'=> $bookings->id]) }}" class="btn btn-success" ><i class='fa fa-eye'></i>View</a>
                    @can("delete-book")
                      <a href="#" onclick="if(confirm('Are You Sure ?')){ event.preventDefault(); document.getElementById('delete-booking_{{$bookings->id}}').submit(); }" class="btn btn-danger"><i class='fa fa-trash'></i>Delete</a>
                      <form id="delete-booking_{{$bookings->id}}" action="{{ route('delete-booking', ['id'=> $bookings->id ]) }}" method="POST" style="display: none;">
                    
                        @csrf
                    </form>
                    @endcan
                  </td>
                </tr>
               
                @endforeach
                </tbody>
             </table>
            
            </div>    
        </div>
    </div>

@endsection
