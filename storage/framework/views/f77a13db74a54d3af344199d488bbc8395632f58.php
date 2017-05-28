<?php $__env->startSection('details'); ?>

<!-- <div class="row">
    <div class="profile-mini-nav nav nav-tabs">
        
    </div>
    <div class="col-md-5">
    </div>
    <div class="col-md-7">
    	<div class="about-information"></div>
    </div>
</div> -->

<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span><?php echo e($user->username); ?></span>
        
        </div>

        <div class="panel-body">
            <div>
                  <?php echo e($post->content); ?>  
            </div>
        </div>
        <div class="panel-footer clearfix" style="background-color: #fff;">
            <a href="#" class="pull-right"> Like </a>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    No Posts
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>