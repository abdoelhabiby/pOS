               <table class="table text-center printMe">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Quantity</th>
                          <th>Unit Price</th>
                        </tr>
                      </thead>
                      <tbody class="app-order">

           <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allProducts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
               <td><?php echo $allProducts->name; ?></td>
               <td><?php echo $allProducts->pivot->quantity; ?></td>
               <td><?php echo number_format($allProducts->sale_price,2); ?></td>
             </tr>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </tbody>


                </table>
                <div class="mb-4">

                 <h5 class="d-inline ml-4">Total Price : </h5><span> <?php echo number_format($totalPrice,2); ?></span>

                 <button class="btn btn-info mt-2 toprint" style="width: 100%">Print</button>

             
               </div><?php /**PATH /home/ubuntu/mypos/resources/views/dashboard/orders/_products.blade.php ENDPATH**/ ?>