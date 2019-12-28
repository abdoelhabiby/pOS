<?php $__env->startSection('style'); ?>

<style type="text/css">


</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<a href="<?php echo e(route('client.index')); ?>">
	<button class="btn btn-info mb-3">
		<i class="fa fa-backward"></i> Back
	</button> 
</a>

<h1 class="form-create text-center mb-4">Edit client</h1>

 <div class="form-create">
	<form method="POST" action="<?php echo e(route('client.update',$client->id)); ?>"> 
		<?php echo csrf_field(); ?>
		<?php echo method_field('put'); ?>
		  <div class="form-group">
		    <label for="username">Client Name</label>
		    <input type="text" name ='name' class="form-control" id="username" aria-describedby="emailHelp" placeholder="Name" value="<?php echo e($client->name); ?>" >

          <?php if($errors->has('name')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('name')); ?></p>
          <?php endif; ?>
		  </div>

		   <div class="form-group">
		    <label for="phone">Phone</label>
		    <input type="number" name ='phone' class="form-control" id="phone" aria-describedby="emailHelp" placeholder="phone" value="<?php echo e($client->phone); ?>" >

          <?php if($errors->has('phone')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('phone')); ?></p>
          <?php endif; ?>
		  </div>


		  <div class="form-group">
		    <label for="addr">Address</label>
		    <input type="text" name ='address' class="form-control" id="addr" aria-describedby="emailHelp" placeholder="address" value="<?php echo e($client->address); ?>" >

          <?php if($errors->has('address')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('address')); ?></p>
          <?php endif; ?>
		  </div>		

		 
          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-create"></i> Edit</button>
		  </div>
    </form>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/mypos/resources/views/dashboard/client/edit.blade.php ENDPATH**/ ?>