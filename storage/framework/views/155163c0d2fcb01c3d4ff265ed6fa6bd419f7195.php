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

<h1 class="form-create text-center mb-4">Edit</h1>

<div class="text-center mb-4">
	<img src="<?php echo e(asset($user->image)); ?>" width="200px" height="200px">

</div>

 <div class="form-create">
	<form method="POST" action="<?php echo e(route('users.update',$user->id)); ?>"> 
		<?php echo csrf_field(); ?>
		<?php echo method_field('put'); ?>
		  <div class="form-group">
		    <label for="username"><?php echo app('translator')->get('site.username'); ?></label>
		    <input type="text" name ='name' class="form-control" id="username" aria-describedby="emailHelp" placeholder="<?php echo app('translator')->get('site.username'); ?>" value="<?php echo e($user->name); ?>">

          <?php if($errors->has('name')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('name')); ?></p>
          <?php endif; ?>
		  </div>		

		  <div class="form-group">
		    <label for="email"><?php echo app('translator')->get('site.email'); ?></label>
		    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="<?php echo app('translator')->get('site.email'); ?>" value="<?php echo e($user->email); ?>">
          <?php if($errors->has('email')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('email')); ?></p>
          <?php endif; ?>
		  </div>
	


         <div class="form-group">
         	 <label>Permissions</label><br>

<?php
 
 $crud = ['create','read','update','delete'];

?>

<?php $__currentLoopData = $crud; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$crud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="form-check form-check-inline mb-2">
			  <input class="form-check-input" type="checkbox" id="inlineCheckbox<?php echo e($key); ?>" value="<?php echo e($crud); ?>" name="permissions[]" <?php echo e($user->hasPermissionTo($crud) ? 'checked' : ''); ?>>

			  <label class="form-check-label" for="inlineCheckbox<?php echo e($key); ?>"><?php echo e($crud); ?></label>
			</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	


		</div>	
          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
		  </div>
    </form>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/mypos/resources/views/dashboard/users/edit.blade.php ENDPATH**/ ?>