<?php

namespace app\Modules\Services\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Utils;


class ServiceController extends Controller
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

    public function services()
    {
       $countries = Utils::getCountryCodes();

        $metadata = $this->getMetadata();

        // Find the metadata for the given slug
        $pageMetadata = collect($metadata)->firstWhere('slug', 'services');

        // Default values if the slug is not found
        $default_img = asset('assest/images/logo.png');
        $pageMetadata = $pageMetadata ?: [
            'page_title' => 'Services',
            'page_description' => 'Services',
            'page_keyword' => 'Crystawall,Services',
            'page_image' => $default_img,
            'image_height' => '56',
            'image_width' => '56'
        ];
        $countries = Utils::getCountryCodes();

        return view('service::services',compact('countries'), [
            'title' => $pageMetadata['page_title'],
            'description' => $pageMetadata['page_description'],
            'keywords' => $pageMetadata['page_keyword'],
            'image' => $pageMetadata['page_image'],
            'imageHeight' => $pageMetadata['image_height'],
            'imageWidth' => $pageMetadata['image_width']
        ]);
    }

    public function androidDevelopment()
    {

        return view('service::android-development');
    }

    public function webDevelopment()
    {
        return view('service::web-development');
    }

    public function uiUxDesign()
    {
        return view('service::ui-ux-design');
    }
}
