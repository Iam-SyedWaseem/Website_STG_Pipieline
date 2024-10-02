<?php

namespace app\Modules\ContactUs\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Modules\ContactUs\Models\ContactUs;
use App\Modules\ContactUs\Models\Enquiry;

use App\Modules\ContactUs\Notifications\EnquiryNotification;
use Illuminate\Support\Facades\Notification;
use App\Helpers\Utils;

class ContactUsController extends Controller
{
    private $jsonFilePath;

    public function __construct()
    {
        $this->jsonFilePath = storage_path('app/pages.json'); // Path to JSON file
    }

    private function getMetadata()
    {
        if (file_exists($this->jsonFilePath)) {
            return json_decode(file_get_contents($this->jsonFilePath), true);
        }
        return [];
    }
    public function contactUs()
    {

       $metadata = $this->getMetadata();

        // Find the metadata for the given slug
        $pageMetadata = collect($metadata)->firstWhere('slug', 'contact-us');

        // Default values if the slug is not found
        $default_img = asset('assest/images/logo.png');
        $pageMetadata = $pageMetadata ?: [
            'page_title' => 'Contact Us',
            'page_description' => 'Contact Us',
            'page_keyword' => 'Crystawall,Contact Us',
            'page_image' => $default_img,
            'image_height' => '56',
            'image_width' => '56'
        ];
        $countries = Utils::getCountryCodes();

        return view('contactus::contact-us',compact('countries'), [
            'title' => $pageMetadata['page_title'],
            'description' => $pageMetadata['page_description'],
            'keywords' => $pageMetadata['page_keyword'],
            'image' => $pageMetadata['page_image'],
            'imageHeight' => $pageMetadata['image_height'],
            'imageWidth' => $pageMetadata['image_width']
        ]);
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:40',
            'email' => 'required|email|max:255|regex:/^[\w\.-]+@[\w\.-]+\.\w+$/',
            'country_code' => 'required|string|max:20',
            'phone_no' => 'required|string|min:7|max:20',
             'website' => ['nullable', 'regex:/^((https?:\/\/)?([a-z0-9]+\.)?[a-z0-9]+\.[a-z]{2,})(\/.*)?$/i'],
            'message' => 'required|string|max:1000',
        ]);


       $contact =  Enquiry::create([
            'name'=>preg_replace('/[^a-zA-Z0-9\s]/', ' ', $request->name),
            'email'=>$request->email,
            'ip_address'=>$request->ip(),
            'phone_no'=>$request->country_code.'-'.$request->phone_no,
            'message'=>preg_replace('/[^a-zA-Z0-9\s]/', ' ', $request->message),
            'website'=>preg_replace('/[^a-zA-Z0-9\-._~:\/?#\[\]@!$&\'()*+,;=]/', ' ', $request->website),
        ]);
        //dd($contact);
        $adminEmail = "tuan.k@crystawall.com";
        Notification::route('mail', $adminEmail)->notify(new EnquiryNotification($contact));

        return response()->json(['success' => 'Your Enquiry Submitted Successfully']);
       // return redirect()->back()->with('success','Your Enquiry Submitted Successfully');


    }
}
