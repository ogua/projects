@extends('layouts.main')


@section('title')
  Walters Dream Big | View Branch
@endsection

@section('mtitle')
  View Branch
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

            <div class="col-md-8">
              
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">All Branches</h3>
                </div>
              
                  <div class="box-body table-responsive">
                      <table id="branch" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>S.N</th>
                          <th>Branch Code</th>
                          <th>Branch Location</th>
                          <th>Contact</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($branches as $row)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$row->branchode}}</td>
                                  <td>{{$row->branchloc}}</td>
                                  <td>{{$row->contact}}</td>
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

    $('#branch').DataTable({
       dom: 'lBfrtip',
      buttons: [
              {
                extend: 'copy',
                itle: 'Walters Branch Information',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4]
                }
              },
              {
                extend: 'csv',
                itle: 'Walters Branch Information',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                }
              },
              {
                extend: 'excel',
                title: 'Walters Branch Information',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                }
              },
              {
                extend: 'pdf',
                title: 'Branch Information',
                download: 'open',
                footer: true,
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                },
                customize : function(doc) {
                  var rowCount = doc.content[1].table.body.length;
                  for (i = 1; i < rowCount; i++) {
                  doc.content[1].table.body[i][0].alignment = 'center';
                  doc.content[1].table.body[i][1].alignment = 'center';
                  doc.content[1].table.body[i][2].alignment = 'center';
                  doc.content[1].table.body[i][3].alignment = 'center';
                } 
                  doc.content[1].table.widths = [ '20%', '20%', '30%', '30%'];

                }
              },
                
                {
                extend: 'print',
                title: 'Walters Branch Information',
                messageTop: 'All Branches',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                },
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="{{ URL::to('images/walter.png')}}" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .find('.quntity').css("text-align","center")
                        .css( 'font-size', 'inherit' );
                }
              }
      ]
    });
    


    $(document).on("change","#branch",function(e){
      
      var branch = $(this).val();
      alert(branch);
    });

  });

</script>


@endsection
