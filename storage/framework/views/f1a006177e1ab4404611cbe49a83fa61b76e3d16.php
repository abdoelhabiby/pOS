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
											        <button class="btn btn-link collapsed fix-foo" data-toggle="collapse" data-target="#collapse<?php echo e($cate->id); ?>" aria-expanded="false" aria-controls="collapseThree">
											         <?php echo e($cate->name); ?>

											        </button>
											      </h5>
											    </div>
                                    <?php if($cate->products->count() > 0): ?>
											    <div id="collapse<?php echo e($cate->id); ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											      <div class="card-body">
                        

											      	<table class="table text-center">
											      		<thead>
											      			<tr>
											      				<th>Name</th>
											      				<th>Price</th>
											      				<th>Quantity in stock</th>
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
									 <a href="" class="btn btn-success btn-sm add-order <?php echo e(in_array($product->id, $order->product->pluck('id')->toArray()) ? 'disabled' : ''); ?>" 
									    data-name = '<?php echo $product->name; ?>'
									    data-price='<?php echo $product->sale_price; ?>'
                                        id = 'product-<?php echo $product->id; ?>'
                                        data-id = '<?php echo $product->id; ?>'

									    >
									    <i class="fa fa-plus"></i></a>
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
                            
                         <form action="<?php echo e(route('order.update',$order->id)); ?>" method="POST">
                         	<?php echo csrf_field(); ?>
                         	<?php echo method_field('put'); ?>
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
                            <?php $__currentLoopData = $productOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod_Ord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
                                        <tr class='order-<?php echo e($prod_Ord->id); ?>'>
							             <input type='hidden' name='products_id[]' value='<?php echo $prod_Ord->id; ?>'>
							             
							              <td><?php echo $prod_Ord->name; ?></td>
							              <td>
							                 <input type='number' name='quantity[]' min=1 value="<?php echo e($prod_Ord->pivot->quantity); ?>" class='form-control decressIncress'>
							              </td>
							              <td class='ProductPrice' data-price='<?php echo number_format($prod_Ord->sale_price,2); ?>'>
							              	<?php echo number_format(($prod_Ord->sale_price * $prod_Ord->pivot->quantity),2); ?>

							              </td>
							              <td>
							               <button class='btn btn-danger btn-sm removeo'  data-id='<?php echo e($prod_Ord->id); ?>'>
							                     <i class='fa fa-trash'></i>
							                   </button> 
							              </td>
							            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						      		</tbody>


						      	</table>
						      	<div class="form-group container row">
                                   <h5 class="col-md-8 mt-2">ToTal : <span class="TotalAmount"><?php echo e($order->TotalPrice); ?></span></h5>

						      	 <input type="submit" name="order" value="Submit Order" class="btn btn-primary  col-md-4 SubmitOrder disabled" >
                         	   </div>
                         </form>   

			
				           </div>
				        </div>
                    </div>    
<!-- =============================================================================== -->

         </div> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/mypos/resources/views/dashboard/client/order/edit.blade.php ENDPATH**/ ?>