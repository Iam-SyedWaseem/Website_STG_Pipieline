<?php

namespace app\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\ContactUs\Models\ContactUs;
use App\Modules\ContactUs\Models\Enquiry;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        view()->share('enquiry_menuactive','active');
    }

    public function index()
    {
        return view('admin::login');
    }

    public function loginpost(Request $request)
    {
       
        $credentials = $request->only('email', 'password');

        // Validate the user
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
          
            // Authentication successful
            return redirect()->route('dashboard'); // Redirect to intended URL or default
        }

        // Authentication failed
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.index');
    }

    public function contacts(Request $request)
    {
       // $data = ContactUs::paginate(10);

        $query = Enquiry::query();

        // Apply search filter
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('message', 'like', "%{$search}%")
                      ->orWhere('phone_no', 'like', "%{$search}%")
                      ->orWhere('website', 'like', "%{$search}%");
            });
        }

        // Apply sorting
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Paginate results
        $data = $query->paginate(10);

        return view('admin::enquiry', compact('data'));

    //    return view('admin::enquiry',compact('data'));


    }

    
}
