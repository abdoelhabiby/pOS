<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Storage;



class UserController extends Controller
{
//-------------------------------------------------------------------------------------------------------------


  public function __construct(){

    $this->middleware('permission:read')->only('index');
    $this->middleware('permission:create')->only('create');
    $this->middleware('permission:update')->only('edit');
    $this->middleware('permission:delete')->only('destroy');


  }



    public function index()
    {

 
      

  $users = User::where('id',"!=",'1')->when(request()->search,function($q){
         
         return $q->where('name','like',"%" . request()->search ."%");


  })->latest()->paginate(5);


 // return $users;



       return view('dashboard.users.index',compact('users'));

    }
//-------------------------------------------------------------------------------------------------------------



    public function create()
    {
        return view('dashboard.users.create');
    }
//-------------------------------------------------------------------------------------------------------------


    public function store(Request $request)
    {

         $validate = request()->validate([

            'name'             => 'required|min:3',
            'email'            => 'required|unique:users',
            'password'         => 'required',
            'confirm_password' => 'required|same:password',
            'image'            => 'image',
         ]);

         $validate = request()->except(['_token','confirm_password','permissions','image']);

         $validate['password'] = bcrypt(request()->password);

         
        $file = request()->file('image');

        $temp = time() * 2.1;
        $micr = microtime(true * 20);
        $img_name = $file->getClientOriginalName();
      
        $path = $temp . "/" .$micr  ."_" .$img_name;


                
         $validate['image'] = $file->storeAs("public/testImages",$path);



          //return $validate;

         $permissions =  request('permissions');
          
         $user = User::create($validate);

         $user->syncPermissions($permissions);

         $newsname1 = str_replace($temp,$user['id'], $validate['image']); 

         Storage::rename($validate['image'],$newsname1);

         Storage::deleteDirectory('public/testImages/'.$temp);

         $linkdata = str_replace('public', 'storage', $newsname1);
         

         User::where('id',$user['id'])->update(['image' => $linkdata]);


           session()->flash('success','Success To Add New User');

          return redirect(route('users.index'));


   


    




          
        //      echo $del . "<br>";
        //      return $newsname1;

 
  
   // echo "<img src=". asset('storage/images/29/1575712485.8146_logo2.png') .">";




    }
//-------------------------------------------------------------------------------------------------------------



    public function show(User $user)
    {

    }
//-------------------------------------------------------------------------------------------------------------



    public function edit(User $user)
    {
        

        return view('dashboard.users.edit',compact('user'));
    }
//-------------------------------------------------------------------------------------------------------------



    public function update(Request $request, User $user)
    {

        $validate = request()->validate([

            'name' => 'required|min:3',
            'email'    => 'required',
         ]);

         $validate = request()->except(['_token','permissions','image']);


          $permissions =  request('permissions');
          
          $user->update($validate);

          $user->syncPermissions($permissions);

           session()->flash('success','Success To Update User');

           return redirect(route('users.index'));
    }

//-------------------------------------------------------------------------------------------------------------


    public function destroy($id)
    {
        $find = User::findOrfail($id);

       Storage::deleteDirectory('public/testImages/'.$find['id']);


        $find->delete();
        
          session()->flash('success','Success To Delete User');

          return redirect(route('users.index')); 

             }


}
