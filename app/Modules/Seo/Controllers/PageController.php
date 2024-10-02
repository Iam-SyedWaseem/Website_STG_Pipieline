<?php
namespace app\Modules\Seo\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    private $jsonFilePath;

    public function __construct()
    {
        $this->jsonFilePath = storage_path('app/pages.json'); // Path to JSON file

        view()->share('seo_menuactive','active');

    }

    private function readJsonData()
    {
        if (file_exists($this->jsonFilePath)) {
            return json_decode(file_get_contents($this->jsonFilePath), true);
        }
        return [];
    }

    private function writeJsonData($data)
    {
        file_put_contents($this->jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function index()
    {
        $data = $this->readJsonData();

        return view('seopages::index', compact('data'));
    }

    public function create()
    {
        return view('seopages::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string|max:200',
            'page_title' => 'required|string|max:200',
            'page_description' => 'required|string|max:500',
            'slug'=>'required|max:50',
        ]);



         // Handle file upload to S3
         if ($request->hasFile('page_image')) {
            $file = $request->file('page_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('seoimages', $fileName, 's3'); // Save file in S3 bucket

            // Generate URL
            $fileUrl = Storage::disk('s3')->url($filePath); // Generate a URL for the file
        } else {
            $fileUrl = null;
        }

         // Prepare data to be saved
         $newPage = [
            'id' => $this->generateNewId(),
            'page_name' => $request->input('page_name'),
            'page_title' => $request->input('page_title'),
            'page_description' => $request->input('page_description'),
            'page_keyword' => $request->input('page_keyword'),
            'slug' =>$request->input('slug'),
            'page_image' => $fileUrl,
            'image_height' => $request->input('image_height'),
            'image_width' => $request->input('image_width'),
        ];

        // Read existing data from JSON file
        $data = $this->readJsonData();

        // Append new data
        $data[] = $newPage;

        // Save data to JSON file
        $this->writeJsonData($data);

        return redirect()->route('pages.index')->with('success', 'Page created successfully');
    }

    private function generateNewId()
    {
        $data = $this->readJsonData();
        $lastId = !empty($data) ? max(array_column($data, 'id')) : 0;
        return $lastId + 1;
    }
    public function show($id)
    {
        $pages = $this->readJsonData();
        $page = collect($pages)->firstWhere('id', $id);

        if (!$page) {
            abort(404, 'Page not found');
        }

        return view('seopages::show', compact('page'));
    }

    public function edit($id)
    {
        $pages = $this->readJsonData();
        $page = collect($pages)->firstWhere('id', $id);

        if (!$page) {
            abort(404, 'Page not found');
        }

        return view('seopages::edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'page_name' => 'required|string|max:200',
            'page_title' => 'required|string|max:200',
            'page_description' => 'required|string|max:500',
            'slug' => 'required|max:50',
        ]);

        $data = $this->readJsonData();
        $pageIndex = array_search($id, array_column($data, 'id'));

        if ($pageIndex === false) {
            return redirect()->route('pages.index')->with('error', 'Page not found');
        }


         // Handle file upload to S3 if a new file is provided
         $fileUrl = $data[$pageIndex]['page_image']; // Keep the old URL if no new image is uploaded
         if ($request->hasFile('page_image')) {
             // Delete old file from S3 if it exists
             if ($fileUrl) {
                 $oldFilePath = parse_url($fileUrl, PHP_URL_PATH);
                 Storage::disk('s3')->delete($oldFilePath);
             }

             // Upload new file to S3
             $file = $request->file('page_image');
             $fileName = time() . '.' . $file->getClientOriginalExtension();
             $filePath = $file->storeAs('seoimages', $fileName, 's3');

             // Generate new URL
             $fileUrl = Storage::disk('s3')->url($filePath);
         }

         // Update page data
         $data[$pageIndex] = [
             'id' => $id,
             'page_name' => $request->input('page_name'),
             'page_title' => $request->input('page_title'),
             'page_description' => $request->input('page_description'),
             'page_keyword' => $request->input('page_keyword'),
             'slug'=>$request->input('slug'),
             'page_image' => $fileUrl,
             'image_height' => $request->input('image_height'),
             'image_width' => $request->input('image_width'),
         ];

         // Save updated data to JSON file
         $this->writeJsonData($data);


        return redirect()->route('pages.index')->with('success', 'Page updated successfully');
    }

    public function destroy($id)
    {
        $pages = $this->readJsonData();
        $pages = array_filter($pages, fn($page) => $page['id'] != $id);

        $this->writeJsonData(array_values($pages));

        return redirect()->route('pages.index')->with('success', 'Page deleted successfully');
    }
}
