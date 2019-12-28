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

             </div>
  



@php
 
 $crud = ['create','read','update','delete'];

@endphp





	<hr>
         <div class="form-group">
         	 <label>Permissions</label><br>
@foreach($crud as $key=>$crud)
			<div class="form-check form-check-inline mb-2">
			  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$key}}" value="{{$crud}}" name="permissions[]">

			  <label class="form-check-label" for="inlineCheckbox{{$key}}">{{$crud}}</label>
			</div>
@endforeach	
	<hr>





		</div>	
          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-create"></i> Create</button>
		  </div>
    </form>
   </div>
@endsection