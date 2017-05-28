<?php $__env->startSection('head'); ?>
<link href="<?php echo e(asset('css/settings.css')); ?>" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="text-center" style="padding:50px 0">
	<div class="logo">Edit Profile Info</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="login-form" class="text-left" action="/user/settings/<?php echo e($user->id); ?>" method="post">
			<?php echo e(csrf_field()); ?>

			<?php echo e(method_field('PUT')); ?>

			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" />
					<div class="form-group">
						<label for="lg_username" class="sr-only">First name</label>
						<input type="text" class="form-control" name="fname" value="<?php echo e($user->fname); ?>" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Last name</label>
						<input type="text" class="form-control" name="lname" value="<?php echo e($user->lname); ?>" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" name="username" value="<?php echo e($user->username); ?>" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Email</label>
						<input type="text" class="form-control" name="email" value="<?php echo e($user->email); ?>" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Password</label>
						<input type="password" class="form-control" name="password" value="<?php echo e($user->password); ?>" />
					</div>
					
				</div>
				<button type="submit" class="login-button" value="Save"><i class="fa fa-chevron-right"></i></button>
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>