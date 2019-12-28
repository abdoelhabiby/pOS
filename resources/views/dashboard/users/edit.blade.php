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
	


         <div class="form-group">
         	 <label>Permissions</label><br>

@php
 
 $crud = ['create','read','update','delete'];

@endphp

@foreach($crud as $key=>$crud)
			<div class="form-check form-check-inline mb-2">
			  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$key}}" value="{{$crud}}" name="permissions[]" {{ $user->hasPermissionTo($crud) ? 'checked' : '' }}>

			  <label class="form-check-label" for="inlineCheckbox{{$key}}">{{$crud}}</label>
			</div>
@endforeach	


		</div>	
          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
		  </div>
    </form>
   </div>
@endsection