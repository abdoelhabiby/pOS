<?php $__env->startSection('content'); ?>

<div class="container">

  <?php if(session('success')): ?>

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> <?php echo e(session('success')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php endif; ?>

  
  <div class="head row">

    <div class="col-md-3">
      <h2>Products</h2><span> Count: <?php echo e($products == null ? 0 : $products->count()); ?></span>
    </div>


  <div class="to-from col-md-9 text-center">
          


       <?php echo Form::open(['url' => 'dashboard/products','method' => 'get']); ?>

             <div class="row">

                 <div class="form-group  col-md-5 row"> 

                      <select name="category_id" class="form-control">
                        <option value="">All Category</option>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             
                             <option value="<?php echo $cat->id; ?>" <?php echo e($cat->id == request()->category_id ? 'selected' : ''); ?>><?php echo $cat->name; ?></option>
            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
              </div>


              <div class="col-md-7 row">
                 <div class="col-md-8">   
                 <input type="search" class="form-control border-0 small d-block" placeholder="Search For" aria-label="Search" aria-describedby="basic-addon2" name="search" value="<?php echo e(request()->search); ?>">
                 </div>
                 <div class="col-md-4">

                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-search"> </i> Search
                    </button>
                 </div>

              </div>


               </div>
           <?php echo Form::close(); ?>

          




          


          
   </div>



  </div>


<!-- --------------------------------------------------------------- -->

<?php if(auth()->user()->hasPermissionTo('create_pro')): ?>
        <div class="float-right mt-4">
            
              <a href="products/create" class="btn btn-primary">
               <i class="fa fa-plus"> </i> Create New Products
              </a>
            
        </div>
        <div class="clearfix"></div>

<?php endif; ?>






<!-- --------------------------------------------------------------- -->






  
  <div class="the_table mt-4">
     
     <?php if($products->count() > 0): ?>
         
        <table class="table text-center" style="background: #FFF">
          <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Description</th>
               <th>Purchasing Price</th>
               <th>Sale Price</th>
               <th>Profit</th>
               <th>Quantity</th>
               <th>BelongsTo</th>
           <?php if(auth()->user()->hasAnyPermission(['update_pro','delete_pro'])): ?>
               <th>Action</th>

            <?php endif; ?>   
            </tr>
          </thead>

          <tbody>
   <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <td><?php echo $product->id; ?></td>
         <td><?php echo $product->name; ?></td>
         <td><?php echo $product->description; ?></td>
         <td>$<?php echo $product->purchasing_price; ?></td>
         <td>$<?php echo $product->sale_price; ?></td>
         <td><?php echo round($product->profit_ratio,2) ." %"; ?></td>
         <td><?php echo $product->quantity; ?></td>
         <td><?php echo $product->category->name; ?></td>
         <td>
           <?php if(auth()->user()->hasPermissionTo('update_pro')): ?>
              <a href="products/<?php echo e($product->id); ?>/edit" class="btn btn-info">
              Edit <i class="fa fa-edit"></i>
              </a>
 
           <?php endif; ?>

          <?php if(auth()->user()->hasPermissionTo('delete_pro')): ?>

             <form method="post" action="products/<?php echo e($product->id); ?>" style="display: inline;">
              <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>

                <button type="submit" class="btn btn-danger confirm">Delete </button>
                  </form>

 
           <?php endif; ?>


         </td>

 
       </tr>



<!-- --------------------------------to model delete ---------------------- -->





<!-- --------------------------------to model delete ---------------------- -->




   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         

          </tbody>



        </table>


          
          <div class="tolinks d-flex justify-content-center" style="margin-top: 70px">
             <?php echo e($products->appends(request()->query())->links()); ?>

          </div>

<?php else: ?>   

     <h4 class="text-center" style="margin-top: 100px;"> Sorry No found Any Recorde !!</h4>

<?php endif; ?>


  </div>




</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/F-DASHBOARD/resources/views/dashboard/products/index.blade.php ENDPATH**/ ?>