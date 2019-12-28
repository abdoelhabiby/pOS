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

<h1 class="form-create text-center mb-4">New client</h1>

 <div class="form-create">
	<form method="POST" action="{{route('client.store')}}"> 
		@csrf
		  <div class="form-group">
		    <label for="username">Client Name</label>
		    <input type="text" name ='name' class="form-control" id="username" aria-describedby="emailHelp" placeholder="Name" value="{{old('name')}}" >

          @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
          @endif
		  </div>

		   <div class="form-group">
		    <label for="phone1">Phone *</label>
		    <input type="number" name ='phone' class="form-control" id="phone1"  placeholder="phone" >

          @if($errors->has('phone'))
             <p class="text-danger text-uppercase">{{$errors->first('phone')}}</p>
          @endif
		  </div>


		   <div class="form-group">
		    <label for="phone">Phone </label>
		    <input type="number" name ='phone2' class="form-control" id="phone"  placeholder="phone" >
             
          @if($errors->has('phone2'))
             <p class="text-danger text-uppercase">{{$errors->first('phone2')}}</p>
          @endif

		  </div>


		  <div class="form-group">
		    <label for="addr">Address</label>
		    <input type="text" name ='address' class="form-control" id="addr" placeholder="address" value="{{old('address')}}" >

          @if($errors->has('address'))
             <p class="text-danger text-uppercase">{{$errors->first('address')}}</p>
          @endif
		  </div>		

		 
          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-create"></i> Create</button>
		  </div>
    </form>
   </div>
@endsection