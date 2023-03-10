                  






                   <div class="form-group @error('cousers')has-error @enderror">
                    <label>Courses</label>
                    <select class="form-control" name="cousers" id="cousers" required>
	                    <option value="">Choose Course</option>
	                  @foreach($prog as $row)
	                    <option value="{{$row->coursecode}}">{{$row->coursetitle}} </option>
	                   @endforeach
                    </select>
                    <span class="help-block" id="courseerror" style="color: red;">@error('cousers'){{ $message }}@enderror</span>
                    </div>





                    