<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Timeline</div>

                <div class="panel-body">
                    <div id="userPosts">
                            <input type="textbox" name="status" value="Express what you are feeling in a song"/>
                            
                            <input type="file" name="audio" accept=".mp3" />
                            
                            <button type="button" class="btn btn-success"> Leggo </button>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span><?php echo e($user->where('id',$post->user_id)->value('username')); ?></span>
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
    Nothing to see here, bitch.
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>