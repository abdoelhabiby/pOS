<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\Category;
use App\products;
use App\Client;
use App\Order;

class DashboardController extends Controller
{
    

   public function index(){
     
$orders = Order::select(
      
      \DB::raw("SUM(TotalPrice) as TotalPrice"),
      \DB::raw("COUNT(id) as AllOrders")


      )->whereYear('created_at','2019')->get();






    $order_chart = Order::select(
          
          \DB::raw('YEAR(created_at) as year'),
          \DB::raw('MONTH(created_at) as month'),
          \DB::raw('SUM(TotalPrice) as total_price')

    )->groupBy('MONTH')->whereYear('created_at','2019')->get();

    // return $order_chart;

        $supervisors = User::where("id","!=",1)->count();
        $Category = Category::count();
        $products = products::count();
        $Client = Client::count();
 
   	  return view('dashboard.index',compact(['supervisors','Category','products','Client','order_chart','orders']));

   }






}
