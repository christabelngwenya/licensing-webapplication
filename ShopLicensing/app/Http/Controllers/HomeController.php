<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Licenses;
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
        return view('RegistrationPage');
    }

        

        public function indexpage(Request $request)
        {
            // Fetch all users
            $users = User::all();
    
            // Fetch all customers
            $customers = Customer::all();
    
            // Fetch all licenses
            $licenses = Licenses::all();
    
            return view('ShopLicensingHomePage', compact('users', 'customers', 'licenses'));
        }
    public function AdminDashboard()
    {
        $users = User::all(); 
        $customers = Customer::all(); // Fetch all customers from the database
        // Pass the data to the view
        return view('AdminManagement', ['users' => $users]);
        
     

    }

  
    public function edit(User $user){
        return view ('Edit',['users'=>$user]);

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
    

         // Function to search customers
    public function searchCustomer(Request $request)
    {
        $query = $request->input('query');
        $customers = Customer::where('account_number', 'like', "%$query%")
            ->orWhere('tin_number', 'like', "%$query%")
            ->get();
        return response()->json($customers);
    }

    // Function to search licenses
    public function searchLicense(Request $request)
    {
        $query = $request->input('query');
        $licenses = Licenses::where('account_number', 'like', "%$query%")
            ->orWhere('year', 'like', "%$query%")
            ->get();
        return response()->json($licenses);
    }

    public function checkOutstandingPayments(Request $request)
{
    $accountNumber = $request->input('account_number');
    $currentYear = now()->year;

    // Check for outstanding payments
    $lastPayment = Licenses::where('account_number', $accountNumber)
                    ->orderBy('expiring_date', 'desc')
                    ->first();

    if ($lastPayment && $lastPayment->year == $currentYear) {
        return response()->json([
            'status' => 'paid',
            'last_payment_year' => $lastPayment->year,
        ]);
    } elseif ($lastPayment) {
        return response()->json([
            'status' => 'outstanding',
            'last_payment_year' => $lastPayment->year,
        
        ]);
    } else {
        return response()->json([
            'status' => 'not_found',
        ]);
    }
}

}




