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


    <div class="panner ">
				<div class="row  mb-4">
					<div class="col-md-3 ">
                  		  <h2 class="<?php echo e(LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'float-right ' : ''); ?>"><?php echo app('translator')->get('site.users'); ?></h2>
                  		  <small>count : <?php echo e($users->total()); ?></small>
                  		  </div>
                     <div class="to-from col-md-5 text-center">
                  		


                  		 <?php echo Form::open(['url' => 'dashboard/users','method' => 'get']); ?>

                  		   <div class="row">
                             <div class="form-group  col-md-8"> 
 									<input type="text" class="form-control border-0 small d-block" placeholder="Search For" aria-label="Search" aria-describedby="basic-addon2" name="search" value="<?php echo e(request()->search); ?>">
                             </div>
                             <div class="col-md-4">

                                <button type="submit" class="btn btn-primary">
                                	<i class="fa fa-search"> </i> Search
                                </button>
                             </div>
                           </div>
                   		 <?php echo Form::close(); ?>

                  		
                    </div>

<?php if(auth()->user()->hasPermissionTo('create')): ?>
                    <div class="col-md-4 text-center">
                    		  <a href="<?php echo e(url('dashboard/users/create')); ?>" class="btn btn-primary ">
			  	                 <i class="fa fa-plus"> </i> <?php echo app('translator')->get('site.newuser'); ?>
			                  </a>
                    </div>
<?php endif; ?>
				 </div>

			<div class="jumbotron " style="background: #FFF; padding: 2rem 2rem">

	
		
  <?php if($users->count() == 0  ): ?>

       <h2 class="text-center">no data</h2>
   <?php else: ?>
			  <table class="table text-center">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col"><?php echo app('translator')->get('site.username'); ?></th>
					      <th scope="col"><?php echo app('translator')->get('site.email'); ?></th>
					      <th scope="col"> Permissions </th>
<?php if(auth()->user()->hasAnyPermission(['update','delete'])): ?>
             
					      <th scope="col"><?php echo app('translator')->get('site.action'); ?></th>
<?php endif; ?>					      
					    </tr>
					  </thead>

					  <tbody>
					<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr>
					      <th scope="row"><?php echo $user->id; ?></th>
					      <td><?php echo $user->name; ?></td>
					      <td><?php echo $user->email; ?></td>
					      <td>
					      	<?php 
                               $permission = $user->getAllPermissions();

                               foreach ($permission as $value) {
                               	echo " | " . $value['name'] . " | ";
                               }
					      	?>
					      </td>
					      <td>
			<?php if(auth()->user()->hasPermissionTo('update')): ?>		      	
					      	<a href="users/<?php echo e($user->id); ?>/edit" class="btn btn-info">
					      		Edit <i class="fa fa-edit"> </i>
					      	</a>
			<?php endif; ?>	

			<?php if(auth()->user()->hasPermissionTo('delete')): ?>		      	
			 	
             <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#logoutModalDelete">
                  
                  Delete <i class="fa fa-trash"> </i>
                </a>




               
            <?php endif; ?>
					      </td>
					    </tr>
          


					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  </tbody>
					</table>

<div class="d-flex justify-content-center mt-5">

	<?php echo e($users->appends(request()->query())->links()); ?>


	 </div>




  <div class="modal fade" id="logoutModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Delete" below if you are shore. Or "Cancel" to back</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

              <form method="post" action="users/<?php echo e($user->id); ?>" style="display: inline;">
              <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>

                <button type="submit" class="btn btn-danger">Delete </button>
                  </form>

        </div>
      </div>
    </div>
  </div>




 <?php endif; ?>


			</div>



    </div>
			  <div class="clearfix"></div>








</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/mypos/resources/views/dashboard/users/index.blade.php ENDPATH**/ ?>