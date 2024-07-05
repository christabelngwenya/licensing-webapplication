<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Homepage()
    {
        return view('home');
    }
   
        public function indexpage(Request $request)
        {
            $data = $request->only([
                'account_number',
                'tin_number',
                'class_type_goods',
                'vending_details',
                'floor_area',
                'range_number',
                'address_premises',
                'license_name',
                'trading_as',
                'owner_name'
            ]);
        
            return view('index', compact('data'));
        }
        


    public function AdminDashboard()
    {
        $users = User::all(); 
        $customers = Customer::all(); // Fetch all customers from the database
        // Pass the data to the view
        return view('AdminDashboard', ['users' => $users]);
        
     

    }

    public function RetailOption(){
        return view('RetailHomePageOption');
    }
    public function WholesaleOption(){
        return view('WholesaleHomePageOption');
    }


    public function edit(User $user){
        return view ('Edit',['users'=>$user]);

    }
  

   //public function update(User $user, Request $request)
    //{
       // $data = $request->validate([
         //  'name' => 'required',
          //  'email' => 'required|email',
          // 'password' => 'required|min:8',  //  minimum length for passwords
         //  'is_admin' => 'required|boolean',
     //]);
    
         //Hashing the password
      //  $data['password'] = Hash::make($data['password']);
    
    //    Update the user record
     //   $user->update($data);
    
     //   return redirect(route('AdminDashboard'))->with('success','User updated successfully');
   // }//
    public function destroy(User $user)
{
    //$user->delete();
    //return response()->json(['message' => 'User deleted successfully.']);
}

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'is_admin' => 'required|boolean'
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'is_admin' => $request->is_admin,
            ]);
    
            return redirect()->back()->with('success', 'User added successfully');
        }
    
        // Update existing user
        public function update(Request $request, $user)
        {
            $user = User::findOrFail($user);
    
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user,
                'password' => 'nullable|string|min:8',
                'is_admin' => 'required|boolean'
            ]);
    
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
                'is_admin' => $request->is_admin,
            ]);
    
            return redirect()->back()->with('success', 'User updated successfully');
        }
    
}



