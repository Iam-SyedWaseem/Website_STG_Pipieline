<?php

namespace app\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\ContactUs\Models\ContactUs;
use App\Modules\ContactUs\Models\Enquiry;
use App\Modules\Career\Models\JobPost;
use App\Modules\Career\Models\JobApplication;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(){

    view()->share('dashboard_menuactive','active');
    }
    public function index()
    {
        $enquiry_count  = Enquiry::count();
        $job_count    = JobPost::count();
        $application_count = JobApplication::count();

        return view('admin::dashboard',compact('enquiry_count','job_count','application_count'));
    }

   
   
    
}
