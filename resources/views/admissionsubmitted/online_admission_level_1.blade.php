@extends('layouts.main')


@section('title')
  OSMS | All ONLINE Admissions
@endsection

@section('mtitle')
  Online Admission Level 100
@endsection


@section('mtitlesub')

@endsection



@section('main_content')
    <div class="alert alert-success" id="msg" style="display: none;">
              
</div>
<div class="alert alert-danger" id="error" style="display: none;">
              
</div>
@if (session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-warning"></i> Success!</h4>
          {{Session::get('message')}}
</div>
@endif
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Level 100 Online Admissions </h3>
      </div>
      <div class="box-body">
          <table id="admission" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Pic</th>
                  <th>Fullname</th>
                  <th>Gender</th>
                  <th>Entry Level</th>
                  <th>Year</th>
                  <th>Approve Programme</th>
                  <th>Approve Admission</th>
                  <th>View</th>
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
		$(document).on('change','.progamme',function(e){
			e.preventDefault();
			var prog = $(this).val();
			var cid = $(this).attr("cid");
			var _token = $('meta[name=csrf-token]').attr('content');
			_this = $(this);
			$.ajax({
					url: '{{route('admissions-update-programme')}}',
					type: 'POST',
					data: {_token : _token , prog: prog, cid: cid},
					 dataType: 'json',
					success: function(data){
						$("#msg").text(data.msg).show();
					},
			          error: function (data) {
			            console.log('Error:', data);
			            $("#msg").text('Sorry, Something error :(').show();
			          }
				});
		});

		$(document).on('change','.appprove',function(e){
			e.preventDefault();
			var status = $(this).val();
			var cid = $(this).attr("cid");
			var _token = $('meta[name=csrf-token]').attr('content');
			_this = $(this);
			$.ajax({
					url: '{{route('admissions-approve-admission')}}',
					type: 'POST',
					data: {_token : _token , status: status, cid: cid},
					 dataType: 'json',
					success: function(data){
						if (data.msg) {
							$("#msg").text(data.msg).show();
						}else{
							$("#error").text(data.error).show();
						}
						
					},
			          error: function (data) {
			            console.log('Error:', data);
			            $("#msg").text(data.message).show();
			          }
				});
		});


		


	$('#admission').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admissions-all-level1') }}',
        dom: 'lBfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            'print'
        ],
        columns: [
            {data: 'id'},
            {data: 'profileimg', render: function(data){
            	return '<img src="{{asset('storage')}}/'+data+'" class="img-circle"width="50" height="50">';
            },
            orderable: false
        },
            {data: 'firstnames'},
            {data: 'gender'},
            {data: 'entrylevel'},
            {data: 'year'},
            {data: 'programme', render: function(data,type,row,meta){
                if (row['approve'] == 1) {
                    $html = "";
                    $html += ''+row['programme']+'';
                    return $html;
                }else{

                    $html = "";
                    $html += '<select name="Programme" cid="'+row['osncode_id']+'" id="prog_'+row['osncode_id']+'" class="progamme form-control">';
                        if (row['programme'] !=null) {
                            $html += '<option value="'+row['programme']+'">'+row['programme']+'</option>';
                        }else{
                            $html += '<option value=""></option>';
                        }
                    $html += '<option value="'+row['firstchoice']+'">'+row['firstchoice']+'</option>';
                    $html += '<option value="'+row['secondchoice']+'">'+row['secondchoice']+'</option>';
                    $html += '<option value="'+row['thirdchoice']+'">'+row['thirdchoice']+'</option>';
                    $html += '</select>';
                    return $html;
                }
            },
             orderable: false
        },
           {data: 'approve', render: function(data,type,row,meta){
            	$html = "";
            	$html += '<select name="appadm" cid="'+row['osncode_id']+'" id="appadm" class="appprove form-control">';
                $html += '<option value=""></option>';
                $html += '<option value="1">Approve Addmission</option>';
				$html += '<option value="0">DisApprove Admission</option>';
                $html += '</select>';
                return $html;
            }, 
             orderable: false
        },
            {data: 'action', name: 'action'},
        ]




    });





	$.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) { 
    	console.log(message);
};

	});
</script>


@endsection
