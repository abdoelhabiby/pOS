<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\products;
use App\Category;
use Illuminate\Http\Request;
use Storage;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class productController extends Controller
{


  public function __construct(){

     $this->middleware('permission:read_pro')->only('index');
     $this->middleware('permission:create_pro')->only('create');
     $this->middleware('permission:update_pro')->only('edit');
     $this->middleware('permission:delete_pro')->only('destroy');
  }



//================================================================================================


    public function index()
    {
        
      $products = products::when(request()->search,function($query){

           return $query->where('name','like',"%" .request()->search . "%");

      })->when(request()->category_id,function($query){
          
          return $query->where('category_id',request()->category_id);

      })->latest()->paginate(6);


      $category = Category::all(['id','name']);

        
     return view('dashboard.products.index',compact(['products','category']));


    



    }

//================================================================================================



    public function create()
    {

        $category = Category::all(['id','name']); 

        return view('dashboard.products.create',compact('category'));
    }

//================================================================================================



    public function store(Request $request)
    {
         
         $validate = $request->validate([
           
           'name' => 'required|unique:products',
           'description' => 'required',
           'category_id' => 'required',
           'purchasing_price' => 'required',
           'sale_price' => 'required',
           'quantity' => 'required',
           'image'   =>'image',

         ],[],['category_id' =>'category']);
            
      if(request()->image == true){

        $file = request()->file('image');

        $temp = time() * 2.1;
        $micr = microtime(true * 20);
        $img_name = $file->getClientOriginalName();
      
        $path = $temp . "/" .$micr  ."_" .$img_name;


                
         $validate['image'] = $file->storeAs("public/productImage",$path);

         $profit = ($validate['sale_price']) - ($validate['purchasing_price']);

         $profit_rate = ($profit * 100) /  ($validate['purchasing_price']);

         $validate['profit_ratio'] = $profit_rate ;
          
         $product = products::create($validate);

         $newsname1 = str_replace($temp,$product['id'], $validate['image']); 

         Storage::rename($validate['image'],$newsname1);

         Storage::deleteDirectory('public/productImage/'.$temp);

         $linkdata = str_replace('public', 'storage', $newsname1);
        
         products::where('id',$product['id'])->update(['image' => $linkdata]);

         session()->flash('success','Success To Add New product');

         return redirect(route('products.index'));


            }else{
                  
                  $validate = request()->except(['image','_token']);

                  $profit = ($validate['sale_price']) - ($validate['purchasing_price']);

                  $profit_rate = ($profit * 100) /  ($validate['purchasing_price']);

                  $validate['profit_ratio'] = $profit_rate;

                  products::create($validate);

                  session()->flash('success','Success To Add New product');

                  return redirect(route('products.index'));


            }
          
    }


//================================================================================================


    public function show(products $products)
    {
        //
    }

//================================================================================================


    public function edit($id)
    {
         
         $product = products::with('category')->find($id);
         $category = Category::all(['id','name']); 

         return view('dashboard.products.edit',compact(['product','category']));
    }

//================================================================================================



    public function update(Request $request, products $product)
    {

          
           



                 $validate = $request->validate([
                   
                   'name' => 'required:unique:products',
                   'description' => 'required',
                   'category_id' => 'required',
                   'purchasing_price' => 'required',
                   'sale_price' => 'required',
                   'quantity' => 'required',
                   'image'   =>'image',

                 ],[],['category_id' =>'category']);

                  $validate = request()->except(['image','_token']);

                  $profit = ($validate['sale_price']) - ($validate['purchasing_price']);

                  $profit_rate = ($profit * 100) /  ($validate['purchasing_price']);

                  $validate['profit_ratio'] = $profit_rate;


                  $product->update($validate);

                  session()->flash('success','Success To Update product');

                  return redirect(route('products.index')); 


    }

  
  //================================================================================================


    public function destroy($id)
    {
        $product = products::find($id);

          if($product['image'] === 'default.png'){

                  $product->delete();
                  session()->flash('success','Success To Delete product');
                  return redirect(route('products.index'));


          }else{

                 Storage::deleteDirectory('public/productImage/'.$product['id']);
                 $product->delete();
                 session()->flash('success','Success To Delete product');
                 return redirect(route('products.index'));

          }


     }

} //end of class
