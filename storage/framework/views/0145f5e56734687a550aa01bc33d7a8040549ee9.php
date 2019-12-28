<?php $__env->startSection('style'); ?>

<style type="text/css">

.card-body{
  padding-left:2px; 
  padding-right:2px; 
}

.card-he2{
    padding-left:2px; 
  padding-right:0px; 
}

.card-header{
  padding-top: 1px;
    padding-bottom: 1px;
}

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row mb-5">
  

    <h2 class="col-md-9">All Order</h2>

    <div class="col-md-3">
      test
    </div>

</div>


      <!-- Content Row -->

          <div class="row">

<!-- =============================================================================== -->
                    
                    <div class="col-md-7">
                      <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
        
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                        <div id="accordion">
                  
                        <div class="card">

                  <?php if($order->count() > 0): ?>   


                              <table class="table text-center card-body">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Total Price</th>
                                    <th>Create At</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>

                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
               
                                  <tr>
                                   
                                        
                                          <td>   
                                                <?php echo e($allorder->client['name']); ?> 
                                               
                                          </td>
                                         
                                        
                                   
                                    <td><?php echo number_format($allorder->TotalPrice,2); ?></td>
                                    <td>
                                       <?php echo date_format($allorder->created_at,'d M Y'); ?>

                                    </td>
                                    <td>
                                      <?php if(auth()->user()->hasPermissionTo('update_ord')): ?>

                                      <a href="<?php echo e(route('order.products',$allorder->id)); ?>" class="btn btn-info">Show Order</a>

                                      <?php endif; ?>
                                    </td>

                                  </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
                                </tbody>
                              </table>

                          <?php else: ?>
                          
                          Soory Not Found Data    

                        <?php endif; ?>      
                            
    
                          
                        </div>     

                        <!-- en of card -->



                     </div>

                        </div>
                      </div>
                    </div>
<!-- =============================================================================== -->
                    <div class="col-md-5">
                        <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Products Of Order</h6>
        
                     </div>
                        <!-- Card Body -->
                    <div class="card-body">
                            
                         <form action="<?php echo e(route('order.store')); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="client_id" value="<?php echo e(request()->client_id); ?>">

                            <table class="table text-center">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody class="app-order">



                      </tbody>


                    </table>
                    <div class="form-group container row">
                                   <h5 class="col-md-8 mt-2">ToTal : <span class="TotalAmount">0</span></h5>

                     <input type="submit" name="order" value="Submit Order" class="btn btn-primary  col-md-4 SubmitOrder disabled" >
                             </div>
                         </form>   

      
                   </div>
                </div>
                    </div>    
<!-- =============================================================================== -->

         </div> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/mypos/resources/views/dashboard/client/order/index.blade.php ENDPATH**/ ?>