@extends('layouts.main')


@section('title')
  OSMS | Transaction History
@endsection

@section('mtitle')
  Transaction History 
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
    
<div class="row">
  <div class="col-md-12">

    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Transaction History </h3>
      </div>
      <div class="box-body">
             <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Action By</th>
                      <th>Index Number</th>
                      <th>Session</th>
                      <th>Programme</th>
                      <th>Wallet ID</th>
                      <th>Tr Type</th>
                      <th>Tr Reference</th>
                      <th>Tr ID</th>
                      <th>Amount (GH&cent;)</th>
                      <th width="15%">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($transaction as $row)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>
                              @if($row->payable_id == $user->id)
                                {{$user->name}}
                              @endif
                            </td>
                          <td>
                              @if($row->payable_id == $user->id)
                                {{$user->indexnumber}}
                              @endif
                          </td>
                          <td>
                              @if($row->payable_id == $studentinfo->user_id)
                                {{$studentinfo->session}}
                              @endif
                          </td>
                          <td>
                              @if($row->payable_id == $studentinfo->user_id)
                                {{$studentinfo->programme}}
                              @endif
                          </td>
                          <td>{{$row->wallet_id}}</td>
                           @php
                              $data = json_decode($row->meta, true);  
                           @endphp 
                          <td>{{$data['Trantype']}}</td>
                          <td>{{$data['Reference']}}</td>
                          <td>{{$row->uuid}}</td>
                          <td>GH &cent;{{$row->amount}}.00</td>
                          <td>{{ date('jS M y', strtotime($row->created_at))}} </td>
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
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  $('document').ready(function(){
    
$('#transactions').DataTable({
        processing: true,
        serverSide: true,
        "bDestroy": true,
        ajax: '{{ route('get_transactions') }}',
        dom: 'lBfrtip',
        buttons: [
            {
            extend: 'copy'
            },
            {
            extend: 'csv'
            },
            {
            extend: 'excel'
            },
            {
            extend: 'pdf',
              customize: function (doc) {
                doc.content[1].table.widths = 
                    Array(doc.content[1].table.body[0].length + 1).join('*').split('');
              }
            },
            {
            extend: 'print'
            }
        ],
        columns: [
          {data:  'DT_RowIndex'},
            {data: 'name'},
            {data: 'indexnumber'},
            {data: 'session'},
            {data: 'program'},
            {data: 'trtype'},
            {data: 'trrefrence'},
            {data: 'uuid'},
            {data: 'amount', render: function(data,type,row,meta){
                $html = "";
                $html += '<b>GH&cent;<b>'+data;
                return $html;
            },
            orderable: false
          },
            {data: 'created_at'}
        ]

       });



  $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) { 
      console.log(message);
};


$(document).on("click","#getdetail",function(e){
      e.preventDefault();

      var sdate = $("#sdate").val();
      var edate = $("#edate").val();

      if (sdate == "") {
         swal("Warning! Start Date Cant Be Empty", {
                    icon: "warning",
          });
        return;
      }

      if (edate == "") {
        swal("Warning! End Date Cant Be Empty", {
                    icon: "warning",
          });
        return;
      }

     $('#transactions').DataTable({
        processing: true,
        serverSide: true,
        "bDestroy": true,
        ajax: '/Accounts/gettransactions/'+sdate+'/'+edate,
        dom: 'lBfrtip',
        buttons: [
            {
            extend: 'copy'
            },
            {
            extend: 'csv'
            },
            {
            extend: 'excel'
            },
            {
            extend: 'pdf',
              customize: function (doc) {
                doc.content[1].table.widths = 
                    Array(doc.content[1].table.body[0].length + 1).join('*').split('');
              }
            },
            {
            extend: 'print'
            }
        ],
        columns: [
          {data:  'DT_RowIndex'},
            {data: 'name'},
            {data: 'indexnumber'},
            {data: 'session'},
            {data: 'program'},
            {data: 'trtype'},
            {data: 'trrefrence'},
            {data: 'uuid'},
            {data: 'amount'},
            {data: 'created_at'}
        ]

       });

      $('#transactions').DataTable().fnDestroy();

    });



  });
</script>


@endsection
