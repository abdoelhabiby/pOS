<?php

namespace App\Http\Controllers\dashboard\Client;

use App\Http\Controllers\Controller;
use App\Order;
use App\Category;
use App\products;
use App\productOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{


public function __construct(){

    $this->middleware("permission:read_ord")->only('index');
    $this->middleware("permission:create_ord")->only(['store','create']);
    $this->middleware("permission:update_ord")->only('edit');
    $this->middleware("permission:delete_ord")->only('destroy');


}


//============================================================================================


    public function index()
    {



   return "test";


    }


//============================================================================================

    public function create()
    {
          

        $validate = request()->validate([

          'client_id' => 'required|integer',

        ]); 

        $category = Category::with('products')->get();

        $clientId = request()->client_id;

         $order = Order::where("client_id",$clientId)->with("product")->get();

        return view('dashboard.client.order.create',compact('category','clientId','order'));


    }



//============================================================================================



    public function store(Request $request)
    {
         
 

       $validate = request()->validate([
               
               'client_id' => 'required|integer',
               'products_id' => 'required|array',
               'quantity' => 'required|array',

        ]);
  





      $order = Order::create(['client_id' => $validate['client_id']]);


   $latsTotal = 0;


        foreach($validate['products_id'] as $key => $productId){

            $product = products::findOrFail($productId);

            $salePrice = $product->sale_price;

            $QProduct = $validate['quantity'][$key];

            $TotalPrice = $QProduct  * $salePrice;


           productOrder::create([

            'order_id' => $order->id,
            'products_id' => $productId,
            'quantity' => $QProduct

               ]); 
              

              $minusQuantity = ($product->quantity - $QProduct);

              $product->update(['quantity' => $minusQuantity]); 

               $latsTotal += $TotalPrice ;

        }


        $order->update(['TotalPrice' => $latsTotal ]);

        session()->flash('success',"Success To Make Order");

        return redirect(route('client.index'));

    }



//============================================================================================


 


//============================================================================================


    public function edit(Order $order)
    {

      $category = Category::with('products')->get();
    

      $productOrder =$order->product; 

       return view('dashboard.client.order.edit',compact(['category','productOrder','order']));


    }


//============================================================================================


    public function update(Request $request, Order $order)
    {

           $validate = request()->validate([
                         
                         'products_id' => 'required|array',
                         'quantity' => 'required|array',

                  ]);
            



      $client_id = $order->client_id;



     foreach($order->product as $products){
          
          $products->update([
              
              'quantity' => $products->quantity + $products->pivot->quantity
          ]);


       }

      $order->delete();


      $order2 = Order::create(['client_id' => $client_id]);


          $latsTotal = 0;


        foreach($validate['products_id'] as $key => $productId){

            $product = products::findOrFail($productId);

            $salePrice = $product->sale_price;

            $QProduct = $validate['quantity'][$key];

            $TotalPrice = $QProduct  * $salePrice;


           productOrder::create([

            'order_id' => $order2->id,
            'products_id' => $productId,
            'quantity' => $QProduct

               ]); 
              

              $minusQuantity = ($product->quantity - $QProduct);

              $product->update(['quantity' => $minusQuantity]); 

               $latsTotal += $TotalPrice ;

        }


        $order2->update(['TotalPrice' => $latsTotal ]);

        session()->flash('success',"Success To edit Order");

        return redirect(route('orders.index'));





//=========================================================================



     





    }


//============================================================================================


    public function destroy(Order $order)
    {
        //
    }
}
