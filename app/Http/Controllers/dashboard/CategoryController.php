<?php

namespace App\Http\Controllers\dashboard;


use App\User;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class CategoryController extends Controller
{
  

public function __construct(){

  $this->middleware('permission:read_cat')->only('index');
  $this->middleware('permission:create_cat')->only('create');
  $this->middleware('permission:update_cat')->only('edit');
  $this->middleware('permission:delete_cat')->only('destroy');

}



    public function index()
    {

        //$category = Category::paginate(5);

         $category = Category::when(request()->search,function($query){
           
           return $query->where('name','like',"%" . request()->search . "%");


        })->latest()->paginate(5);



        return view('dashboard.category.index',compact('category'));

    

        

          

    }

//==============================================================================================



    public function create()
    {
        return view('dashboard.category.create');
    }

//==============================================================================================


    public function store(Request $request)
    {
        
       $validate = $request->validate(['name' => 'required|unique:categories']);


       Category::create($validate);

       session()->flash('success','Success To Add New Category');

       return redirect(route('category.index'));


    }

//==============================================================================================


 //==============================================================================================


    public function edit(Category $category)
    {
         return view('dashboard.category.edit',compact('category'));

    }

    public function update(Request $request, Category $category)
    {
         
         $validate = $request->validate(['name' => 'required:unique:categories']);

        // $category->update(['name' => $request->name]);

         $category->name = $request->name;
         $category->save();

         session()->flash('success','Success To update Category ');

        return redirect(route('category.index'));



    }
//==============================================================================================



    public function destroy(Category $category)
    {
        
 
        $name = $category['name'];
   
        $category->delete();

        session()->flash('success','Success To Delete Category '.$name);

        return redirect(route('category.index'));


    }
}
