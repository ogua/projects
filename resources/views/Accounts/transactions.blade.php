@extends('layouts.main')


@section('title')
  OSMS | All Transactions 
@endsection

@section('mtitle')
All Transactions 
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
    
<div class="row">
  <div class="col-md-12">

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <labal>Start Date</labal>
                <input type="date" name="sdate" id="sdate" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <labal>End Date</labal>
                <input type="date" name="edate" id="edate" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <a href="#" id="getdetail" style="margin-top: 20px;" class="btn btn-success">Search</a>
            </div>
          </div>

    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">All Transactions </h3>
      </div>
      <div class="box-body">
             <table id="transactions" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Fullname</th>
                      <th>Index Number</th>
                      <th>Session</th>
                      <th>Programme</th>
                      <th>Tr Type</th>
                      <th>Tr Reference</th>
                      <th>Tr ID</th>
                      <th>Amount (GH&cent;)</th>
                      <th width="20%">Date</th>
                      <th>refund</th>
                    </tr>
                    </thead>
                    <tbody>
                      
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
            {data: 'created_at'},
            {data: 'refund', render: function(data,type,row,meta){
                $html = "";
                $html += '<a href="#" class="btn btn-danger refund" cid="'+data+'"><i class="fa fa-refresh"></i>Refund</a>';
                return $html;
            },
            orderable: false
          },
            
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
