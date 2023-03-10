          @if (session()->has('message'))
			  <div class="alert alert-success alert-dismissible">
			      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        <h4><i class="icon fa fa-success"></i> Success!</h4>
			                    {{ session('message') }}
			  </div>
			@endif

			@if (session()->has('messages'))
			  <div class="alert alert-danger alert-dismissible">
			      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        <h4><i class="icon fa fa-warning"></i>Warning!</h4>
			                    {{ session('messages') }}
			  </div>
			@endif

			@if (session()->has('error'))
			  <div class="alert alert-danger alert-dismissible">
			      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        <h4><i class="icon fa fa-warning"></i>Warning!</h4>
			                    {{ session('error') }}
			  </div>
			@endif

			<div class="alert alert-success" id="msg" style="display: none;"></div>
            <div class="alert alert-danger" id="error" style="display: none;"></div>
            