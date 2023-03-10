                @forelse($sales as $row)
                		<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>
                        @foreach($users as $user)
                          @if($user->id == $row->user_id)
                            {{$user->fullname}}
                          @endif
                        @endforeach
			              </td>
                       	  <td>
                            @foreach($branches as $branch)
                              @if($branch->branchode == $row->brancode)
                                {{$branch->branchloc}}
                             @endif
                            @endforeach
                       	  <td>{{$row->productname}}</td>
                       	  <td>{{$row->quantity}}</td>
                       	  <td>{{$row->nbs}}</td>
                       	  <td>{{$row->nas}}</td>
                       	  <td>{{$row->price}}</td>
                       	  <td>{{$row->sold}}</td>
                          <td>{{\Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                       	 
		                </tr>
                    @empty
                    <tr>
                      <td colspan="10">
                        <div class="alert alert-danger">No Record Found</div>
                      </td>
                    </tr>
                	@endforelse