@extends('layouts.dashboard.app')


@section('search')

    <form action='{{route("users.index")}}' method="get">
            <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="@Lang('site.search')" aria-label="Search" aria-describedby="basic-addon2" name="search" value="{{request()->search}}">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="Search">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
     </form>

@endsection


@section('content')
<div class="container">

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> {{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>



@endif


    <div class="panner ">
<!-- 				<div class="row  mb-4">
 -->					<div class=" ">
                  		  <h2 class="d-inline {{ LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'float-right ' : ''}}">@Lang('site.users') </h2> <span>: {{$users->total()}}</span>
                  		  </div>


@if(auth()->user()->hasPermissionTo('create'))
                    <div class="float-right">
                    		  <a href="{{url('dashboard/users/create')}}" class="btn btn-primary ">
			  	                 <i class="fa fa-plus"> </i> @Lang('site.newuser')
			                  </a>
                    </div>
                    <div class="clearfix mb-4"></div>
@endif
<!-- 				 </div>
 -->
			<div class="jumbotron " style="background: #FFF; padding: 2rem 2rem">

	
		
  @if($users->count() == 0  )

       <h2 class="text-center">no data</h2>
   @else
			  <table class="table text-center">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">@Lang('site.username')</th>
					      <th scope="col">@Lang('site.email')</th>
<!-- 					      <th scope="col" style="max-width: 100px"> Permissions </th>
 -->

 @if(auth()->user()->hasAnyPermission(['update','delete']))
             
					      <th scope="col">@Lang('site.action')</th>
@endif					      
					    </tr>
					  </thead>

					  <tbody>
					@foreach($users as $user)
					    <tr>
					      <th scope="row">{!! $user->id !!}</th>
					      <td>{!! $user->name !!}</td>
					      <td>{!! $user->email !!}</td>
	<!-- 				      <td style="max-width: 100px">

					      	<?php 
                               // $permission = $user->getAllPermissions();

                               // foreach ($permission as $value) {
                               // 	echo " | " . $value['name'] . " | ";
                               // }
					      	?>
					      </td> -->
					      <td>
			@if(auth()->user()->hasPermissionTo('update'))		      	
					      	<a href="users/{{$user->id}}/edit" class="btn btn-info">
					      		Edit <i class="fa fa-edit"> </i>
					      	</a>
			@endif	

			@if(auth()->user()->hasPermissionTo('delete'))		      	
			 	
             <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#logoutModalDelete">
                  
                  Delete <i class="fa fa-trash"> </i>
                </a>




               
            @endif
					      </td>
					    </tr>
          


					@endforeach
					  </tbody>
					</table>

<div class="d-flex justify-content-center mt-5">

	{{ $users->appends(request()->query())->links() }}

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

              <form method="post" action="users/{{$user->id}}" style="display: inline;">
              @csrf
                @method('delete')

                <button type="submit" class="btn btn-danger">Delete </button>
                  </form>

        </div>
      </div>
    </div>
  </div>




 @endif


			</div>



    </div>
			  <div class="clearfix"></div>








</div>
@endsection
