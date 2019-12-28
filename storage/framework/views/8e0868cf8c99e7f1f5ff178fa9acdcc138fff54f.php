<?php $__env->startSection('style'); ?>

<style type="text/css">


</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<a href="<?php echo e(url('dashboard/users')); ?>">
	<button class="btn btn-info mb-3">
		<i class="fa fa-backward"></i> Back
	</button> 
</a>

<h1 class="form-create text-center mb-4"><?php echo app('translator')->get('site.newuser'); ?></h1>

 <div class="form-create">
	<form method="POST" action="<?php echo e(route('users.store')); ?>" enctype="multipart/form-data"> 
		<?php echo csrf_field(); ?>
		  <div class="form-group">
		    <label for="username"><?php echo app('translator')->get('site.username'); ?></label>
		    <input type="text" name ='name' class="form-control" id="username" aria-describedby="emailHelp" placeholder="<?php echo app('translator')->get('site.username'); ?>" value="<?php echo e(old('name')); ?>">

          <?php if($errors->has('name')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('name')); ?></p>
          <?php endif; ?>
		  </div>		

		  <div class="form-group">
		    <label for="email"><?php echo app('translator')->get('site.email'); ?></label>
		    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="<?php echo app('translator')->get('site.email'); ?>" value="<?php echo e(old('email')); ?>">
          <?php if($errors->has('email')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('email')); ?></p>
          <?php endif; ?>
		  </div>
		  <div class="form-group">
		    <label for="password"><?php echo app('translator')->get('site.password'); ?></label>
		    <input type="password" name="password" class="form-control" id="password" placeholder="<?php echo app('translator')->get('site.password'); ?>">
          <?php if($errors->has('password')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('password')); ?></p>
          <?php endif; ?>
		  </div>

		  <div class="form-group">
		    <label for="confirm_password"><?php echo app('translator')->get('site.confirm_password'); ?></label>
		    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="<?php echo app('translator')->get('site.confirm_password'); ?>">
		 <?php if($errors->has('confirm_password')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('confirm_password')); ?></p>
          <?php endif; ?>
		  </div>
             
             <div class="form-group">
             	<label>Choose Your Image </label><br>
             	<input type="file" name="image">

             </div>
  



<?php
 
 $crud = ['create','read','update','delete'];

?>





	<hr>
         <div class="form-group">
         	 <label>Permissions</label><br>
<?php $__currentLoopData = $crud; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$crud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="form-check form-check-inline mb-2">
			  <input class="form-check-input" type="checkbox" id="inlineCheckbox<?php echo e($key); ?>" value="<?php echo e($crud); ?>" name="permissions[]">

			  <label class="form-check-label" for="inlineCheckbox<?php echo e($key); ?>"><?php echo e($crud); ?></label>
			</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
	<hr>





		</div>	
          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-create"></i> Create</button>
		  </div>
    </form>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/mypos/resources/views/dashboard/users/create.blade.php ENDPATH**/ ?>