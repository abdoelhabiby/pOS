<?php $__env->startSection('style'); ?>

<style type="text/css">


</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<a href="<?php echo e(route('products.index')); ?>">
	<button class="btn btn-info mb-3">
		<i class="fa fa-backward"></i> Back
	</button> 
</a>

<h1 class="form-create text-center mb-4">New Product</h1>

 <div class="form-create">
	<form method="POST" action="<?php echo e(route('products.store')); ?>" enctype="multipart/form-data"> 
		<?php echo csrf_field(); ?>
<!-- --------------------------------------------------------------------------------- -->		
		  <div class="form-group">
		    <label for="name">Product Name</label>
		    <input type="text" name ='name' class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name" value="<?php echo e(old('name')); ?>" >

          <?php if($errors->has('name')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('name')); ?></p>
          <?php endif; ?>
		  </div>	 
<!-- --------------------------------------------------------------------------------- -->		


	      <div class="form-group">
			    <label for="des">Description</label>
			    <textarea name ='description' class="form-control ckeditor" id="des" placeholder="el Description"
			      ><?php echo e(old('description')); ?></textarea>

	          <?php if($errors->has('description')): ?>
	             <p class="text-danger text-uppercase"><?php echo e($errors->first('description')); ?></p>
	          <?php endif; ?>
		  </div>		


<!-- --------------------------------------------------------------------------------- -->
         <div class="form-group">
            <label for="cat">Category</label>
            <select name="category_id" class="form-control">
            	<option value=''>All Category</option>
         <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <option value="<?php echo e($cat->id); ?>" <?php echo e(old("category_id") == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
             <?php if($errors->has('category_id')): ?>
	             <p class="text-danger text-uppercase"><?php echo e($errors->first('category_id')); ?></p>
	          <?php endif; ?>
          </div>		
<!-- --------------------------------------------------------------------------------- -->		
		  <div class="form-group">
		    <label for="purchasing_price">Purchasing Price</label>
		    <input type="number" name ='purchasing_price' step="0.01" class="form-control" id="purchasing_price" 
		     value="<?php echo e(old('purchasing_price')); ?>" >

          <?php if($errors->has('purchasing_price')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('purchasing_price')); ?></p>
          <?php endif; ?>
		  </div>
<!-- --------------------------------------------------------------------------------- -->		

		  <div class="form-group">
		    <label for="sale_price">Sale Price</label>
		    <input type="number" name ='sale_price' step="0.01" class="form-control" id="sale_price" 
		     value="<?php echo e(old('sale_price')); ?>" >

          <?php if($errors->has('sale_price')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('sale_price')); ?></p>
          <?php endif; ?>
		  </div>
<!-- --------------------------------------------------------------------------------- -->		
		  <div class="form-group">
		    <label for="quantity">Quantity</label>
		    <input type="number" name ='quantity' class="form-control" id="quantity" 
		     value="<?php echo e(old('quantity')); ?>" >

          <?php if($errors->has('quantity')): ?>
             <p class="text-danger text-uppercase"><?php echo e($errors->first('quantity')); ?></p>
          <?php endif; ?>
		  </div>
<!-- --------------------------------------------------------------------------------- -->	

             <div class="form-group">
             	<label>Choose Your Product Image </label><br>
             	<input type="file" name="image">

             </div>	
<!-- --------------------------------------------------------------------------------- -->	
<!-- --------------------------------------------------------------------------------- -->	

          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-create"></i> Create</button>
		  </div>
    </form>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/mypos/resources/views/dashboard/products/create.blade.php ENDPATH**/ ?>