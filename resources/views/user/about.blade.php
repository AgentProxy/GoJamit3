@extends('user.profile')

@section('headabout')
<link href="{{ asset('css/about.css') }}" rel="stylesheet">
@endsection

@section('details')

<div class="about-section row">
    <div class="col-md-5">
    </div>
    <div class="col-md-7">
        <div class="about-information"></div>
    </div>
    <div class="text-center col-md-5 ">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        <a href="#" id="followers-count-{{$user->username}}" class="" data-toggle="modal" data-target="#followerModal_{{$user->username}}">Follower(s) {{$user->followers->count()}}</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                        @forelse($user->followers as $follower)
                            <a href="/profile/{{ $user->where('id',$follower->follower_id)->value('username') }}/about">{{ $user->where('id',$follower->follower_id)->value('fname') }}</a>
                        @empty
                            <p>Oh no! Nobody is following you.</p> 
                            <p>Click <a href="#">here</a> to find new friends!</p>
                        @endforelse
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        <a href="#" id="following-count-{{$user->username}}" class="" data-toggle="modal" data-target="#followingModal_{{$user->username}}" >Following {{ $user->following->count() }}</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                        @forelse($user->following as $following)
                            <a href="/profile/{{ $user->where('id',$following->following_id)->value('username') }}/about">{{ $user->where('id',$following->following_id)->value('fname') }}</a>
                        @empty
                            <p>You are currently not following anyone yet.</p> 
                            <p>Click <a href="#">here</a> to explore more!</p>
                        @endforelse
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center col-md-5">    
        <h2> Genres Listened To </h2>
        <ul>
        @forelse($user->genres as $genre)
            <li> {{$genre->genre}} </li>
        @empty
            none
        @endforelse
        </ul>

        <h2> Instruments Played </h2>
        <ul>
            @forelse($user->instruments as $instrument)
            <li> {{$instrument->instrument}} </li>
            @empty
            None
            @endforelse
        </ul>
    </div>
</div>

<!-- ERIC CODE -->


<!-- "javascript:void(0)" -->

<!-- Modal -->
<div class="modal fade" id="followerModal_{{$user->username}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Followers</h4>
            </div>
            <div class="modal-body">
                <p>
                @forelse($user->followers as $follower)
                <div>
                    <a href="/profile/{{ $user->where('id',$follower->follower_id)->value('username') }}/about">{{ $user->where('id',$follower->follower_id)->value('fname') }}</a>
                </div>
                @empty
                    <p>Oh no! Nobody is following you.</p> 
                    <p>Click <a href="#">here</a> to find new friends!</p>
                @endforelse
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--  END OF MODAL -->

<!-- Modal -->
<div class="modal fade" id="followingModal_{{$user->username}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Following</h4>
            </div>
            <div class="modal-body">
                <p>
                    @forelse($user->following as $following)
                        <a href="/profile/{{ $user->where('id',$following->following_id)->value('username') }}/about">{{ $user->where('id',$following->following_id)->value('fname') }}</a>
                    @empty
                        <p>You are currently not following anyone yet.</p> 
                        <p>Click <a href="#">here</a> to explore more!</p>
                    @endforelse
                </p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    window.onload = function(){
        document.getElementById("about").className="active";
        document.getElementById("posts").className="";
    }
</script>
<!--  END OF MODAL -->

@endsection