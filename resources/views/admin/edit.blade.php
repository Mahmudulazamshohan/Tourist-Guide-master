@extends('layouts.appAdmin')
@section('content')
<nav class="navbar navbar-inverse" style="background: #00C851;border-radius: 0;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">{{env('APP_NAME')}}</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('dashbord') }}">Back</a></li>
     
    </ul>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
			<table class="table table-striped table-dark" >
		    <thead>
		      <tr>
		        <th>PlaceName</th>
		        <th>Screen</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($places as $p)
		      <tr>
		        <td>
		        	{{$p->placename}}
		        </td>
		        <td>
		        	<img src="{{ asset('img').'/'.$p->placeimage }}" alt="" style="width: 50px; height: 50px;">
		        </td>
		        <td>
		        	<a href="{{ route('admin.update-place',$p->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
		        </td>
		      </tr>
		      @endforeach
		      
		    </tbody>
		  </table>
		</div>
		<div class="col-md-2">
			
		</div>
	</div>
	<div style="margin: 0 auto 0 auto !important;">
	 {{$places->links()}}	
	</div>
	
</div>
@endsection