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

<h2 class="text-center mb-5">Make Order</h2>

      <!-- Content Row -->

          <div class="row">

<!-- =============================================================================== -->
                    
                    <div class="col-md-6">
				              <div class="card shadow mb-4">
				                <!-- Card Header - Dropdown -->
				                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				                  <h6 class="m-0 font-weight-bold text-primary">Products</h6>
				
				                </div>
				                <!-- Card Body -->
				                <div class="card-body">
									      <div id="accordion">
									
				<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>					
											  <div class="card">
											    <div class="card-header card-he2" id="headingThree">
											      <h5 class="mb-0">
											        <button class="btn btn-link collapsed fix-foo" data-toggle="collapse" data-target="#collapse-c-<?php echo e($cate->id); ?>" aria-expanded="false" aria-controls="collapseThree">
											         <?php echo e($cate->name); ?>

											        </button>
											      </h5>
											    </div>
                                    <?php if($cate->products->count() > 0): ?>
											    <div id="collapse-c-<?php echo e($cate->id); ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											      <div class="card-body">
                        

											      	<table class="table text-center">
											      		<thead>
											      			<tr>
											      				<th>Name</th>
											      				<th>Price</th>
											      				<th>Available quantity</th>
											      				<th>Add</th>
											      			</tr>
											      		</thead>
											      		<tbody>
							<?php $__currentLoopData = $cate->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <tr>
											      			
											      				<td><?php echo $product->name; ?></td>
											      				<td><?php echo $product->sale_price; ?></td>
											      				<td><?php echo $product->quantity; ?></td>
											      				<td>
					   <?php if($product->quantity > 0): ?>				      			
      					

									 <a href="" class="btn btn-success btn-sm add-order" 
									    data-name = '<?php echo $product->name; ?>'
									    data-price='<?php echo $product->sale_price; ?>'
                                        id = 'product-<?php echo $product->id; ?>'
                                        data-id = '<?php echo $product->id; ?>'
                                        data-client = '<?php echo $clientId; ?>'

									    >
									    <i class="fa fa-plus"></i></a>
						<?php else: ?>
						  The quantity is over
						 <?php endif; ?> 			    
											      				</td>

										      				
											      			</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				      			
											      		</tbody>
											      	</table>
											    	
		
											      </div>
											    </div>
											<?php endif; ?>      
											  </div>     

											  <!-- en of card -->


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									   </div>

				                </div>
				              </div>
                    </div>
<!-- =============================================================================== -->
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
				                <!-- Card Header - Dropdown -->
				             <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				                  <h6 class="m-0 font-weight-bold text-primary">Your Order</h6>
				
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


  <!-- ========================= all order to this client ============================ -->

   
   <?php if($order->count() > 0): ?>

    <div class="row">

                    <div class="col-md-6">
				              <div class="card shadow mb-4">
				                <!-- Card Header - Dropdown -->
				                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				                  <h6 class="m-0 font-weight-bold text-primary"><?php echo e($order->count()); ?> previous orders</h6>
				
				                </div>
				                <!-- Card Body -->
				                <div class="card-body">
									      <div id="accordion">
									
				<?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ord_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>					
											  <div class="card">
											    <div class="card-header card-he2" id="headingThree">
											      <h5 class="mb-0">
											        <button class="btn btn-link collapsed fix-foo" data-toggle="collapse" data-target="#collapse-or-<?php echo e($ord_date->id); ?>" aria-expanded="false" aria-controls="collapseThree">
											         <?php echo e($ord_date->created_at); ?>

											        </button>
											      </h5>
											    </div>
                                    <?php if($ord_date->product->count() > 0): ?>
											    <div id="collapse-or-<?php echo e($ord_date->id); ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											      <div class="card-body">
                        

											      	<table class="table text-center">
											      		<thead>
											      			<tr>
											      				<th>Name</th>
											      				<th>Price</th>
											      				<th>Quantity</th>
											      				<th>Total Price</th>
											      			</tr>
											      		</thead>
											      		<tbody>
							<?php $__currentLoopData = $ord_date->product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>				      			
											      			<tr>
											      				<td><?php echo $products->name; ?></td>
											      				<td><?php echo $products->sale_price; ?></td>
											      				<td><?php echo $products->pivot->quantity; ?></td>
											      				<td><?php echo number_format($products->sale_price * $products->pivot->quantity,2); ?></td>
											      				<td>
	
											      				</td>
											      			</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				      			
											      		</tbody>
											      	</table>
											    	
		
											      </div>
											    </div>
											<?php endif; ?>      
											  </div>     

											  <!-- en of card -->


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									   </div>

				                </div>
				              </div>
                    </div>
                </div>

        <?php endif; ?>        
       <!-- ========================================================================= -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/F-DASHBOARD/resources/views/dashboard/client/order/create.blade.php ENDPATH**/ ?>