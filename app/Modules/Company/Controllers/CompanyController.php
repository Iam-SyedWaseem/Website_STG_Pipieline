<?php

namespace app\Modules\Company\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Utils;

class CompanyController extends Controller
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

    public function index()
    {

        $metadata = $this->getMetadata();

        // Find the metadata for the given slug
        $pageMetadata = collect($metadata)->firstWhere('slug', 'about-us');

        // Default values if the slug is not found
        $default_img = asset('assest/images/logo.png');
        $pageMetadata = $pageMetadata ?: [
            'page_title' => 'About Us | Crystawall',
            'page_description' => 'About Us | Crystawall',
            'page_keyword' => 'Crystawall,About Us | Crystawall',
            'page_image' => $default_img,
            'image_height' => '56',
            'image_width' => '56'
        ];
        $countries = Utils::getCountryCodes();

        return view('company::company', compact('countries'), [
            'title' => $pageMetadata['page_title'],
            'description' => $pageMetadata['page_description'],
            'keywords' => $pageMetadata['page_keyword'],
            'image' => $pageMetadata['page_image'],
            'imageHeight' => $pageMetadata['image_height'],
            'imageWidth' => $pageMetadata['image_width']
        ]);
    }
}
