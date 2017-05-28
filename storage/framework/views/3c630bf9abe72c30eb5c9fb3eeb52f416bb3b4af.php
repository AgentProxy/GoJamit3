<?php $__env->startSection('head'); ?>

<link href="<?php echo e(asset('css/notif.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 	<div class="row">
        <div class="col-md-8 col-md-offset-2">
	        <h3>Notifications</h3>
	    <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="notif-content-panel" id="notif-<?php echo e($notification->id); ?>">
                <div class="notif-content-body col-xs-12">
                    <div class="panel panel-default">
					 	<div class="panel-body">
                    		<a class="notif-user-image pull-left" href="/profile/<?php echo e($user->where('id',$notification->notifier_id)->value('username')); ?>/about">
                    			<img class="" src="/img-uploads/<?php echo e($user->where('id',$notification->notifier_id)->value('prof_pic')); ?>"> 
                    		</a> 
                    		<span class="notif-user-message">
	                    		<a class="notif-user-name" href="/profile/<?php echo e($user->where('id',$notification->notifier_id)->value('username')); ?>/about">
	                    			<?php echo e($user->where('id',$notification->notifier_id)->value('fname')." ".$user->where('id',$notification->notifier_id)->value('lname')); ?> 
	                    		</a> 
							 	<?php if($notification->type == "1"): ?>
		                    		has followed you!
		                  		<?php elseif($notification->type == "2"): ?>
		                  			has liked your <a href="/post/<?php echo e($notification->notif_id); ?>">post</a>
		                    	<?php else: ?>
		                    		has commented on your <a href="/post/<?php echo e($notification->notif_id); ?>">post</a>
		                   		<?php endif; ?>
                    		</span>
						 	<div class="pull-right"><?php echo e($notification->created_at->diffForHumans()); ?></div>
                   		</div>
					</div>
                </div>
            </div>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	    	<div class="notif-content-panel" id="">
                <div class="notif-content-body col-xs-12">
                    <div class="panel panel-default">
					    <p class="text-center">
					    	No new notifications!
					    </p>
					</div>
                </div>
            </div>
	    <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>