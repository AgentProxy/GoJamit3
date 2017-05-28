<?php $__env->startSection('content'); ?>
 	<div class="row">
	    <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	        <div class="col-md-8 col-md-offset-2">
	            <div class="post-content-panel" id="notif-<?php echo e($notification->id); ?>">
	                <div class="post-content-body col-xs-12">
                            <div class="panel panel-default">
								<!-- <div class="panel-heading"></div> -->
							 	<div class="panel-body">
							 	<div class="pull-right"><?php echo e($notification->created_at->diffForHumans()); ?></div>
							 	<?php if($notification->type == "1"): ?>
	                        		<a href="/profile/<?php echo e($user->where('id',$notification->notifier_id)->value('username')); ?>/about"><?php echo e($user->where('id',$notification->notifier_id)->value('username')); ?> </a> has followed you!
                          		<?php elseif($notification->type == "2"): ?>
                                	<a href="/profile/<?php echo e($user->where('id',$notification->notifier_id)->value('username')); ?>/about"><?php echo e($user->where('id',$notification->notifier_id)->value('username')); ?> </a> has liked your <a href="/post/<?php echo e($notification->notif_id); ?>">post</a>
                                	<!-- <a href="/profile/<?php echo e($user->where('id',$notification->notifier_id)->value('username')); ?>/about"><?php echo e($user->where('id',$notification->notifier_id)->value('username')); ?> </a> has liked your <a href="/profile/<?php echo e(Auth::user()->username); ?>/posts/#post-<?php echo e($notification->notif_id); ?>">post</a> -->
                            	<?php else: ?>
                                	<a href="/profile/<?php echo e($user->where('id',$notification->notifier_id)->value('username')); ?>/about"><?php echo e($user->where('id',$notification->notifier_id)->value('username')); ?> </a> has commented on your <a href="/post/<?php echo e($notification->notif_id); ?>">post</a>
                           		<?php endif; ?></div>

							</div>
	                    
	                </div>
	            </div>
	        </div>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	    	No new notifications!
	    <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>