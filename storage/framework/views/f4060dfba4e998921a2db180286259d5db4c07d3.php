<?php $__env->startSection('head'); ?>

<link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet">
<?php echo $__env->yieldContent('headabout'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container profile">
    <div class="profile-header row">
        <div class="profile-image"> 
            <?php if($user->prof_pic == null): ?>
            <img src="/img-uploads/maleDefault.png"/>
            <?php else: ?>
            <img src="<?php echo e($user->prof_pic); ?>"/>
            <?php endif; ?>
        </div>
        <div class="profile-name">
          <h1><?php echo e($user->fname); ?></h1>
          <h2><?php echo e($user->username); ?></h2>
        </div>
        <?php if(($user->id)==(Auth::user()->id)): ?>
            <span class="profile-edit-button">
                <a href="/profile/<?php echo e($user->username); ?>/settings" data-pg="<?php echo e($user->username); ?>" class="pull-right btn btn-default">Edit</a>
            </span>
        <?php endif; ?>
        <div class="profile-mini-nav nav nav-tabs">
            <li id="about"><a href="/profile/<?php echo e($user->username); ?>/about">About</a></li>
            <li id="posts"><a href="/profile/<?php echo e($user->username); ?>/posts" class="">Posts</a></li>
            <?php if((($user->id)!=(Auth::user()->id)) && $followed=='false'): ?>
                <a id="follow-unfollow" href="javascript:void(0)" data-pg="<?php echo e($user->username); ?>" class="pull-right btn btn-primary follow-user">Follow</a>
            <?php elseif((($user->id)!=(Auth::user()->id)) && $followed=='true'): ?>
                <a id="follow-unfollow" href="javascript:void(0)" data-pg="<?php echo e($user->username); ?>" class="pull-right btn btn-primary btn-warning unfollow-user">Unfollow</a>
            <?php endif; ?>

            
        </div>
    </div>
    <?php echo $__env->yieldContent('details'); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>