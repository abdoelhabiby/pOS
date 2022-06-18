<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{


public function __construct(){

  return $this->middleware("permission:read_ord")->only(['index','products']);
  return $this->middleware("permission:delete_ord")->only('destroy');



}




    public function index()
    {
              

       $order = Order::with('Client')->whereHas('client',function($q){

            return $q->where('name',"like","%". request()->search . "%");

        })->paginate(5);

       return view('dashboard.orders.index',compact("order"));

        // return $order->client;  

     }

 //======================================================================================


    public function products($id){

    

       $order = Order::findOrFail($id);
       $totalPrice = $order->TotalPrice;

       $products =  $order->product;



      return view('dashboard.orders._products',compact('products','totalPrice'));

 





    }





//=====================================================================================



//=====================================================================================
    public function destroy(Order $order)
    {


       $products = $order->product;

           foreach($products as $product){

            $product->update([
              
              'quantity' => $product->quantity + $product->pivot->quantity

            ]);

 
           }

          $order->delete();

         session()->flash('success',"Success To Delete Order");

         return redirect(route('orders.index'));
    }
}
