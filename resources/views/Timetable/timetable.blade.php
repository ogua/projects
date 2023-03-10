 <div class="box-body" id="print_it">  
              <table id="timetable" class="table table-bordered table-striped" style="margin-top: 30px;">
                <thead>
                <tr class="text-center">
				    		<td colspan="5"> <h1 style="font-size: 25px;">
				    			LECTURE TIME - TABLE {{$academicyear}} ACADEMIC YEAR <br>
				    			{{$type}} - {{strtoupper($level)}} <br>
				    			{{strtoupper($semester)}} - {{strtoupper($session)}} </h1>
				    		</td>
				</tr>
                <tr class="bg-info">
                  <th>Day</th>
                  <th  class="text-center">Time</th>
                  <th class="text-center">Course</th>
                  <th>Lecturer</th>
                  <th>Hall</th>
                 
                </tr>
                </thead>
                <tbody>
                	<?php $a = 1;?>
				    @foreach($monday as $row)
				        <tr>

				        	<td>
				        		@if($a == 1)
				        			{{$row->day}} 
				        		@endif
					        </td>

					        <td class="text-center">
					        	{{$row->ftime}} - {{$row->ttime}}
					        </td>


					        <td class="text-center">
					        	<b class="bg-info "> {{$row->course}} </b> <br>

					        	<b class="bg-info "> {{$row->coursecode}} </b> <br>

					        	<b class="bg-info "> {{$row->programme}} </b>
					        </td>

					        <td>
					        	{{$row->lecturer}}
					        </td>



					        <td class="text-center">
					        	<b class="bg-info"> {{$row->group}} <br> {{$row->hall}}</b>
					        </td>


				        </tr>
				        <?php $a++;?>
				     @endforeach  

				     <tr>
				     	<td colspan="5" class="bg-info"></td>
				     </tr>


				     <?php $b = 1;?>
				     @foreach($tuesday as $row)
				        <tr>

				        	<td>
				        		@if($b == 1)
				        			{{$row->day}} 
				        		@endif
					        </td>

					        <td class="text-center">
					        	{{$row->ftime}} - {{$row->ttime}}
					        </td>


					        <td class="text-center">
					        	<b class="bg-info "> {{$row->course}} </b> <br>

					        	<b class="bg-info "> {{$row->coursecode}} </b> <br>

					        	<b class="bg-info "> {{$row->programme}} </b>
					        </td>

					        <td>
					        	{{$row->lecturer}}
					        </td>



					        <td class="text-center">
					        	<b class="bg-info"> {{$row->group}} <br> {{$row->hall}}</b>
					        </td>


				        </tr>
				        <?php $b++;?>
				     @endforeach 


				     <tr>
				     	<td colspan="5" class="bg-info"></td>
				     </tr>


				     <?php $b = 1;?>
				     @foreach($wedesday as $row)
				        <tr>

				        	<td>
				        		@if($b == 1)
				        			{{$row->day}} 
				        		@endif
					        </td>

					        <td class="text-center">
					        	{{$row->ftime}} - {{$row->ttime}}
					        </td>


					        <td class="text-center">
					        	<b class="bg-info "> {{$row->course}} </b> <br>

					        	<b class="bg-info "> {{$row->coursecode}} </b> <br>

					        	<b class="bg-info "> {{$row->programme}} </b>
					        </td>

					        <td>
					        	{{$row->lecturer}}
					        </td>



					        <td class="text-center">
					        	<b class="bg-info"> {{$row->group}} <br> {{$row->hall}}</b>
					        </td>

				        </tr>
				        <?php $b++;?>
				     @endforeach 




				     <tr>
				     	<td colspan="5" class="bg-info"></td>
				     </tr>


				     <?php $b = 1;?>
				     @foreach($thurday as $row)
				        <tr>

				        	<td>
				        		@if($b == 1)
				        			{{$row->day}} 
				        		@endif
					        </td>

					        <td class="text-center">
					        	{{$row->ftime}} - {{$row->ttime}}
					        </td>


					        <td class="text-center">
					        	<b class="bg-info "> {{$row->course}} </b> <br>

					        	<b class="bg-info "> {{$row->coursecode}} </b> <br>

					        	<b class="bg-info "> {{$row->programme}} </b>
					        </td>

					        <td>
					        	{{$row->lecturer}}
					        </td>



					        <td class="text-center">
					        	<b class="bg-info"> {{$row->group}} <br> {{$row->hall}}</b>
					        </td>


				        </tr>
				        <?php $b++;?>
				     @endforeach 



				     <tr>
				     	<td colspan="5" class="bg-info"></td>
				     </tr>


				     <?php $b = 1;?>
				     @foreach($friday as $row)
				        <tr>

				        	<td>
				        		@if($b == 1)
				        			{{$row->day}} 
				        		@endif
					        </td>

					        <td class="text-center">
					        	{{$row->ftime}} - {{$row->ttime}}
					        </td>


					        <td class="text-center">
					        	<b class="bg-info "> {{$row->course}} </b> <br>

					        	<b class="bg-info "> {{$row->coursecode}} </b> <br>

					        	<b class="bg-info "> {{$row->programme}} </b>
					        </td>

					        <td>
					        	{{$row->lecturer}}
					        </td>



					        <td class="text-center">
					        	<b class="bg-info"> {{$row->group}} <br> {{$row->hall}}</b>
					        </td>

				        </tr>
				        <?php $b++;?>
				     @endforeach 


				    @foreach($progs as $prog)
				    	<tr class="text-center bg-info">
				    		<td colspan="5">
				    			{{$prog->code}} : {{$prog->name}}
				    		</td>
				    	</tr>

				    @endforeach
				     
				    <tr>
				   
				    	<td colspan="5"><a href="#" id="print" class="btn btn-success pull-right">Generate Pdf</a></td>
				    </tr>

            	</tbody>
            </table>
        </div>

