<?php $__env->startSection('head'); ?>

<link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
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
    </div>
    <?php echo $__env->yieldContent('details'); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>