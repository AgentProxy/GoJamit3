<?php $__env->startSection('title', '|All Genres'); ?>

<?php $__env->startSection('content'); ?>


<div class="row">
	<div class="col-md-8">
	<h1> Genres </h1>
	<?php $__currentLoopData = $user->; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $use): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<p> <?php echo e($use->fname); ?> </p>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>