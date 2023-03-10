@extends('layouts.main')

@section('title')
  OSMS | Ticket Details
@endsection

@section('mtitle')
  Ticket Details
@endsection

@section('main_content')
  <div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"></h3>
      </div>
      <div class="box-body">
          <div class="row">
                                <div class="col-lg-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#ticket_details" aria-controls="home" role="tab" data-toggle="tab">
                                        Ticket Details</a></li>
                                        <li role="presentation"><a href="#ticket_discussion" aria-controls="profile" role="tab" data-toggle="tab">Ticket Discussion</a></li>
                                        <li role="presentation"><a href="#ticket_files" aria-controls="messages" role="tab" data-toggle="tab">Ticket Files</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content p-20">


                                        {{--Personal Details--}}
                                        <div role="tabpanel" class="tab-pane active" id="ticket_details">

                                                <div class="clearfix ticket-de-pane">
                                                    <span class="ticket-status-title">Ticket For:</span>
                                                    <span class="ticket-status-content">{{$st->name}}</span>
                                                </div>

                                                <div class="clearfix ticket-de-pane">
                                                    <span class="ticket-status-title">Email:</span>
                                                    <span class="ticket-status-content">{{$st->email}}</span>
                                                </div>

                                                <div class="clearfix ticket-de-pane">
                                                    <span class="ticket-status-title">Created Date:</span>
                                                    <span class="ticket-status-content">{{ date('jS M y', strtotime($st->date))}}</span>
                                                </div>

                                                <div class="clearfix ticket-de-pane">
                                                    <span class="ticket-status-title">Created By:</span> {{$st->name}}
                                                </div>

                                                <div class="clearfix ticket-de-pane">
                                                    <span class="ticket-status-title">Department:</span>
                                                    <span class="ticket-status-content">{{$st->did}}</span>
                                                </div>

                                                <div class="clearfix ticket-de-pane">
                                                    <span class="ticket-status-title">Status:</span>
                                                    @if($st->status=='Pending')
                                                        <span class="label label-danger">Pending</span>
                                                    @elseif($st->status=='Answered')
                                                        <span class="label label-success">Answered</span>
                                                    @elseif($st->status=='Customer Reply')
                                                        <span class="label label-info">Customer Reply</span>
                                                    @else
                                                        <span class="label label-primary">Closed</span>
                                                    @endif
                                                </div>

                                                @if($st->status=='Closed')
                                                    <div class="clearfix ticket-de-pane">
                                                        <span class="ticket-status-title">Closed By:</span>
                                                        <span class="ticket-status-content">{{$st->closed_by}}</span>
                                                    </div>
                                                @endif

                                                <div class="m-t-30"></div>

                                                <div class="clearfix">
                                                    <span class="ticket-status-title">Subject:</span>
                                                    <span class="ticket-status-content">{{$st->subject}}</span>
                                                </div>
                                                <div class="clearfix">
                                                    <span class="ticket-status-title">Message:</span>
                                                    <div class="ticket-status-content">{!!$st->message!!}</div>
                                                </div>



                                        </div>


                                        <div role="tabpanel" class="tab-pane" id="ticket_discussion">
                                            <form method="POST" action="{{ route('reply_ticket_student') }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                <div class="form-group">
                                                    <label for="message">Message</label>
                                                    <textarea class="textarea-wysihtml5 form-control"  name="message"></textarea>
                                                </div>


                                                <div class="hr-line-dashed"></div>
                                                <input type="hidden" value="{{$st->id}}" name="cmd">
                                                <button type="submit" name="add" class="btn btn-success">Reply Ticket <i class="fa fa-reply"></i></button>
                                            </form>
                                            <div style="margin-top: 30px;"></div>

                                            <div class="support-replies">
                                                @foreach($trply as $tr)
                                                    @if($tr->cl_id=='0')

                                                        <div class="single-support-reply clearfix admin">
                                                            <div class="reply-info">
                                                          @if($tr->image=='admin')

                                                              @php
                                                              $user = \App\User::where('id',$st->admin_id)->first();
                                                              @endphp

                                                              @if($user)
                                                              <img class="reply-user-thumb" src="{{asset('storage')}}/{{$user->pro_pic}}" height="80px" width="80px">
                                                              @else
                                                              <img class="reply-user-thumb" src="{{ URL::to('images/co.png')}}" height="80px" width="80px">
                                                              @endif


                                                          @else
                                                              <img class="reply-user-thumb" src="{{ URL::to('images/co.png')}}" height="80px" width="80px">
                                                          @endif

                                                                <div class="reply-info-text">
                                                                    <h4 class="reply-user-name">{{$tr->admin}}</h4>
                                                                    <h5 class="reply-date"> {{ date('jS M y', strtotime($tr->date))}}</h5>
                                                                    <h5 class="reply-user-type"><span class="label label-success">{{$st->did}}</span></h5>
                                                                    <div class="reply-message">{!!$tr->message!!}</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @else

                                                        <div class="single-support-reply clearfix client">
                                                            <div class="reply-info">
                                                                @if($tr->image=='user')

                                                              @php
                                                              $user = \App\User::where('id',$st->cl_id)->first();
                                                              @endphp

                                                              @if($user)
                                                              <img class="reply-user-thumb" src="{{asset('storage')}}/{{$user->pro_pic}}" height="80px" width="80px">
                                                              @else
                                                              <img class="reply-user-thumb" src="{{ URL::to('images/co.png')}}" height="80px" width="80px">
                                                              @endif


                                                          @else
                                                              <img class="reply-user-thumb" src="{{ URL::to('images/co.png')}}" height="80px" width="80px">
                                                          @endif
                                                                <div class="reply-info-text text-infor">
                                                                    <h4 class="reply-user-name">{{$tr->name}}</h4>
                                                                    <h5 class="reply-date">{{ date('jS M y', strtotime($tr->date))}}</h5>
                                                                    <h5 class="reply-user-type"><span class="label label-success">Student (You)</span></h5>
                                                                    <div class="reply-message">{!!$tr->message!!}</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="ticket_files">
                                            <form role="form" method="post" action="{{ route('post_ticket_file_student') }}" enctype="multipart/form-data">

                                                    <div class="form-group @error('file_title') has-error @enderror">
                                                        <label>File Title</label>
                                                        <input type="text" name="file_title" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Select File</label>
                                                        <div class="input-group input-group-file @error('file') has-error @enderror">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file">
                                                                    Browse <input type="file" class="form-control" name="file" accept="image/*">
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control" readonly="">
                                                        </div>
                                                    </div>


                                                        @csrf

                                                        <input type="hidden" value="{{$st->id}}" name="cmd">

                                                        <input type="submit" value="Upload" class="btn btn-success pull-right">                 

                                            </form>
                                            <br>
                                            <hr>

                                            <table class="table table-hover table-ultra-responsive">
                                                <thead>
                                                <tr>
                                                    <th style="width: 20%;">Files</th>
                                                    <th style="width: 15%;">Size</th>
                                                    <th style="width: 20%;">Date</th>
                                                    <th style="width: 25%;">Upload By</th>
                                                    <th style="width: 20%;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($ticket_file as $tf)
                                                    <tr>
                                                        <td data-label="Files"><p>{{$tf->file_title}}</p></td>
                                                        <td data-label="Size"><p>{{round($tf->file_size/1000,2)}} KB</p></td>
                                                        <td data-label="Date"><p>{{$tf->updated_at}}</p></td>

                                                        @if($tf->cl_id=='0')
                                                            <td data-label="Upload By"> <p>
                                                              @php
                                                              $user = \App\User::where('id',$st->admin_id)->first();
                                                              @endphp

                                                              @if($user)

                                                              {{$user->name}}

                                                              @else

                                                              @php
                                                              $user2 = \App\User::where('id',$st->cl_id)->first();
                                                              @endphp
                                                              {{$user2->name}}

                                                              @endif

                                                            </p></td>
                                                        @else
                                                            <td data-label="Upload By"><p>
                                                              @php
                                                              $user = \App\User::where('id',$st->cl_id)->first();
                                                              @endphp

                                                              @if($user)
                                                              {{$user->name}}
                                                              @else

                                                                @php
                                                              $user2 = \App\User::where('id',$st->admin_id)->first();
                                                              @endphp
                                                              {{$user2->name}}
                                                              @endif


                                                            </p></td>
                                                        @endif
                                                        <td data-label="Action">
                                                            <a href="{{ route('dwn_ticket_file',['id'=> $tf->id]) }}" class="btn btn-success btn-xs" target="_blank" cid="{{$tf->id}}"><i class="fa fa-download"></i> </a>
                                                            <a href="#" class="btn btn-danger btn-xs tFileDelete" cid="{{$tf->id}}"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div>
                            </div>
      </div>
    </div>
  </div>                 
</div>
  

@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    $(document).on('click', '.tFileDelete', function(event) {
      event.preventDefault();
      var cid = $(this).attr("cid");
      var url = '{{Request::url()}}';

      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this File.",
        icon: "warning",
        buttons: ['Cancel', 'Delete File'],
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
                    url: '{{route('delete_ticket_file')}}',
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



    $(document).on('click', '.downloadn', function(event) {
      event.preventDefault();
      var cid = $(this).attr("cid");
      var url = '{{Request::url()}}';
      var _token = $('meta[name=csrf-token]').attr('content');
              
            $.ajax({
                    beforeSend: function(){
                      $.LoadingOverlay("show");
                    },
                    complete: function(){
                      $.LoadingOverlay("hide");
                    },
                    url: '{{route('download_ticket_file')}}',
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

    });








  });

</script>


@endsection