@extends('layouts.dashboard.app')

@section('style')

<style type="text/css">


</style>

@endsection

@section('content')


<a href="{{route('products.index')}}">
	<button class="btn btn-info mb-3">
		<i class="fa fa-backward"></i> Back
	</button> 
</a>

<!-- <div class="text-center mb-4">
	<img src="{{asset($product->image)}}">
</div> -->
<h1 class="form-create text-center mb-4">Edit Product</h1>

 <div class="form-create">
	<form method="POST" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data"> 
		@csrf
		@method('put')
<!-- --------------------------------------------------------------------------------- -->		
		  <div class="form-group">
		    <label for="name">Product Name</label>
		    <input type="text" name ='name' class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name" value="{{$product->name}}" >

          @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
          @endif
		  </div>	 
<!-- --------------------------------------------------------------------------------- -->		


	      <div class="form-group">
			    <label for="des">Description</label>
			    <textarea name ='description' class="form-control ckeditor" id="des" placeholder="el Description"
			      >{{ $product->description }}</textarea>

	          @if($errors->has('description'))
	             <p class="text-danger text-uppercase">{{$errors->first('description')}}</p>
	          @endif
		  </div>		


<!-- --------------------------------------------------------------------------------- -->
         <div class="form-group">
            <label for="cat">Category</label>
            <select name="category_id" class="form-control">
            	<option value=''>All Category</option>
         @foreach($category as $cat)
           <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
         @endforeach

            </select>
             @if($errors->has('category_id'))
	             <p class="text-danger text-uppercase">{{$errors->first('category_id')}}</p>
	          @endif
          </div>		
<!-- --------------------------------------------------------------------------------- -->		
		  <div class="form-group">
		    <label for="purchasing_price">Purchasing Price</label>
		    <input type="number" name ='purchasing_price' step="0.01" class="form-control" id="purchasing_price" 
		     value="{{$product->purchasing_price}}" >

          @if($errors->has('purchasing_price'))
             <p class="text-danger text-uppercase">{{$errors->first('purchasing_price')}}</p>
          @endif
		  </div>
<!-- --------------------------------------------------------------------------------- -->		

		  <div class="form-group">
		    <label for="sale_price">Sale Price</label>
		    <input type="number" name ='sale_price' step="0.01" class="form-control" id="sale_price" 
		     value="{{$product->sale_price}}" >

          @if($errors->has('sale_price'))
             <p class="text-danger text-uppercase">{{$errors->first('sale_price')}}</p>
          @endif
		  </div>
<!-- --------------------------------------------------------------------------------- -->		
		  <div class="form-group">
		    <label for="quantity">Quantity</label>
		    <input type="number" name ='quantity' class="form-control" id="quantity" 
		     value="{{$product->quantity}}" >

          @if($errors->has('quantity'))
             <p class="text-danger text-uppercase">{{$errors->first('quantity')}}</p>
          @endif
		  </div>
<!-- --------------------------------------------------------------------------------- -->	

             <div class="form-group">
             	<label>Choose Your Product Image </label><br>
             	<input type="file" name="image">

             </div>	
<!-- --------------------------------------------------------------------------------- -->	
<!-- --------------------------------------------------------------------------------- -->	

          <div class="form-group">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-create"></i> Create</button>
		  </div>
    </form>
   </div>
@endsection