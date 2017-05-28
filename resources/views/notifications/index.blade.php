@extends('layouts.app')

@section('head')

<link href="{{ asset('css/notif.css') }}" rel="stylesheet">

@endsection

@section('content')
 	<div class="row">
        <div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-default">
	            <div class="panel-heading text-center">
	                <h3>Notifications</h3>
	            </div>
	        </div>
	    @forelse($notifications as $notification)
            <div class="notif-content-panel" id="notif-{{$notification->id}}">
                <div class="notif-content-body">
                    <div class="panel panel-default">
					 	<div class="panel-body">
                    		<a class="notif-user-image pull-left" href="/profile/{{$user->where('id',$notification->notifier_id)->value('username')}}/about">
                    			<img class="" src="/img-uploads/{{$user->where('id',$notification->notifier_id)->value('prof_pic')}}"> 
                    		</a> 
                    		<span class="notif-user-message">
	                    		<a class="notif-user-name" href="/profile/{{$user->where('id',$notification->notifier_id)->value('username')}}/about">
	                    			{{$user->where('id',$notification->notifier_id)->value('fname')." ".$user->where('id',$notification->notifier_id)->value('lname')}} 
	                    		</a> 
							 	@if($notification->type == "1")
		                    		has followed you!
		                  		@elseif($notification->type == "2")
		                  			has liked your <a href="/post/{{$notification->notif_id}}">post</a>
		                    	@else
		                    		has commented on your <a href="/post/{{$notification->notif_id}}">post</a>
		                   		@endif
                    		</span>
						 	<div class="pull-right">{{ $notification->created_at->diffForHumans() }}</div>
                   		</div>
					</div>
                </div>
            </div>
	    @empty
	    	<div class="notif-content-panel" id="">
                <div class="notif-content-body col-xs-12">
                    <div class="panel panel-default">
					    <p class="text-center">
					    	No new notifications!
					    </p>
					</div>
                </div>
            </div>
	    @endforelse
        </div>
    </div>
@endsection