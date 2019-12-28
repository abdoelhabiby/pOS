@extends('layouts.dashboard.app')

@section('style')

<style type="text/css">


</style>

@endsection

@section('content')


<a href="{{route('category.index')}}">
	<button class="btn btn-info mb-3">
		<i class="fa fa-backward"></i> Back
	</button> 
</a>

<h1 class="form-create text-center mb-4">New Category</h1>

 <div class="form-create">
	<form method="POST" action="{{route('category.store')}}"> 
		@csrf
		  <div class="form-group">
		    <label for="username">Category Name</label>
		    <input type="text" name ='name' class="form-control" id="username" aria-describedby="emailHelp" placeholder="Name" value="{{old('name')}}" required>

          @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
          @endif
		  </div>		

		 
          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-create"></i> Create</button>
		  </div>
    </form>
   </div>
@endsection