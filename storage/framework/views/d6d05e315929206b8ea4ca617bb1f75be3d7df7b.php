<?php $__env->startSection('headabout'); ?>


<link href="<?php echo e(asset('css/about.css')); ?>" rel="stylesheet">


<?php $__env->stopSection(); ?>
<!-- =========================================================================== -->

<?php $__env->startSection('details'); ?>

<div class="about-section row">
    <div class="col-md-5">
    </div>
    <div class="col-md-7">
        <div class="about-information"></div>
    </div>
    <div class="text-center col-md-5 ">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        <a href="#" id="followers-count-<?php echo e($user->username); ?>" class="" data-toggle="modal" data-target="#followerModal_<?php echo e($user->username); ?>">Follower(s) <?php echo e($user->followers->count()); ?></a>
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                        <?php $__empty_1 = true; $__currentLoopData = $user->followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="/profile/<?php echo e($user->where('id',$follower->follower_id)->value('username')); ?>/about"><?php echo e($user->where('id',$follower->follower_id)->value('fname')); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>Oh no! Nobody is following you.</p> 
                            <p>Click <a href="#">here</a> to find new friends!</p>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        <a href="#" id="following-count-<?php echo e($user->username); ?>" class="" data-toggle="modal" data-target="#followingModal_<?php echo e($user->username); ?>" >Following <?php echo e($user->following->count()); ?></a>
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                        <?php $__empty_1 = true; $__currentLoopData = $user->following; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $following): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="/profile/<?php echo e($user->where('id',$following->following_id)->value('username')); ?>/about"><?php echo e($user->where('id',$following->following_id)->value('fname')); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>You are currently not following anyone yet.</p> 
                            <p>Click <a href="#">here</a> to explore more!</p>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center col-md-5">    
        <h2> Genres Listened To </h2>
        <ul>
        <?php $__empty_1 = true; $__currentLoopData = $user->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li> <?php echo e($genre->genre); ?> </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            none
        <?php endif; ?>
        </ul>

        <h2> Instruments Played </h2>
        <ul>
            <?php $__empty_1 = true; $__currentLoopData = $user->instruments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instrument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li> <?php echo e($instrument->instrument); ?> </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            None
            <?php endif; ?>
        </ul>
    </div>
</div>

<!-- ERIC CODE -->


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
                    <a href="/profile/<?php echo e($user->where('id',$follower->follower_id)->value('username')); ?>/about"><?php echo e($user->where('id',$follower->follower_id)->value('fname')); ?></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>Oh no! Nobody is following you.</p> 
                    <p>Click <a href="#">here</a> to find new friends!</p>
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
                        <a href="/profile/<?php echo e($user->where('id',$following->following_id)->value('username')); ?>/about"><?php echo e($user->where('id',$following->following_id)->value('fname')); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p>You are currently not following anyone yet.</p> 
                        <p>Click <a href="#">here</a> to explore more!</p>
                    <?php endif; ?>
                </p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    window.onload = function(){
        document.getElementById("about").className="active";
        document.getElementById("posts").className="";
    }
</script>
<!--  END OF MODAL -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>