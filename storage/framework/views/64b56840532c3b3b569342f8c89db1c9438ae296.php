<?php $__env->startSection('headabout'); ?>
<link href="<?php echo e(asset('css/posts.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/modals.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('details'); ?>

<div class="posts-body">

  <?php if($user->id == Auth::user()->id ): ?>
    
  <div class="row">
      <div class="col-md-10 col-md-offset-1">
          <div class="post-form-panel">
              <div id="userPosts" >
                   <form class="form-horizontal" files="true" method="POST" action="/create_post/<?php echo e($user->username); ?>" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

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
  <?php endif; ?>

  <div class="row">
  <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="col-md-10 col-md-offset-1">
          <div class="post-content-panel" id="post-<?php echo e($post->id); ?>">
              <div class="post-user-heading">
                  <div class="post-user-name">
                    <div class="post-user-info pull-left">
                        <a class="post-prof-pic pull-left" href="profile/<?php echo e($user->where('id',$post->user_id)->value('username')); ?>/about" >
                            <?php if($user->prof_pic == null): ?>
                            <img src="/img-uploads/maleDefault.png"/>
                            <?php else: ?>
                            <img src="/img-uploads/<?php echo e($user->prof_pic); ?>"/>
                            <?php endif; ?>
                        </a>
                        <div class="post-user-names">
                            <a class="user-first-last-name" href="profile/<?php echo e($user->where('id',$post->user_id)->value('username')); ?>/about" >
                                <?php echo e($user->where('id',$post->user_id)->value('fname')." ".$user->where('id',$post->user_id)->value('lname')); ?>

                            </a>
                            <a class="user-username" href="profile/<?php echo e($user->where('id',$post->user_id)->value('username')); ?>/about" >
                                <?php echo e($user->where('id',$post->user_id)->value('username')); ?>  
                            </a>
                        </div>
                    </div>
                  </div>
                  <div class="post-user-options">
                      <div class="pull-right">
                          <?php if($post->user_id == Auth::user()->id ): ?>
                          <a href="#" id="delete" data-toggle="modal" data-target="#delete-confirm-<?php echo e($post->id); ?>">
                              <span class="glyphicon glyphicon-trash post-user-delete"></span>
                          </a>
                          <?php endif; ?>
                      
                      </div>
                      <div class="pull-right"><?php echo e($post->created_at->diffForHumans()); ?></div>
                  </div>
              </div>
              <div class="post-content-body col-xs-12">
                  <div>
                      <?php echo e($post->content); ?>

                  </div>
                  <div class="col-xs-12 text-center">
                  <?php if($post->filename!='0'): ?>  
                      <audio controls controlsList="nodownload" id="audio-<?php echo e($post->id); ?>" href="javascript:void(0)" onplay="audioPlay(<?php echo e($post->id); ?>)" data-pg="<?php echo e($post->id); ?>">

                        <source src="/user-audios/<?php echo e($post->filename); ?>"  type="audio/mpeg" >
                          Your browser does not support the audio element.
                      </audio>
                  <?php endif; ?>
                  </div>
                  <p class="pull-right">
                    <?php echo e($post->plays); ?> plays
                    <span id="plays-<?php echo e($post->id); ?>" class="glyphicon glyphicon-repeat"></span> 
                  </p>
              </div>
              <div class="post-user-actions">

                  <a href="javascript:void(0)" id="like-<?php echo e($post->id); ?>" data-pg="<?php echo e($post->id); ?>" class="pull-left like"> 
                    <span class="glyphicon glyphicon-fire"></span> Like
                  </a>
                  <a  id="comments-<?php echo e($post->id); ?>"  data-toggle="modal" data-target="#commentsModal-<?php echo e($post->id); ?>" class="comments pull-right"> 
                    <?php echo e($post->comments->count()); ?> Comments  
                  </a>
                  <a  id="likes-<?php echo e($post->id); ?>"  data-toggle="modal" data-target="#likersModal-<?php echo e($post->id); ?>" class="likes pull-right"> 
                    <?php echo e($post->likes->count()); ?> Likes 
                  </a>
                  
                  <?php $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($like->user_id == Auth::user()->id): ?>
                          <script type="text/javascript">
                              document.getElementById('like-' + <?php echo e($post->id); ?>).innerHTML="Unlike";
                              document.getElementById('like-' + <?php echo e($post->id); ?>).className ="unlike pull-left";
                          </script>
                      <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
              </div>
              <div class="post-user-comments" style="background-color: #fff;">
                  <form class="form-horizontal" method="POST" action="/create_comment/<?php echo e($post->id); ?>" >
                      <?php echo e(csrf_field()); ?>

                      <input type="textbox" placeholder="Write a comment" class="form-control" id="content" name="content"/>
                   </form>
              </div>
          </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="delete-confirm-<?php echo e($post->id); ?>" role="dialog">
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
                      <p> <?php echo e($post->id); ?> </p>
                      <a id="delete-post" href="javascript:void(0)" data-pg="<?php echo e($post->id); ?>" class="delete-post btn btn-danger" data-dismiss="modal"> Delete Post </a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
              </div>

          </div>
      </div>
      <!--  END OF MODAL -->
        <!--Likers Modal -->
        <div class="modal fade modal-likers" id="likersModal-<?php echo e($post->id); ?>" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Likers</h4>
              </div>
              <div class="modal-body">
                <p>
                  <?php $__empty_2 = true; $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                      <div class="modal-likers-info">
                          <a href="/profile/<?php echo e($like->liker->username); ?>/about"> 
                              <?php if($like->liker->prof_pic == null): ?>
                              <img src="/img-uploads/maleDefault.png"/>
                              <?php else: ?>
                              <img src="/img-uploads/<?php echo e($like->liker->prof_pic); ?>"/>
                              <?php endif; ?>
                          </a>
                          <div class="modal-likers-names">
                              <a class="modal-likers-name" href="/profile/<?php echo e($like->liker->username); ?>/about">
                                  <?php echo e($like->liker->fname." ".$like->liker->lname); ?>

                              </a>
                              <a class="modal-likers-username" href="/profile/<?php echo e($like->liker->username); ?>/about">
                                  <?php echo e($like->liker->username); ?>

                              </a>
                          </div>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                      <div class="text-center">
                          <p>No likes yet.</p>
                      </div>
                  <?php endif; ?>
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
        <div class="modal fade" id="commentsModal-<?php echo e($post->id); ?>" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comments</h4>
              </div>
              <div class="modal-body">
                <p>
                  <?php $__empty_2 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                      <div class="modal-comments-user clearfix">
                          <div class="pull-left">
                            <a class="modal-comments-prof-pic pull-left" href="/profile/<?php echo e($comment->commenter->username); ?>/about">
                                <?php if($user->prof_pic == null): ?>
                                <img src="/img-uploads/maleDefault.png"/>
                                <?php else: ?>
                                <img src="/img-uploads/<?php echo e($user->prof_pic); ?>"/>
                                <?php endif; ?>
                            </a>
                            <div class="modal-comments-names pull-left">                            
                              <a class="modal-comments-name pull-left" href="/profile/<?php echo e($comment->commenter->username); ?>/about">
                                  <?php echo e($comment->commenter->fname." ".$comment->commenter->lname); ?>

                              </a>
                              <a class="modal-comments-username pull-left" href="/profile/<?php echo e($comment->commenter->username); ?>/about">
                                  <?php echo e($comment->commenter->username); ?>

                              </a>
                            </div>
                          </div>
                          <div class="pull-right"><?php echo e($comment->created_at->diffForHumans()); ?></span>
                      </div>
                      <div class="modal-comments-body pull-left">
                          <p>
                              <?php echo e($comment->content); ?>

                          </p>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                      <div class="text-center">
                          No comments yet
                      </div>
                  <?php endif; ?>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
      <!-- End of Modal -->

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="col-md-10 col-md-offset-1 ">
              <div class="post-content-panel text-center">
                  No posts yet.
              </div>
          </div>
      <?php endif; ?>
      <script type="text/javascript">
          window.onload = function(){
              document.getElementById("about").className="";
              document.getElementById("posts").className="active";
          }
      </script>
  </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>