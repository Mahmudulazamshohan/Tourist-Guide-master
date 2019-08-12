@extends('layouts.app')
@section('content')
<div class="row" style="margin-top: 10px;">
	<div class="col-md-3">
		
	</div>
    <div class="col-md-6">
		<form action="{{ route('create-group') }}" method="POST">
			{{csrf_field()}}
			<input type="text" class="form-control" name="name">
			<button class="btn btn-info">
				Create
			</button>
		</form>
		<div>
			
			<ul style="list-style-type: none;margin-top:10px;width: 100%;">
				@foreach($groupUsers as $groupUser)
				<li style="background: #555;padding: 10px;">
					<a href="{{ route('groups',$groupUser->group->id) }}?user_search=a" style="color: #fff;border-radius: 5px;width: 100%;">{{ $groupUser->group->name}}</a> 
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="col-md-3">
		
	</div>
</div>
@endsection