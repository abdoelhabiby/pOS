<?php

namespace App\Http\Controllers\dashboard;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;




class ClientController extends Controller
{

  
  public function __construct(){

      $this->middleware('permission:create_cli')->only('create');
      $this->middleware('permission:read_cli')->only('index');
      $this->middleware('permission:update_cli')->only('edit');
      $this->middleware('permission:delete_cli')->only('destroy');


  }



 //===========================================================================================
    
    public function index()
    {
        
        $client = Client::when(request()->search,function($query){

            return $query->where('name','like',"%".request()->search . "%")
                         ->orWhere('address',"like","%" . request()->search . "%")
                         ->orWhere('phone',"like","%" . request()->search . "%");

        })->latest()->paginate(5);



       return view('dashboard.client.index',compact('client'));

      




    }

 //===========================================================================================

    public function create()
    {
         
         return view('dashboard.client.create');


    }

 //===========================================================================================


    public function store(Request $request)
    {
        
      $validate  = $request->validate([
           
           'name' => 'required|min:3',
           'phone' => 'required',
           'address' => 'required',

        ]);


      if($request->phone2 == true){

        $validate['phone'] = $request->phone . " | " . $request->phone2;
      }

       $cli =  Client::create($validate);


      session()->flash('success',"success To Create New Client");
      
      return redirect(route('client.index'));

    }


 //===========================================================================================

    // public function show(Client $client)
    // {
    //     //
    // }



 //===========================================================================================

    public function edit(Client $client)
    {
        
        return view('dashboard.client.edit',compact('client'));

    }



 //===========================================================================================

    public function update(Request $request, Client $client)
    {
        
           
         $validate  = $request->validate([
           
           'name' => 'required|min:3',
           'phone' => 'required',
           'address' => 'required',

        ]);


      if($request->phone2 == true){

        $validate['phone'] = $request->phone . " | " . $request->phone2;
      }

       $client->update($validate);


      session()->flash('success',"success To Update Client");
      
      return redirect(route('client.index'));


     


    }


 //===========================================================================================

    public function destroy(Client $client)
    {
          
          $client->delete();
    

        session()->flash('success',"success To Delete Client");
        
        return redirect(route('client.index'));




    }
}
