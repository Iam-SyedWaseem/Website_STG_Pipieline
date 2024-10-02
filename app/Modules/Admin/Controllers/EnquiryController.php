<?php
namespace app\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\ContactUs\Models\ContactUs;
use App\Modules\Admin\Models\Reply;
use App\Modules\ContactUs\Models\Enquiry;

use Illuminate\Support\Facades\Auth;
use App\Modules\Admin\Notifications\ReplyNotification;
use App\Modules\ContactUs\Notifications\EnquiryNotification;

class EnquiryController extends Controller
{

    public function __construct(){
        view()->share('enquiry_menuactive','active');
    }

public function show($id,Request $request)
{
    
    $data = Enquiry::find($id);

    $action = $request->action;

    return view('admin::reply',compact('data','action'));

}

public function reply(Request $request, $id)
{
    // Handle form submission (validation, processing, etc.)
    $data = $request->validate([
        'response' => 'required|string',
    ]);

    $contactdetails = Enquiry::find($id);

    $data = [
        'name'=>$contactdetails->name,
        'email'=>$contactdetails->email,
        'response'=>$request->response
    ];

   // $replyNotification = new ReplyNotification($data);

   $contactdetails->notify(new ReplyNotification($data));

   Enquiry::where('id',$id)->update([
        'status'=>'replied',
        'response'=>$request->response,
        'response_by' => Auth::user()->id,
   ]);

//    $replied =  Reply::create([
//         'user_id' => Auth::user()->id,
//         'contact_id'=>$id,
//         'response'=>$request->response,
//         'email_id'=>$contactdetails->email,
//     ]);



    // Process the reply (save to database, etc.)
    // For now, just redirect back to the same page
    return redirect()->route('contacts');
}
}
?>