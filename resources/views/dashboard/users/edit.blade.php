@extends('layouts.dashboard.app')

@section('style')

<style type="text/css">


</style>

@endsection

@section('content')


<a href="{{url('dashboard/users')}}">
	<button class="btn btn-info mb-3">
		<i class="fa fa-backward"></i> Back
	</button> 
</a>

<h1 class="form-create text-center mb-4">Edit</h1>

<div class="text-center mb-4">
	<img src="{{asset($user->image)}}" width="200px" height="200px">

</div>

 <div class="form-create">
	<form method="POST" action="{{route('users.update',$user->id)}}"> 
		@csrf
		@method('put')
		  <div class="form-group">
		    <label for="username">@Lang('site.username')</label>
		    <input type="text" name ='name' class="form-control" id="username" aria-describedby="emailHelp" placeholder="@Lang('site.username')" value="{{$user->name}}">

          @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
          @endif
		  </div>		

		  <div class="form-group">
		    <label for="email">@Lang('site.email')</label>
		    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="@Lang('site.email')" value="{{$user->email}}">
          @if($errors->has('email'))
             <p class="text-danger text-uppercase">{{$errors->first('email')}}</p>
          @endif
		  </div>
	


       
@php
 
 $crud_user = ['create','read','update','delete'];
 $crud_cat = ['create_cat','read_cat','update_cat','delete_cat'];
 $crud_pro = ['create_pro','read_pro','update_pro','delete_pro'];
 $crud_cli = ['create_cli','read_cli','update_cli','delete_cli'];
 $crud_ord = ['create_ord','read_ord','update_ord','delete_ord'];

@endphp



         <div class="form-group">
         	 <label class="font-weight-bold">Permissions</label>


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#super" role="tab" aria-controls="home" aria-selected="true">Supervisor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#category" role="tab" aria-controls="profile" aria-selected="false">Categorys</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#products" role="tab" aria-controls="contact" aria-selected="false">Products</a>
  </li> 

   <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Clients" role="tab" aria-controls="contact" aria-selected="false">Clients</a>
  </li>

    <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Orders" role="tab" aria-controls="contact" aria-selected="false">Orders</a>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="super" role="tabpanel" aria-labelledby="home-tab">
  	 <br>
        @foreach($crud_user as $key=>$crud)
			<div class="form-check form-check-inline mb-2">
			  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$key}}" value="{{$crud}}" name="permissions[]" {{ $user->hasPermissionTo($crud) ? 'checked' : '' }}>

			  <label class="form-check-label" for="inlineCheckbox{{$key}}">{{$crud}}</label>
			</div>
       @endforeach	
 </div>
  <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="profile-tab">
  	<br>
		    @foreach($crud_cat as $key=>$crud)
					<div class="form-check form-check-inline mb-2">
					  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$crud}}" value="{{$crud}}" name="permissions[]" {{ $user->hasPermissionTo($crud) ? 'checked' : '' }}>

					  <label class="form-check-label" for="inlineCheckbox{{$crud}}">{{$crud}}</label>
					</div>
		@endforeach	

  </div>
  <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="contact-tab">
  <br>
       
       @foreach($crud_pro as $key=>$crud)
			<div class="form-check form-check-inline mb-2">
			  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$crud}}" value="{{$crud}}" name="permissions[]" {{ $user->hasPermissionTo($crud) ? 'checked' : '' }}>

			  <label class="form-check-label" for="inlineCheckbox{{$crud}}">{{$crud}}</label>
			</div>
        @endforeach

 
  </div>
   
     <div class="tab-pane fade" id="Clients" role="tabpanel" aria-labelledby="contact-tab">
     	<br>
		    @foreach($crud_cli as $key=>$crud)
					<div class="form-check form-check-inline mb-2">
					  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$crud}}" value="{{$crud}}" name="permissions[]" {{ $user->hasPermissionTo($crud) ? 'checked' : '' }}>

					  <label class="form-check-label" for="inlineCheckbox{{$crud}}">{{$crud}}</label>
					</div>
		 @endforeach
    </div>

     <div class="tab-pane fade" id="Orders" role="tabpanel" aria-labelledby="contact-tab">
     	<br>
          @foreach($crud_ord as $key=>$crud)
			<div class="form-check form-check-inline mb-2">
			  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$crud}}" value="{{$crud}}" name="permissions[]" {{ $user->hasPermissionTo($crud) ? 'checked' : '' }}>

			  <label class="form-check-label" for="inlineCheckbox{{$crud}}">{{$crud}}</label>
			</div>
        @endforeach	
    </div>

</div>



		</div>	








		</div>	
          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
		  </div>
    </form>
   </div>
@endsection