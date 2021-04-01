@extends('layout.main')
@section('content')
		<div class="panel panel-primary">
		  <div class="panel-heading">Sign Up</div>
		  <div class="panel-body">
		    <form class="form-horizontal" action="{{url('user/signup')}}" method="post">
		    	@csrf
			  <div class="form-group">
			    <label for="username" class="col-sm-2 control-label">User Name*</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="username" name="username" placeholder="username">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="password" class="col-sm-2 control-label">Password*</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="refer" class="col-sm-2 control-label">Refer Code</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="refer" name="refer" placeholder="Refer Code">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Sign Up</button>
			    </div>
			  </div>
			</form>
		  </div>
		</div>
@endsection