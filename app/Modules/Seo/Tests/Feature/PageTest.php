<?php

namespace App\Modules\ContactUs\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Support\Facades\Log;
use App\Modules\ContactUs\Models\Enquiry;
use App\Modules\ContactUs\Notifications\EnquiryNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use ReflectionClass;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class PageTest extends TestCase
{
   
  public function setUp(): void
  {
      parent::setUp();

      // Set up storage disk configuration for testing
      Storage::fake('s3');
        // Create a test user and authenticate them
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
        $this->jsonFilePath = storage_path('app/pages.json'); // Path to JSON file

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

  #[Test]
  public function it_can_store_a_page_data()
  { 
 
  // Define your page data
  $data = [
      'page_title' => 'Sample Page Title',
      'page_description' => 'Sample Description',
      'page_keyword' => 'keyword1, keyword2',
      'slug' => 'sample-page',
      'page_image' => UploadedFile::fake()->image('page-image.jpg'),
      'image_height' => 600,
      'image_width' => 800,
  ];

  // Perform the POST request
  $response = $this->withoutMiddleware()->post(route('pages.store'), $data);

  // Assert the redirect response
  $response->assertRedirect(route('pages.index'));

  // Assert the session success message
  $response->assertSessionHas('success', 'Page created successfully');

  }
  
  #[Test]
  public function it_can_update_page()
  {
     // Arrange: Set up initial data
     $pageId = 1;
     $initialPageData = [
         'id' => $pageId,
         'page_title' => 'Old Title',
         'page_description' => 'Old Description',
         'page_keyword' => 'old,keywords',
         'slug' => 'old-slug',
         'page_image' => 'http://example.com/old-image.jpg',
         'image_height' => 500,
         'image_width' => 600,
     ];
 
     $updatedPageData = [
         'page_title' => 'Updated Title',
         'page_description' => 'Updated Description',
         'page_keyword' => 'new,keywords',
         'slug' => 'updated-slug',
         'page_image' => UploadedFile::fake()->image('new-image.jpg'),
         'image_height' => 700,
         'image_width' => 800,
     ];
 
     $this->writeJsonData([$initialPageData]);
 
     // Act: Perform a PUT request to update the page
     $response = $this->withoutMiddleware()->put(route('pages.update', $pageId), $updatedPageData);
 
     // Assert: Check the redirect response
     $response->assertRedirect(route('pages.index'));
 
     // Assert: Check the session success message
     $response->assertSessionHas('success', 'Page updated successfully');
 
     // Assert: Check the updated page data in JSON
     $data = $this->readJsonData();
     $updatedPage = collect($data)->firstWhere('id', $pageId);
 
     $this->assertEquals($updatedPageData['page_title'], $updatedPage['page_title']);
     $this->assertEquals($updatedPageData['page_description'], $updatedPage['page_description']);
     $this->assertEquals($updatedPageData['page_keyword'], $updatedPage['page_keyword']);
     $this->assertEquals($updatedPageData['slug'], $updatedPage['slug']);
     $this->assertEquals($updatedPageData['image_height'], $updatedPage['image_height']);
     $this->assertEquals($updatedPageData['image_width'], $updatedPage['image_width']);        
 
  }

  #[Test] 
  public function it_can_destroy_page()
  {
    // Arrange: Set up initial data
    $pageId = 1;
    $pageData = [
        [
            'id' => $pageId,
            'page_title' => 'Sample Page Title',
            'page_description' => 'Sample Page Description',
            'page_keyword' => 'keyword1, keyword2',
            'slug' => 'sample-page',
            'page_image' => 'http://example.com/image.jpg',
            'image_height' => 600,
            'image_width' => 800,
        ],
        [
            'id' => 2,
            'page_title' => 'Another Page',
            'page_description' => 'Another Description',
            'page_keyword' => 'keyword3',
            'slug' => 'another-page',
            'page_image' => 'http://example.com/another-image.jpg',
            'image_height' => 700,
            'image_width' => 900,
        ]
    ];

    $this->writeJsonData($pageData);

    // Act: Perform a DELETE request to delete the page
    $response = $this->withoutMiddleware()->delete(route('pages.destroy', $pageId));

    // Assert: Check the redirect response
    $response->assertRedirect(route('pages.index'));

    // Assert: Check the session success message
    $response->assertSessionHas('success', 'Page deleted successfully');

    // Assert: Verify the page is deleted from JSON data
    $data = $this->readJsonData();
    $deletedPage = collect($data)->firstWhere('id', $pageId);
    $this->assertNull($deletedPage);
  }
}