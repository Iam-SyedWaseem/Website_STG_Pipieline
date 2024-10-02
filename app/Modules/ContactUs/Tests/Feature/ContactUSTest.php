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
use Illuminate\Support\Facades\View;

use ReflectionClass;

class ContactUSTest extends TestCase
{
    /**
     * A basic feature test example.
     */
 
     #[Test]
    public function it_submits_an_enquiry_successfully()
    {
       
        // Define valid request data
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone_no' => '1234567890',
            'message' => 'This is a test message.',
            'website' => 'https://example.com'
        ];

      
        // Send a POST request to the contact-submit route without CSRF protection
        $response = $this->withoutMiddleware()->postJson('/contactsubmit', $data);

        // Assert that the response is successful
        $response->assertStatus(200);
        $response->assertJson(['success' => 'Your Enquiry Submitted Successfully']);

    }
  


     #[Test]
    public function it_fails_validation_when_required_fields_are_missing()
    {
        // Define invalid request data
        $data = [
            'name' => '', // Missing name
            'email' => 'invalid-email', // Invalid email format
            'phone_no' => '123456789012345678901', // Phone number too long
            'message' => '', // Empty message
        ];

        // Send a POST request to the contact-submit route
        $response = $this->withoutMiddleware()->postJson(route('contact.contactFormSubmit'), $data);

        // Assert that the response status is 422 Unprocessable Entity
        $response->assertStatus(422);

        // Assert that the response contains validation errors
        $response->assertJsonValidationErrors(['name', 'email', 'phone_no', 'message']);
    }

    #[Test]   
    public function it_loads_the_contact_us_view_from_the_module()
    {
        // Send a GET request to the /contact-us route
        $response = $this->get('/contact-us');

        // Assert that the response status is 200 OK
        $response->assertStatus(200);

       
    }
    #[Test]
    public function it_throws_an_error_when_the_view_does_not_exist()
    {
        // Mock the view to simulate it not existing
        View::shouldReceive('exists')
            ->with('contactus::contact-us')
            ->andReturn(false);

        // Send a GET request to the contact-us route
        $response = $this->get('/contact-us'); // Adjust the URL based on your route definition

        // Assert that the response status is 500 Internal Server Error
        $response->assertStatus(500); // This status code might change based on your error handling

        // Optionally check the content to verify the error message
        $response->assertSee('Error'); // Adjust based on your actual error handling
    }

    #[Test]
    public function it_throws_a_404_error_when_the_route_does_not_exist()
    {
         // Send a GET request to an incorrect route
         $response = $this->withoutMiddleware()->get('/wrong-contact-us-route');

         if ($response->status() === 302) {
             // Optionally assert where it redirects
             $response->assertRedirect('/'); // Adjust based on expected redirection
         } else {
             $response->assertStatus(404);
         }
    }
    #[Test]
    public function it_fails_if_there_are_rendering_issues_in_the_view()
    {
        // Mock the view to simulate a rendering issue
        View::shouldReceive('exists')
            ->with('contactus::contact-us')
            ->andReturn(true);

        // Force the view to throw an exception
        $this->app->instance('view.finder', new class {
            public function find($view) {
                throw new \Exception('View rendering error');
            }
        });

        // Send a GET request to the contact-us route
        $response = $this->get('/contact-us'); // Adjust the URL based on your route definition

        // Assert that the response status is 500 Internal Server Error
        $response->assertStatus(500); // This status code might change based on your error handling

        // Optionally check the content to verify the error message
        $response->assertSee('Error'); // Adjust based on your actual error handling
    }
}
