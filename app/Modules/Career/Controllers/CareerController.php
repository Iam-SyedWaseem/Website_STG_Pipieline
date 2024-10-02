<?php

namespace app\Modules\Career\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Career\Models\JobApplication;
use App\Modules\Career\Models\JobPost;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Traits\CountryCodeApiTrait;
use App\Helpers\Utils;

class CareerController extends Controller
{
    use CountryCodeApiTrait;

    private $jsonFilePath;

    public function __construct()
    {
            $this->jsonFilePath = storage_path('app/pages.json'); // Path to JSON file
            view()->share('jobapplication_menuactive','active');
    }

    private function getMetadata()
    {
        if (file_exists($this->jsonFilePath)) {
            return json_decode(file_get_contents($this->jsonFilePath), true);
        }
        return [];
    }
    public function careers()
    {
        $metadata = $this->getMetadata();

        // Find the metadata for the given slug
        $pageMetadata = collect($metadata)->firstWhere('slug', 'careers');

        // Default values if the slug is not found
        $default_img = asset('assest/images/logo.png');
        $pageMetadata = $pageMetadata ?: [
            'page_title' => 'Careers',
            'page_description' => 'Careers',
            'page_keyword' => 'Crystawall,Careers',
            'page_image' => $default_img,
            'image_height' => '56',
            'image_width' => '56'
        ];

        $jobOpenings = JobPost::where(['is_active'=>1])->select('title', 'job_type', 'id')->get();

        return view('careers::frontend.career', compact('jobOpenings'), [
            'title' => $pageMetadata['page_title'],
            'description' => $pageMetadata['page_description'],
            'keywords' => $pageMetadata['page_keyword'],
            'image' => $pageMetadata['page_image'],
            'imageHeight' => $pageMetadata['image_height'],
            'imageWidth' => $pageMetadata['image_width']
        ]);

        // return view('careers::frontend.career',compact('jobOpenings'));
    }

    public function lifeatcrystawall()
    {
        $metadata = $this->getMetadata();

        // Find the metadata for the given slug
        $pageMetadata = collect($metadata)->firstWhere('slug', 'life-at-crystawall');

        // Default values if the slug is not found
        $default_img = asset('assest/images/logo.png');
        $pageMetadata = $pageMetadata ?: [
            'page_title' => 'Life at Crystawall',
            'page_description' => 'Life at Crystawall',
            'page_keyword' => 'Crystawall,Life at Crystawall',
            'page_image' => $default_img,
            'image_height' => '56',
            'image_width' => '56'
        ];

        return view('careers::frontend.life_at_crystawall.index', [
            'title' => $pageMetadata['page_title'],
            'description' => $pageMetadata['page_description'],
            'keywords' => $pageMetadata['page_keyword'],
            'image' => $pageMetadata['page_image'],
            'imageHeight' => $pageMetadata['image_height'],
            'imageWidth' => $pageMetadata['image_width']
        ]);
    }
    public function job_details(Request $request)
    {
        $job_id = $request->job_id;
        // $countries = $this->getAllCountries();
        // $countries = Utils::getCountryCodes();

        $jobDetails = JobPost::with(['department'])->where('id', $job_id)->first(); //dd(); countryPhoneCodes
        return view('careers::frontend.job_details.index', compact('jobDetails'));
    }

    public function applysubmitForm(Request $request)
    {

        // Validate the form input
       // $validatedData =
         $request->validate([
            'firstName' => 'required|string|max:40',
            'lastName' => 'required|string|max:40',
            'email' => 'required|email|max:255',
            'countryCode' => 'required|string|max:10',
            'phoneNumber' => 'required|string|min:7|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:4096', // 4MB max file size
            'coverLetter' => 'required|string|max:1000',
        ]);

         // Handle the file upload, if any
         $resumeUrl = 'no_image';//null;
         if ($request->hasFile('resume')) {
            // Store the file in the S3 bucket and get the file URL
            $resumePath = $request->file('resume')->store('resumes', 's3');
            $resumeUrl = Storage::disk('s3')->url($resumePath);
         }

         // Create a new application record (adjust as needed for your application model)
         JobApplication::create([
            'job_id'=>decrypt($request->job_id),
             'first_name' =>  preg_replace('/[^a-zA-Z0-9\s]/', ' ', $request->firstName),
             'last_name' =>  preg_replace('/[^a-zA-Z0-9\s]/', ' ', $request->lastName),
             'email' =>  $request->email,
             'country_code' => $request->countryCode,
             'phone_number' =>  $request->phoneNumber,
             'resume_url' => $resumeUrl,
             'cover' => preg_replace('/[^a-zA-Z0-9\s]/', ' ', $request->coverLetter),
             'status'=>'new'
         ]);


        // Process the form data (e.g., save to the database, send an email, etc.)
        // For demonstration purposes, we'll just return a success message
        return redirect()->back()->with('success', 'Your application has been submitted successfully!')->withFragment('contact_form');

    }

    public function jobApplications(Request $request)
    {


        $query = JobApplication::with('job');//query();

        // Apply search filter
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                ->orwhere('last_name', 'like', "%{$search}%")
                ->orwhere('email', 'like', "%{$search}%")
                ->orwhere('country_code', 'like', "%{$search}%")
                ->orwhere('phone_number', 'like', "%{$search}%")
                ->orwhere('status','like',"%{$search}%")
                     ->orWhereHas('job', function($query) use ($search) {
                            $query->where('title', 'like', "%{$search}%")
                             ->orWhereHas('department', function($query)use ($search){
                                     $query->where('name', 'like', "%{$search}%");
                             });
                     });

                 });
        }

        $data = $query->paginate(10);
        return view('careers::backend.job_applications.index',compact('data'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $application = JobApplication::findOrFail($id);

        // Validate request data if necessary
        $request->validate([
            'status' => 'required|in:new,inprogress,closed',
        ]);

        // Update status
        $application->status = $request->status;
        $application->save();


        // Return updated status
        return response()->json(['status' => $application->status]);
    }
    public function getDetails(Request $request, $id)
    {
        $application = JobApplication::with(['job','job.department'])->where('id',$id)->first();

        if (!$application) {
            return response()->json(['message' => 'Job application not found'], 404);
        }

      //  return $application;


        // Return updated status
        return response()->json($application);
    }

    public function applicationdelete($id)
    {
         // Start a transaction
         DB::beginTransaction();

         try {
            $decryptid= decrypt($id);
             // Find the resume entry by ID
             $application = JobApplication::find($decryptid);

             if (!$application) {
                return back()->with('error', 'Application not found.');
            }

             // Remove the file from S3
             $filePath = $application->resume_url; // Assuming file_path stores the S3 path
             if (Storage::disk('s3')->exists($filePath)) {
                 Storage::disk('s3')->delete($filePath);
             }

             // Delete the resume entry from the database
             $application->delete();

             // Commit the transaction
             DB::commit();

             return back()->with('success', 'Application deleted successfully!');

            // return response()->json(['message' => 'Application deleted successfully.'], 200);
         } catch (\Exception $e) {
             // Rollback the transaction on error
             DB::rollback();
             return back()->with('error', 'Failed to delete Application.');

           //  return response()->json(['message' => 'Failed to delete Application.', 'error' => $e->getMessage()], 500);
         }

    }
}
