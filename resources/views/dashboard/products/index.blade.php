@extends('layouts.dashboard.app')


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

  
  <div class="head row">

    <div class="col-md-3">
      <h2>Products</h2><span> Count: {{$products == null ? 0 : $products->count()}}</span>
    </div>


  <div class="to-from col-md-9 text-center">
          


       {!! Form::open(['url' => 'dashboard/products','method' => 'get']) !!}
             <div class="row">

                 <div class="form-group  col-md-5 row"> 

                      <select name="category_id" class="form-control">
                        <option value="">All Category</option>
                        @foreach($category as $cat)
                             
                             <option value="{!! $cat->id !!}" {{ $cat->id == request()->category_id ? 'selected' : ''}}>{!! $cat->name !!}</option>
            
                        @endforeach
                      </select>
              </div>


              <div class="col-md-7 row">
                 <div class="col-md-8">   
                 <input type="search" class="form-control border-0 small d-block" placeholder="Search For" aria-label="Search" aria-describedby="basic-addon2" name="search" value="{{request()->search}}">
                 </div>
                 <div class="col-md-4">

                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-search"> </i> Search
                    </button>
                 </div>

              </div>


               </div>
           {!! Form::close() !!}
          




          


          
   </div>



  </div>


<!-- --------------------------------------------------------------- -->

@if(auth()->user()->hasPermissionTo('create_pro'))
        <div class="float-right mt-4">
            
              <a href="products/create" class="btn btn-primary">
               <i class="fa fa-plus"> </i> Create New Products
              </a>
            
        </div>
        <div class="clearfix"></div>

@endif






<!-- --------------------------------------------------------------- -->






  
  <div class="the_table mt-4">
     
     @if($products->count() > 0)
         
        <table class="table text-center" style="background: #FFF">
          <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Description</th>
               <th>Purchasing Price</th>
               <th>Sale Price</th>
               <th>Profit</th>
               <th>Quantity</th>
               <th>BelongsTo</th>
           @if(auth()->user()->hasAnyPermission(['update_pro','delete_pro']))
               <th>Action</th>

            @endif   
            </tr>
          </thead>

          <tbody>
   @foreach($products as $product)
       <tr>
         <td>{!! $product->id !!}</td>
         <td>{!! $product->name !!}</td>
         <td>{!! $product->description !!}</td>
         <td>${!! $product->purchasing_price !!}</td>
         <td>${!! $product->sale_price !!}</td>
         <td>{!! round($product->profit_ratio,2) ." %" !!}</td>
         <td>{!! $product->quantity !!}</td>
         <td>{!! $product->category->name !!}</td>
         <td>
           @if(auth()->user()->hasPermissionTo('update_pro'))
              <a href="products/{{$product->id}}/edit" class="btn btn-info">
              Edit <i class="fa fa-edit"></i>
              </a>
 
           @endif

          @if(auth()->user()->hasPermissionTo('delete_pro'))

             <form method="post" action="products/{{$product->id}}" style="display: inline;">
              @csrf
                @method('delete')

                <button type="submit" class="btn btn-danger confirm">Delete </button>
                  </form>

 
           @endif


         </td>

 
       </tr>



<!-- --------------------------------to model delete ---------------------- -->





<!-- --------------------------------to model delete ---------------------- -->




   @endforeach         

          </tbody>



        </table>


          
          <div class="tolinks d-flex justify-content-center" style="margin-top: 70px">
             {{$products->appends(request()->query())->links()}}
          </div>

@else   

     <h4 class="text-center" style="margin-top: 100px;"> Sorry No found Any Recorde !!</h4>

@endif


  </div>




</div>

@endsection


