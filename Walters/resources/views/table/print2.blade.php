@foreach($sales as $row)
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
                          <td>{{$row->price}}</td>
                         
                    </tr>
                  @endforeach
               