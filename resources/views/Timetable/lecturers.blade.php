
					<div class="form-group  @error('grp1') has-error @enderror">
		                 <label class="control-label" for="lectgoup">Select Lecturer For Group 1</label>
		                 <select class="form-control" name="grp1" id="grp1" required>
				        	<option></option>
				  			@foreach($lecourse as $row)
				  				<option value="{{$row->lec_name}}-{{$row->lecturer_id}}">{{$row->lec_name}}</option>
				  			@endforeach
	                      </select>
		                  <span class="help-block" id="lecterror" style="color: red;">@error('grp1') {{ $message }} @enderror</span>
		            </div>


		            <div class="form-group  @error('grp2') has-error @enderror">
		                 <label class="control-label" for="lectgoup">Select Lecturer For Group 2</label>
		                 <select class="form-control" name="grp2" id="grp2">
				        	<option></option>
				  			@foreach($lecourse as $row)
				  				<option value="{{$row->lec_name}}-{{$row->lecturer_id}}">{{$row->lec_name}}</option>
				  			@endforeach
	                      </select>
		                  <span class="help-block" id="lecterror2" style="color: red;" >@error('grp2') {{ $message }} @enderror</span>
		            </div>



		            <div class="form-group  @error('grp3') has-error @enderror">
		                 <label class="control-label" for="lectgoup">Select Lecturer For Group 3</label>
		                 <select class="form-control" name="grp3" id="grp3">
				        	<option></option>
				  			@foreach($lecourse as $row)
				  				<option value="{{$row->lec_name}}-{{$row->lecturer_id}}">{{$row->lec_name}}</option>
				  			@endforeach
	                      </select>
		                  <span class="help-block" id="lecterror3" style="color: red;">@error('grp3') {{ $message }} @enderror</span>
		            </div>


		            <div class="form-group  @error('grp4') has-error @enderror">
		                 <label class="control-label" for="lectgoup">Select Lecturer For Group 4</label>
		                 <select class="form-control" name="grp4" id="grp4">
				        	<option></option>
				  			@foreach($lecourse as $row)
				  				<option value="{{$row->lec_name}}-{{$row->lecturer_id}}">{{$row->lec_name}}</option>
				  			@endforeach
	                      </select>
		                  <span class="help-block" id="lecterror4" style="color: red;">@error('grp4') {{ $message }} @enderror</span>
		            </div>

		           

