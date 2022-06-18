@extends('layouts.dashboard.app')

@section('style')

<style type="text/css">
.form-check{
	margin-left: 15px;
}

</style>

@endsection

@section('content')


<a href="{{url('dashboard/users')}}">
	<button class="btn btn-info mb-3">
		<i class="fa fa-backward"></i> Back
	</button> 
</a>

<h1 class="form-create text-center mb-4">@Lang('site.newuser')</h1>

 <div class="form-create">
	<form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data"> 
		@csrf
		  <div class="form-group">
		    <label for="username">@Lang('site.username')</label>
		    <input type="text" name ='name' class="form-control" id="username" aria-describedby="emailHelp" placeholder="@Lang('site.username')" value="{{old('name')}}">

          @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
          @endif
		  </div>		

		  <div class="form-group">
		    <label for="email">@Lang('site.email')</label>
		    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="@Lang('site.email')" value="{{old('email')}}">
          @if($errors->has('email'))
             <p class="text-danger text-uppercase">{{$errors->first('email')}}</p>
          @endif
		  </div>
		  <div class="form-group">
		    <label for="password">@Lang('site.password')</label>
		    <input type="password" name="password" class="form-control" id="password" placeholder="@Lang('site.password')">
          @if($errors->has('password'))
             <p class="text-danger text-uppercase">{{$errors->first('password')}}</p>
          @endif
		  </div>

		  <div class="form-group">
		    <label for="confirm_password">@Lang('site.confirm_password')</label>
		    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="@Lang('site.confirm_password')">
		 @if($errors->has('confirm_password'))
             <p class="text-danger text-uppercase">{{$errors->first('confirm_password')}}</p>
          @endif
		  </div>
             
             <div class="form-group">
             	<label>Choose Your Image </label><br>
             	<input type="file" name="image">

          @if($errors->has('image'))
             <p class="text-danger text-uppercase">{{$errors->first('image')}}</p>
          @endif

             </div>
  



@php
 
 $crud_user = ['create','read','update','delete'];
 $crud_cat = ['create_cat','read_cat','update_cat','delete_cat'];
 $crud_pro = ['create_pro','read_pro','update_pro','delete_pro'];
 $crud_cli = ['create_cli','read_cli','update_cli','delete_cli'];
 $crud_ord = ['create_ord','read_ord','update_ord','delete_ord'];



@endphp





	<hr>
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
			  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$key}}" value="{{$crud}}" name="permissions[]">

			  <label class="form-check-label" for="inlineCheckbox{{$key}}">{{$crud}}</label>
			</div>
       @endforeach	
 </div>
  <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="profile-tab">
  	<br>
		    @foreach($crud_cat as $key=>$crud)
					<div class="form-check form-check-inline mb-2">
					  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$crud}}" value="{{$crud}}" name="permissions[]">

					  <label class="form-check-label" for="inlineCheckbox{{$crud}}">{{$crud}}</label>
					</div>
		@endforeach	

  </div>
  <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="contact-tab">
  <br>
       
       @foreach($crud_pro as $key=>$crud)
			<div class="form-check form-check-inline mb-2">
			  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$crud}}" value="{{$crud}}" name="permissions[]">

			  <label class="form-check-label" for="inlineCheckbox{{$crud}}">{{$crud}}</label>
			</div>
        @endforeach

 
  </div>
   
     <div class="tab-pane fade" id="Clients" role="tabpanel" aria-labelledby="contact-tab">
     	<br>
		    @foreach($crud_cli as $key=>$crud)
					<div class="form-check form-check-inline mb-2">
					  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$crud}}" value="{{$crud}}" name="permissions[]">

					  <label class="form-check-label" for="inlineCheckbox{{$crud}}">{{$crud}}</label>
					</div>
		 @endforeach
    </div>

     <div class="tab-pane fade" id="Orders" role="tabpanel" aria-labelledby="contact-tab">
     	<br>
          @foreach($crud_ord as $key=>$crud)
			<div class="form-check form-check-inline mb-2">
			  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$crud}}" value="{{$crud}}" name="permissions[]">

			  <label class="form-check-label" for="inlineCheckbox{{$crud}}">{{$crud}}</label>
			</div>
        @endforeach	
    </div>

</div>



		</div>	
          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-create"></i> Create</button>
		  </div>
    </form>
   </div>
@endsection