@extends('layout.main')
@section('content')
		<div class="panel panel-primary">
		  <div class="panel-heading">Configs</div>
		  <div class="panel-body">
		    <form class="form-horizontal" action="{{url('configs')}}" method="post">
		    	@csrf
			  <div class="form-group">
			    <label for="first-award" class="col-sm-2 control-label">First Award*</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="first-award" name="first_award" placeholder="First Award" value="{{$configs['first_award']}}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="second-award" class="col-sm-2 control-label">Password*</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="second-award" name="second_award" placeholder="Second Award" value="{{$configs['second_award']}}">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Update</button>
			    </div>
			  </div>
			</form>
		  </div>
		</div>
@endsection