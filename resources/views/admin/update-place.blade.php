@extends('layouts.appAdmin')
@section('content')
<nav class="navbar navbar-inverse" style="background: #00C851;border-radius: 0;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">{{env('APP_NAME')}}</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('admin.edit') }}">Back</a></li>
     
    </ul>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8" style="background: #fff;">
		  <form action="{{ route('admin.update-place-data') }}" method="POST" enctype="multipart/form-data">
		  	{{csrf_field()}}
		  	<input type="hidden" name="id" value="{{$place->id}}">
		
		<div class="form-group">
			<label for="">	
				Placename
		   </label><input type="text" class="form-control" value="{{$place->placename}}" name="placename">
	    </div>
		<div class="form-group">
			<label for="">Overview</label>
			<textarea type="text" class="form-control" name="overview" style="min-height: 200px;">{{$place->overview}}</textarea></div>
		<div class="form-group">
			<label for="">Bus </label><input type="number" class="form-control" value="{{$place->bus}}" name="bus">
		</div>
		<div class="form-group"><label for="">Train</label><input type="number" class="form-control" value="{{$place->train}}" name="train"></div>
		<div class="form-group"><label for="">Ship</label><input type="number" class="form-control" value="{{$place->ship}}" name="ship"></div>
		<div class="form-group"><label for="">Air</label><input type="number" class="form-control" value="{{$place->air}}" name="air"></div>
		<div class="form-group">
			<label for="">Tour Type</label>
			<select name="tour_type" id="" class="form-control" >
                                            <option value="long time">Long Time </option>
                                            <option value="short time">Short Time </option>
                                          
                                        </select>
		</div>
		<div class="form-group">
			<label for="">Place Image</label><input type="file" class="form-control" name="place_img">
		</div>
	
		{{-- <div class="form-group">
			<label for="">Tag</label>
			<select name="" id="" class="form-control">
				<option value="temple">Temple</option>	
				<option value="museam">Museam</option>	
				<option value="waterfall">Waterfall</option>	
				<option value="beach">Beach</option>	
				<option value="historical">Historical Place</option>	
				<option value="natural">Natural Place</option>	
			</select>
	</div> --}}

		<button class="btn btn-success">
			Update
		</button>
	</form>	
		</div>
		<div class="col-md-2">
			
		</div>
	</div>
	
</div>
