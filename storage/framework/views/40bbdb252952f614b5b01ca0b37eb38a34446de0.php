<?php $__env->startSection('style'); ?>

<style type="text/css">


</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<a href="<?php echo e(url(route('category.index'))); ?>">
	<button class="btn btn-info mb-3">
		<i class="fa fa-backward"></i> Back
	</button> 
</a>

<h1 class="form-create text-center mb-4">Edit</h1>



 <div class="form-create">
	<form method="POST" action="<?php echo e(route('category.update',$category->id)); ?>"> 
		<?php echo csrf_field(); ?>
		<?php echo method_field('put'); ?>
		  <div class="form-group">
		    <label for="username"><?php echo app('translator')->get('site.username'); ?></label>
		    <input type="text" name ='name' class="form-control" id="username" aria-describedby="emailHelp" placeholder="<?php echo app('translator')->get('site.username'); ?>" value="<?php echo e($category->name); ?>">

          <?php if($errors->has('name')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('name')); ?></p>
          <?php endif; ?>
		  </div>		

		

          <div class="form-group">
		    <button type="submit" class="btn btn-primary"> Edit</button>
		  </div>
    </form>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/mypos/resources/views/dashboard/category/edit.blade.php ENDPATH**/ ?>