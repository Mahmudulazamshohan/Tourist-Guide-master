@extends('layouts.app')
@section('content')
<div class="row" style="margin-top: 90px;">
	<div class="col-md-3">
		<h3 class="text-primary" style="background: #555;text-align: center;color: #fff;border-radius: 5px;">Groups</h3>
		<ul style="background: #fff;border-radius: 5px;">
			@foreach($groupUsers as $groupUser)
				<li >
					<a href="{{ route('groups',$groupUser->group->id) }}?user_search=a" style="color: #555;border-radius: 5px;width: 100%;font-size: 18px;">{{ $groupUser->group->name}}</a> 
				</li>
				@endforeach
		</ul>
	</div>
	<div class="col-md-6">
		<div class="panel">
			<div style="display: flex;flex-flow: row;padding: 10px;width: 100%;">
				<form action="{{ route('store-group-post') }}" method="post" style="width: 100%;">
					{{csrf_field()}}
					<input type="hidden" name="group_id" value="{{$id}}">
					<textarea style="width: 100%;border-radius: 5px;min-width: 100%;" name="texts"></textarea>
					<button class="btn btn-info" style="margin-top: 0px;max-height: 50px;">
						Post
					</button>
				</form>
				
			</div>
		</div>
		@foreach($groupPosts as $groupPost)
		<div class="panel">
			<div style="display: flex;flex-flow: column;">
				<div style="display: flex;flex-flow: row;background: #fff;padding: 10px;border-bottom: 1px solid #555;">
					@if(!is_null($groupPost->user->user_img))
				            <img src="{{ route('image',explode('/',$groupPost->user->user_img)[1]) }}" alt="" style="width: 30px; height: 30px;border-radius: 50%;"> 
				            @else
				             <img src="{{ asset('img/blank.png') }}" alt="" style="width: 30px; height: 30px;border-radius: 50%;background: white;"> 
				            @endif
				           <p style="color: #555;margin-left: 5px;font-weight: bold;font-family: cursive;">{{$groupPost->user->name}}</p>
				</div>
				<div style="padding: 10px;font-family: arial;">
					{{ $groupPost->text}}
				</div>
				
			</div>
		</div>
		@endforeach
	</div>
	
	<div class="col-md-3">
		<div class="panel" style="width: 100%;display: flex;flex-flow: column;">
			<p style="font-family: cursive;font-size: 14px;text-align: center;background: #555;color: #fff;">
				INVITE MEMBERS
			</p>
			<div style="margin: 0 auto 0 auto;">
				<form action="{{ $_SERVER['REQUEST_URI'] }}">
					<div style="display: flex;flex-flow: row;">
						<input type="text" class="form-control" style="width: 100%;" name="user_search">
						<button class="btn btn-success" style="margin: 0;padding: 5px 5px 5px 5px;height: 28px;">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</form>
				@if(!is_null($users))
				<ul style="list-style-type: none;">
					@foreach($users as $user)
					  <li style="display: flex;flex-flow: row;padding: 5px;">
					  	@if(!is_null($user->user_img))
				            <img src="{{ route('image',explode('/',$user->user_img)[1]) }}" alt="" style="width: 30px; height: 30px;border-radius: 50%;"> 
				            @else
				             <img src="{{ asset('img/blank.png') }}" alt="" style="width: 30px; height: 30px;border-radius: 50%;background: white;"> 
				            @endif
					  	
					  	<p style="flex-grow: 2;margin-left: 3px;">{{$user->name}}</p>
					  	@if(\App\GroupUsers::where('user_id',$user->id)->where('group_id',$id)->first()==null)
					  	<a  href="{{ route('store-group-user',['id'=>$id,'user_id'=>$user->id]) }}"class="btn btn-xs btn-primary">
					  		add
					  	</a>
					  	@else 
					  		<a  href="{{ route('store-group-user',['id'=>$id,'user_id'=>$user->id]) }}"class="btn btn-xs btn-success" disabled>
					  		member
					  	</a>
					  	@endif
					  </li>
					@endforeach
				</ul>
				@else
				<ul style="list-style-type: none;">
					 <li style="display: flex;flex-flow: row;padding: 5px;">a</li>
				</ul>
				@endif
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.main-tourist-bg{
		display: none !important;

	}
</style>
@endsection