<?php $__env->startSection('head'); ?>
<link href="<?php echo e(asset('css/logreg.css')); ?>" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">    
        <div class="logo"><img src="/img-uploads/Drums.svg" /></div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
	            <div class="panel-heading">Settings</div>
                <div class="panel-body">
					<form id="login-form" class="form-horizontal" action="/user/settings/<?php echo e($user->id); ?>" method="POST">
						<?php echo e(csrf_field()); ?>

			            <?php echo e(method_field('PUT')); ?>

						<input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" />
		                 <?php if($errors->any()): ?>
		                <div class="row collapse">
		                    <ul class="alert-box warning radius">
		                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                            <li> <?php echo e($error); ?> </li>
		                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                    </ul>
		                </div>
		                <?php endif; ?>

		                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
		                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
		                    <div class="col-md-6">
		                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>

		                        <?php if($errors->has('email')): ?>
		                            <span class="help-block">
		                                <strong><?php echo e($errors->first('email')); ?></strong>
		                            </span>
		                        <?php endif; ?>
		                    </div>
		                </div>


		                 <div class="form-group<?php echo e($errors->has('fname') ? ' has-error' : ''); ?>">
		                    <label for="fname" class="col-md-4 control-label">First Name</label>
		                    <div class="col-md-6">
		                        <input id="fname" type="text" class="form-control" name="fname" value="<?php echo e($user->fname); ?>" required>

		                        <?php if($errors->has('fname')): ?>
		                            <span class="help-block">
		                                <strong><?php echo e($errors->first('fname')); ?></strong>
		                            </span>
		                        <?php endif; ?>
		                    </div>
		                </div>

		                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
		                    <label for="lname" class="col-md-4 control-label">Last Name</label>
		                    <div class="col-md-6">
		                        <input id="lname" type="text" class="form-control" name="lname" value="<?php echo e($user->lname); ?>" required>

		                        <?php if($errors->has('lname')): ?>
		                            <span class="help-block">
		                                <strong><?php echo e($errors->first('lname')); ?></strong>
		                            </span>
		                        <?php endif; ?>
		                    </div>
		                </div>

		                <div class="form-group<?php echo e($errors->has('sex') ? ' has-error' : ''); ?>">
		                    <label for="sex" class="col-md-4 control-label">Sex</label>
		                    <div class="col-md-6">
		                        <label for="male" class="radio-inline">
		                        	<?php if($user->sex == "M"): ?>
		                        	<input id="male" type="radio" name="sex" value="M" checked="" />Male
		                        	<?php else: ?>
		                        	<input id="male" type="radio" name="sex" value="M" />Male
		                        	<?php endif; ?>
		                        </label>
		                        <label for="female" class="radio-inline">
		                        	<?php if($user->sex == "F"): ?>
		                        	<input id="female" type="radio" name="sex" value="F" checked="" />Female
		                        	<?php else: ?>
		                        	<input id="female" type="radio" name="sex" value="F" />Female
		                        	<?php endif; ?>
		                        </label>
		                        <?php if($errors->has('sex')): ?>
		                            <span class="help-block">
		                                <strong><?php echo e($errors->first('sex')); ?></strong>
		                            </span>
		                        <?php endif; ?>
		                    </div>
		                </div>

		                 <div class="form-group<?php echo e($errors->has('birthdate') ? ' has-error' : ''); ?>">
		                    <label for="birthdate" class="col-md-4 control-label">Birthdate</label>

		                    <div class="col-md-6">
		                        <input id="birthdate" type="date" class="form-control" name="birthdate" value="<?php echo e($user->birthdate); ?>" required>

		                        <?php if($errors->has('birthdate')): ?>
		                            <span class="help-block">
		                                <strong><?php echo e($errors->first('birthdate')); ?></strong>
		                            </span>
		                        <?php endif; ?>
		                    </div>
		                </div>

		                 <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
		                    <label for="username" class="col-md-4 control-label">User Name</label>

		                    <div class="col-md-6">
		                        <input id="username" type="text" class="form-control" name="username" value="<?php echo e($user->username); ?>" required>

		                        <?php if($errors->has('username')): ?>
		                            <span class="help-block">
		                                <strong><?php echo e($errors->first('username')); ?></strong>
		                            </span>
		                        <?php endif; ?>
		                    </div>
		                </div>


		                <!-- FIRST END -->
		                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
		                    <label for="password" class="col-md-4 control-label">Password</label>

		                    <div class="col-md-6">
		                        <input id="password" type="password" class="form-control" name="password" required>

		                        <?php if($errors->has('password')): ?>
		                            <span class="help-block">
		                                <strong><?php echo e($errors->first('password')); ?></strong>
		                            </span>
		                        <?php endif; ?>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

		                    <div class="col-md-6">
		                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
		                    </div>
		                </div>



		                <div class="col-md-2 col-md-offset-2">
		                	<h1>Genres</h1>
		                	<?php $__empty_1 = true; $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		                		<?php $c=0 ?>
		                		<?php $__empty_2 = true; $__currentLoopData = $user_genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
		                			<?php if($genre->id===$user_genre->genre_id): ?>
		                				<div class="checkbox">
		                				  <label><input type="checkbox" id="genres[<?php echo e($genre->id); ?>]" name="genres[<?php echo e($genre->id); ?>]" value="<?php echo e($genre->id); ?>" checked><?php echo e($genre->genre); ?></label>
		                				</div>
		                				<?php $c=1 ?>
		                			<?php endif; ?>
		                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
		                			No user_genre
		                		<?php endif; ?>
		                		<?php if($c==0): ?>
		                			<div class="checkbox">
		                			  <label><input type="checkbox" id="genres[<?php echo e($genre->id); ?>]" name="genres[<?php echo e($genre->id); ?>]" value="<?php echo e($genre->id); ?>"><?php echo e($genre->genre); ?></label>
		                			</div>
		                		<?php elseif($c==1): ?>
		                			<?php continue; ?>
		                		<?php endif; ?>
		                		

		                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
		                		No genre
		                	<?php endif; ?>
		                </div>

		                <div class="col-md-2 col-md-offset-2">
		                	<h1>Instruments</h1>
		                	<?php $__empty_1 = true; $__currentLoopData = $instruments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instrument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		                		<?php $c=0 ?>
		                		<?php $__empty_2 = true; $__currentLoopData = $user_instruments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_instrument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
		                			<?php if($instrument->id===$user_instrument->instrument_id): ?>
		                				<div class="checkbox">
		                				  <label><input type="checkbox" id="instruments[<?php echo e($instrument->id); ?>]" name="instruments[<?php echo e($instrument->id); ?>]" value="<?php echo e($instrument->id); ?>" checked><?php echo e($instrument->instrument); ?></label>
		                				</div>
		                				<?php $c=1 ?>
		                			<?php endif; ?>
		                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
		                			No user_instruments
		                		<?php endif; ?>
		                		<?php if($c==0): ?>
		                			<div class="checkbox">
		                			  <label><input type="checkbox" id="instruments[<?php echo e($instrument->id); ?>]" name="instruments[<?php echo e($instrument->id); ?>]" value="<?php echo e($instrument->id); ?>"><?php echo e($instrument->instrument); ?></label>
		                			</div>
		                		<?php elseif($c==1): ?>
		                			<?php continue; ?>
		                		<?php endif; ?>
		                		
		                		

		                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
		                		No intstruments
		                	<?php endif; ?>
		                </div>






		                <div class="form-group">
		                    <div class="text-center">
		                        <button type="submit" class="btn btn-primary">
		                            Submit
		                        </button>
		                    </div>
		                </div>
			        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>