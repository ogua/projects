					@foreach($products as $row)
                		<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>
			                  @foreach($branches as $branch)
			                  		@if($branch->branchode == $row->branchcode )
					        			{{$branch->branchloc}}
					        		@endif
					         @endforeach

					             </td>
                       	  <td>{{$row->productname}}</td>
                       	  <td>{{$row->productType}}</td>
                       	  <td>{{$row->quantuty}}</td>
                       	  <td>{{$row->productprice}}</td>
                       	  <td>
                       	 <a href="{{route('edit-product', ['id'=>$row->id])}}" class="btn btn-info" ><i class='fa fa-pencil-square-o'></i>Edit</a>               

                        <a href="{{route('delete-product', ['id'=>$row->id])}}" class="btn btn-danger"  onclick="return confirm('Are You Sure?')"><i class='fa fa-trash'></i>Delete</a>
                       	  </td>
		                </tr>
                	@endforeach