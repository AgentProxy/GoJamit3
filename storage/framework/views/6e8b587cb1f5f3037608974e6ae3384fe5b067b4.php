<?php $__env->startSection('details'); ?>

<div class="row">
    <div class="profile-mini-nav nav nav-tabs">
        <li class="active"><a href="/profile/<?php echo e($user->username); ?>/about">About</a></li>
        <li><a href="/profile/<?php echo e($user->username); ?>/posts" class="">Posts</a></li>
        <?php if((($user->id)!=(Auth::user()->id)) && $followed=='false'): ?>
        <a id="follow-unfollow" href="javascript:void(0)" data-pg="<?php echo e($user->username); ?>" class="pull-right btn btn-primary follow-user">Follow</a>
        <?php elseif((($user->id)!=(Auth::user()->id)) && $followed=='true'): ?>
         <a id="follow-unfollow" href="javascript:void(0)" data-pg="<?php echo e($user->username); ?>" class="pull-right btn btn-primary btn-warning unfollow-user">Unfollow</a>
        <?php endif; ?>

    </div>
    <div class="col-md-5">
    </div>
    <div class="col-md-7">
    	<div class="about-information"></div>
    </div>
</div>

<?php if(($user->id)!=(Auth::user()->id)): ?>

<a id="follow-unfollow" href="javascript:void(0)" data-pg="<?php echo e($user->username); ?>" class="follow-user ">
Follow </a>

<?php endif; ?>

<h2> Genres Listened To </h2>
<ul>
<?php $__currentLoopData = $user->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li> <?php echo e($genre->genre); ?> </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<h2> Instruments Played </h2>
<ul>
<?php $__empty_1 = true; $__currentLoopData = $user->instruments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instrument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<li> <?php echo e($instrument->instrument); ?> </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
none
<?php endif; ?>
</ul>

<a href="#" id="followers-count-<?php echo e($user->username); ?>" class="btn btn-info btn-lg" data-toggle="modal" data-target="#followerModal_<?php echo e($user->username); ?>" >
<?php echo e($user->followers->count()); ?> Follower(s)
</a>

<a href="#" id="following-count-<?php echo e($user->username); ?>" class="btn btn-info btn-lg" data-toggle="modal" data-target="#followingModal_<?php echo e($user->username); ?>" >
<?php echo e($user->following->count()); ?> Following
</a>
<!-- "javascript:void(0)" -->

<!-- Modal -->
<div class="modal fade" id="followerModal_<?php echo e($user->username); ?>" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Followers</h4>
</div>
<div class="modal-body">
<p>
<?php $__empty_1 = true; $__currentLoopData = $user->followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div>
<a href="/profile/<?php echo e($user->where('id',$follower->follower_id)->value('username')); ?>"><?php echo e($user->where('id',$follower->follower_id)->value('fname')); ?></a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
no followers
<?php endif; ?>
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
<div class="modal fade" id="followingModal_<?php echo e($user->username); ?>" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Following</h4>
</div>
<div class="modal-body">
<p>
<?php $__empty_1 = true; $__currentLoopData = $user->following; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $following): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div>
<a href="/profile/<?php echo e($user->where('id',$following->following_id)->value('username')); ?>"><?php echo e($user->where('id',$following->following_id)->value('fname')); ?></a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
None
<?php endif; ?>
</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
<!--  END OF MODAL -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>