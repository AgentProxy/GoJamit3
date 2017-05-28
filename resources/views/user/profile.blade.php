@extends('layouts.app')

@section('head')

<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@yield('headabout')

@endsection

@section('content')
<div class="container profile">
    <div class="profile-header row">
        <div id="prof_img" class="profile-image"> 
            <a id="prof_pic_link"  data-toggle="modal" data-target="#profPicModal" class="">
                @if($user->prof_pic == null)
                <img src="/img-uploads/maleDefault.png"/>
                @else
                <img src="/img-uploads/{{$user->prof_pic}}"/>
                @endif
            </a>
        </div>
        <div class="profile-name">
          <h1>{{ $user->fname }}</h1>
          <h2>{{ $user->username }}</h2>
        </div>
        @if(($user->id)==(Auth::user()->id))
            <span class="profile-edit-button">
                <a href="/profile/{{$user->username}}/settings" data-pg="{{ $user->username}}" class="pull-right btn btn-default">Edit</a>
            </span>
        @endif
        <div class="profile-mini-nav nav nav-tabs">
            <li id="about"><a href="/profile/{{$user->username}}/about">About</a></li>
            <li id="posts"><a href="/profile/{{$user->username}}/posts" class="">Posts</a></li>
            @if((($user->id)!=(Auth::user()->id)) && $followed=='false')
                <a id="follow-unfollow" href="javascript:void(0)" data-pg="{{ $user->username}}" class="pull-right btn btn-primary follow-user">Follow</a>
            @elseif((($user->id)!=(Auth::user()->id)) && $followed=='true')
                <a id="follow-unfollow" href="javascript:void(0)" data-pg="{{ $user->username}}" class="pull-right btn btn-primary btn-warning unfollow-user">Unfollow</a>
            @endif
        </div>
    </div>
    @yield('details')
</div>      
<div class="modal fade" id="profPicModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#upload">
                    <span class="glyphicon glyphicon-pencil"></span> 
                    Edit
                </button>
                <div id="upload" class="collapse profile-img-collapse">
                    <form class="profile-pic-form form-inline" action="/profile/update_photo/{{ $user->id }} " method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="prof_pic" class="" />
                        <input type="submit" class="btn btn-primary" name="">
                    </form>
                </div>
            </div>
            <div class="modal-body text-center">
                @if($user->prof_pic == null)
                <img src="/img-uploads/maleDefault.png"/>
                @else
                <img src="/img-uploads/{{$user->prof_pic}}" class="img-responsive"/>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection