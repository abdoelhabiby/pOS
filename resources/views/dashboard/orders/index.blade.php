@extends('layouts.dashboard.app')

@section('style')

<style type="text/css">



.card-he2{
    padding-left:2px; 
  padding-right:0px; 
}

.card-header{
  padding-top: 1px;
    padding-bottom: 1px;
}


.card-body{
  padding-left:2px; 
  padding-right:2px; 


/*=======loader=============*/


.lds-dual-ring {
  display: inline-block;
  width: 80px;
  height: 80px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 64px;
  height: 64px;
  margin: 8px;
  border-radius: 50%;
  border: 6px solid #333;
  border-color: #333 transparent #333 transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}



/*======end loader=============*/





</style>

@endsection

@section('content')

<div class="row mb-5">
  

    <h2 class="col-md-6">All Order</h2>

    <div class="col-md-6">
                           {!! Form::open(['url' => 'dashboard/orders','method' => 'get']) !!}
                         <div class="row">
                             <div class="form-group  col-md-8"> 
                  <input type="text" class="form-control border-0 small d-block" placeholder="Search For" aria-label="Search" aria-describedby="basic-addon2" name="search" value="{{request()->search}}">
                             </div>
                             <div class="col-md-4">

                                <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-search"> </i> Search
                                </button>
                             </div>
                           </div>
                       {!! Form::close() !!}
    </div>

</div>


      <!-- Content Row -->


<!-- ================================================================================== -->


@if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> {{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>



@endif
         

<!-- =============================================================================== -->
                    
                @if($order->count() > 0) 

                 <div class="row">
                

                    <div class="col-md-7">
                      <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
        
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                        <div id="accordion">
                  
                        <div class="card">

                  


                              <table class="table text-center card-body">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Total Price</th>
                                    <th>Create At</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>

                    @foreach($order as $allorder)          
               
                                  <tr>
                                   
                                        
                                          <td>   
                                                {{$allorder->client['name']}} 
                                               
                                          </td>
                                         
                                        
                                   
                                    <td>{!! number_format($allorder->TotalPrice,2) !!}</td>
                                    <td>
                                       {!! date_format($allorder->created_at,'d M Y') !!}
                                    </td>
                                    <td>


                                      @if(auth()->user()->hasPermissionTo('read_ord'))

                                      <button class="btn btn-info showProducts"  data-url="{{route('order.products',$allorder->id)}}" data-method='get'>
                                        Show 
                                      </button>

                                      @endif
<!-- ======================================================================================== -->
                                      @if(auth()->user()->hasPermissionTo('update_ord'))

                                      <a class="btn btn-info "  href="{{route('order.edit',$allorder->id)}}" data-method='get'>
                                        Edit 
                                      </a>

                                      @endif
<!-- ======================================================================================== -->
                                      @if(auth()->user()->hasPermissionTo('delete_ord'))
                                      
                                      {{ Form::open(['url'=>route('orders.destroy',$allorder->id) ,'class' => 'd-inline']) }}
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger confirm" type="submit">
                                        Delete <i class="fa fa-trash"></i>
                                      </button>

                                      {{ Form::close() }}

                                      @endif


                                    </td>

                                  </tr>
                    @endforeach
             
                                </tbody>
                              </table>

                         
                        </div>     

                        <!-- en of card -->



                     </div>

                        </div>
                      </div>
                    </div>
<!-- =============================================================================== -->
                    <div class="col-md-5">
                        <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Products</h6>
        
                     </div>
                        <!-- Card Body -->
                    <div class="card-body toAppendProduct">

                      <div class="lds-dual-ring d-none"></div>
                      
   
                  

      
                   </div>
                </div>
                    </div>    


       </div> 
               @else
                          
                         <h3 class="text-center" style="margin-bottom: 300px"> Soory Not Found Data</h3>    

                        @endif 


      <div class="tolinks d-flex justify-content-center" style="margin-top: 70px">
             {{$order->appends(request()->query())->links()}}
          </div>

<!-- =============================================================================== -->

       

@endsection