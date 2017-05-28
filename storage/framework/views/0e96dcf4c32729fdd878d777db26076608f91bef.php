<?php $__env->startSection('content'); ?>
<?php $__empty_1 = true; $__currentLoopData = $follow_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" >
            <div class="panel-heading">
              
            </div>
            <div class="panel-body">
                <div>
                      <?php echo e($user->username); ?>

                </div>
              <div class="text-center col-md-5">    
                <h2> Genres Listened To </h2>
                <ul>
                <?php $__empty_2 = true; $__currentLoopData = $user->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <li> <?php echo e($genre->genre); ?> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    none
                <?php endif; ?>
                </ul>

                <h2> Instruments Played </h2>
                <ul>
                    <?php $__empty_2 = true; $__currentLoopData = $user->instruments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instrument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <li> <?php echo e($instrument->instrument); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    None
                    <?php endif; ?>
                </ul>
            </div>
            </div>
            <div class="panel-footer clearfix" style="background-color: #fff;">
                <a href="#"> Follow </a>
            </div>
        </div>
    </div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    Nothing to see here, bitch.
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>