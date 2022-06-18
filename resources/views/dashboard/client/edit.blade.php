@extends('layouts.dashboard.app')

@section('style')

<style type="text/css">


</style>

@endsection

@section('content')


<a href="{{route('client.index')}}">
	<button class="btn btn-info mb-3">
		<i class="fa fa-backward"></i> Back
	</button> 
</a>

<h1 class="form-create text-center mb-4">Edit client</h1>

 <div class="form-create">
	<form method="POST" action="{{route('client.update',$client->id)}}"> 
		@csrf
		@method('put')
		  <div class="form-group">
		    <label for="username">Client Name</label>
		    <input type="text" name ='name' class="form-control" id="username" aria-describedby="emailHelp" placeholder="Name" value="{{$client->name}}" >

          @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
          @endif
		  </div>

		   <div class="form-group">
		    <label for="phone">Phone</label>
		    <input type="number" name ='phone' class="form-control" id="phone" aria-describedby="emailHelp" placeholder="phone" value="{{$client->phone}}" >

          @if($errors->has('phone'))
             <p class="text-danger text-uppercase">{{$errors->first('phone')}}</p>
          @endif
		  </div>


		  <div class="form-group">
		    <label for="addr">Address</label>
		    <input type="text" name ='address' class="form-control" id="addr" aria-describedby="emailHelp" placeholder="address" value="{{$client->address}}" >

          @if($errors->has('address'))
             <p class="text-danger text-uppercase">{{$errors->first('address')}}</p>
          @endif
		  </div>		

		 
          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-create"></i> Edit</button>
		  </div>
    </form>
   </div>
@endsection