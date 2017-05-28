@extends('layouts.app')

@section('head')

<link href="{{ asset('css/notif.css') }}" rel="stylesheet">

@endsection

@section('content')
 	<div class="row">
        <div class="col-md-8 col-md-offset-2">
	    @forelse($notifications as $notification)
            <div class="notif-content-panel" id="notif-{{$notification->id}}">
                <div class="notif-content-body col-xs-12">
                    <div class="panel panel-default">
						<!-- <div class="panel-heading"></div> -->
					 	<div class="panel-body">
					 	<div class="pull-right">{{ $notification->created_at->diffForHumans() }}</div>
					 	@if($notification->type == "1")
                    		<a href="/profile/{{$user->where('id',$notification->notifier_id)->value('username')}}/about">{{$user->where('id',$notification->notifier_id)->value('username')}} </a> has followed you!
                  		@elseif($notification->type == "2")
                        	<a href="/profile/{{$user->where('id',$notification->notifier_id)->value('username')}}/about">{{$user->where('id',$notification->notifier_id)->value('username')}} </a> has liked your <a href="/post/{{$notification->notif_id}}">post</a>
                    	@else
                        	<a href="/profile/{{$user->where('id',$notification->notifier_id)->value('username')}}/about">{{$user->where('id',$notification->notifier_id)->value('username')}} </a> has commented on your <a href="/post/{{$notification->notif_id}}">post</a>
                   		@endif</div>
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