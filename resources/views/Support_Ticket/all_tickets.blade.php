@extends('layouts.main')


@section('title')
  OSMS | Support Tickets - All Tickets
@endsection

@section('mtitle')
  All Tickets
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
        <h3 class="box-title">All Support Tickets</h3>
      </div>
      <div class="box-body">
        <table class="table data-table table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 10%;">Client Name</th>
                                    <th style="width: 10%;">Email</th>
                                    <th style="width: 10%;">Index Number</th>
                                    <th style="width: 20%;">Subject</th>
                                    <th style="width: 10%;">Date</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 25%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($st as $in)
                                    <tr>
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$in->name}}</td>
                                        <td>{{$in->email}}</td>
                                        <td>{{$in->indexnumber}}</td>
                                        <td>{{$in->subject}}</td>
                                        <td>{{ date('jS M y', strtotime($in->date))}}</td>
                                        <td>
                                            @if($in->status=='Pending')
                                                <span class="label label-danger">Pending</span>
                                            @elseif($in->status=='Answered')
                                                <span class="label label-success">Answered</span>
                                            @elseif($in->status=='Customer Reply')
                                                <span class="label label-info">Customer Reply</span>
                                            @else
                                                <span class="label label-primary">Closed</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('view_tickets',['id'=> $in->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Manage</a>
                                            <a href="#" class="btn btn-danger btn-xs cdelete" cid="{{$in->id}}"><i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

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

    $(document).on('click', '.cdelete', function(event) {
      event.preventDefault();
      var cid = $(this).attr("cid");
      var url = '{{Request::url()}}';

      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Ticket.",
        icon: "warning",
        buttons: ['Cancel', 'Delete Ticket'],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) { 
           
           var _token = $('meta[name=csrf-token]').attr('content');
              
            $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('delete_ticket')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid},
                    success: function(data){ 

                      swal(data, {
                             icon: "success",
                      });

                      window.location.href=url;

                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });

        }
    });


    });


  });

</script>


@endsection