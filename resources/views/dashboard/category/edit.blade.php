@extends('layouts.dashboard.app')

@section('style')

<style type="text/css">


</style>

@endsection

@section('content')


<a href="{{url(route('category.index'))}}">
	<button class="btn btn-info mb-3">
		<i class="fa fa-backward"></i> Back
	</button> 
</a>

<h1 class="form-create text-center mb-4">Edit</h1>



 <div class="form-create">
	<form method="POST" action="{{route('category.update',$category->id)}}"> 
		@csrf
		@method('put')
		  <div class="form-group">
		    <label for="username">@Lang('site.username')</label>
		    <input type="text" name ='name' class="form-control" id="username" aria-describedby="emailHelp" placeholder="@Lang('site.username')" value="{{$category->name}}">

          @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
          @endif
		  </div>		

		

          <div class="form-group">
		    <button type="submit" class="btn btn-primary"> Edit</button>
		  </div>
    </form>
   </div>
@endsection