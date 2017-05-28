@extends('user.profile')

@section('headabout')
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">
<link href="{{ asset('css/modals.css') }}" rel="stylesheet">
@endsection

@section('details')

<div class="posts-body">

  @if($user->id == Auth::user()->id )
    
  <div class="row">
      <div class="col-md-10 col-md-offset-1">
          <div class="post-form-panel">
              <div id="userPosts" >
                   <form class="form-horizontal" files="true" method="POST" action="/create_post/{{ $user->username }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <textarea id="content" name="content" class="form-control" placeholder="Describe your song here!"></textarea>
                      <div class="post-insert-file">
                        <input type="file" id="audio" name="audio" class="" /> 
                        <label> Max size is only 8MB</label>
                      </div>                            
                      <button type="submit" class="btn btn-success pull-right"> Leggo </button>
                  </form>
              </div>
          </div>
      </div>  
  </div>
  @endif

  <div class="row">
  @forelse($posts as $post)
      <div class="col-md-10 col-md-offset-1">
          <div class="post-content-panel" id="post-{{$post->id}}">
              <div class="post-user-heading">
                  <div class="post-user-name">
                    <div class="post-user-info pull-left">
                        <a class="post-prof-pic pull-left" href="profile/{{$user->where('id',$post->user_id)->value('username')}}/about" >
                            @if($user->prof_pic == null)
                            <img src="/img-uploads/maleDefault.png"/>
                            @else
                            <img src="/img-uploads/{{$user->prof_pic}}"/>
                            @endif
                        </a>
                        <div class="post-user-names pull-left">
                            <a class="user-first-last-name pull-left" href="profile/{{$user->where('id',$post->user_id)->value('username')}}/about" >
                                {{  $user->where('id',$post->user_id)->value('fname')." ".$user->where('id',$post->user_id)->value('lname')  }}
                            </a>
                            <a class="user-username pull-left" href="profile/{{$user->where('id',$post->user_id)->value('username')}}/about" >
                                {{ $user->where('id',$post->user_id)->value('username') }}  
                            </a>
                        </div>
                    </div>
                  </div>
                  <div class="post-user-options">
                      <div class="pull-right">
                          @if($post->user_id == Auth::user()->id )
                          <a href="#" id="delete" data-toggle="modal" data-target="#delete-confirm-{{$post->id}}">
                              <span class="glyphicon glyphicon-trash post-user-delete"></span>
                          </a>
                          @endif
                      
                      </div>
                      <div class="pull-right">{{ $post->created_at->diffForHumans() }}</div>
                  </div>
              </div>
              <div class="post-content-body col-xs-12">
                  <div>
                      {{ $post->content }}
                  </div>
                  <div class="col-xs-12 text-center">
                  @if($post->filename!='0')  
                      <audio controls controlsList="nodownload" id="audio-{{$post->id}}" href="javascript:void(0)" onplay="audioPlay({{$post->id}})" data-pg="{{$post->id}}">

                        <source src="/user-audios/{{$post->filename}}"  type="audio/mpeg" >
                          Your browser does not support the audio element.
                      </audio>
                  @endif
                  </div>
                  <p class="pull-right">
                    {{$post->plays}} plays
                    <span id="plays-{{$post->id}}" class="glyphicon glyphicon-repeat"></span> 
                  </p>
              </div>
              <div class="post-user-actions">

                  <a href="javascript:void(0)" id="like-{{$post->id}}" data-pg="{{ $post->id }}" class="pull-left like"> 
                    <span class="glyphicon glyphicon-fire"></span> Like
                  </a>
                  <a  id="comments-{{$post->id}}"  data-toggle="modal" data-target="#commentsModal-{{$post->id}}" class="comments pull-right"> 
                    {{$post->comments->count()}} Comments  
                  </a>
                  <a  id="likes-{{$post->id}}"  data-toggle="modal" data-target="#likersModal-{{$post->id}}" class="likes pull-right"> 
                    {{$post->likes->count()}} Likes 
                  </a>
                  
                  @foreach($post->likes as $like)
                      @if($like->user_id == Auth::user()->id)
                          <script type="text/javascript">
                              document.getElementById('like-' + {{$post->id}}).innerHTML="Unlike";
                              document.getElementById('like-' + {{$post->id}}).className ="unlike pull-left";
                          </script>
                      @endif
                  @endforeach
                  
              </div>
              <div class="post-user-comments" style="background-color: #fff;">
                  <form class="form-horizontal" method="POST" action="/create_comment/{{ $post->id }}" >
                      {{ csrf_field() }}
                      <input type="textbox" placeholder="Write a comment" class="form-control" id="content" name="content"/>
                   </form>
              </div>
          </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="delete-confirm-{{$post->id}}" role="dialog">
          <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete Post</h4>
                  </div>
                  <div class="modal-body">
                      <p>
                          Do you really want to delete this post? 
                      </p>
                  </div>
                  <div class="modal-footer">
                      <p> {{$post->id}} </p>
                      <a id="delete-post" href="javascript:void(0)" data-pg="{{ $post->id }}" class="delete-post btn btn-danger" data-dismiss="modal"> Delete Post </a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
              </div>

          </div>
      </div>
      <!--  END OF MODAL -->
        <!--Likers Modal -->
        <div class="modal fade modal-likers" id="likersModal-{{$post->id}}" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Likers</h4>
              </div>
              <div class="modal-body">
                <p>
                  @forelse($post->likes as $like)
                      <div class="modal-likers-info">
                          <a href="/profile/{{ $like->liker->username }}/about"> 
                              @if($like->liker->prof_pic == null)
                              <img src="/img-uploads/maleDefault.png"/>
                              @else
                              <img src="/img-uploads/{{$like->liker->prof_pic}}"/>
                              @endif
                          </a>
                          <div class="modal-likers-names">
                              <a class="modal-likers-name" href="/profile/{{ $like->liker->username }}/about">
                                  {{ $like->liker->fname." ".$like->liker->lname }}
                              </a>
                              <a class="modal-likers-username" href="/profile/{{ $like->liker->username }}/about">
                                  {{ $like->liker->username}}
                              </a>
                          </div>
                      </div>
                  @empty
                      <div class="text-center">
                          <p>No likes yet.</p>
                      </div>
                  @endforelse
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
    <!-- End of Modal -->

    <!--Likers Modal -->
        <div class="modal fade" id="commentsModal-{{$post->id}}" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comments</h4>
              </div>
              <div class="modal-body">
                <p>
                  @forelse($post->comments as $comment)
                      <div class="modal-comments-user clearfix">
                          <div class="pull-left">
                            <a class="modal-comments-prof-pic pull-left" href="/profile/{{ $comment->commenter->username }}/about">
                                @if($user->prof_pic == null)
                                <img src="/img-uploads/maleDefault.png"/>
                                @else
                                <img src="/img-uploads/{{$user->prof_pic}}"/>
                                @endif
                            </a>
                            <div class="modal-comments-names pull-left">                            
                              <a class="modal-comments-name pull-left" href="/profile/{{ $comment->commenter->username }}/about">
                                  {{ $comment->commenter->fname." ".$comment->commenter->lname }}
                              </a>
                              <a class="modal-comments-username pull-left" href="/profile/{{ $comment->commenter->username }}/about">
                                  {{ $comment->commenter->username }}
                              </a>
                            </div>
                          </div>
                          <div class="pull-right">{{ $comment->created_at->diffForHumans() }}</span>
                      </div>
                      <div class="modal-comments-body pull-left">
                          <p>
                              {{ $comment->content }}
                          </p>
                      </div>
                  @empty
                      <div class="text-center">
                          No comments yet
                      </div>
                  @endforelse
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
      <!-- End of Modal -->

      @empty
          <div class="col-md-10 col-md-offset-1 ">
              <div class="post-content-panel text-center">
                  No posts yet.
              </div>
          </div>
      @endforelse
      <script type="text/javascript">
          window.onload = function(){
              document.getElementById("about").className="";
              document.getElementById("posts").className="active";
          }
      </script>
  </div>

</div>

@endsection