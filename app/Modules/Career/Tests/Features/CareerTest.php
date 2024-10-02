<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Modules\Career\Models\JobPost;
use App\Modules\Department\Models\Department;
use App\Modules\Career\Models\JobApplication;

use PHPUnit\Framework\Attributes\Test;
use App\Modules\Career\Database\Factories\JobPostFactory;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Response;

class CareerTest extends TestCase
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        // Set up storage disk configuration for testing
        Storage::fake('s3');
    }

    #[Test]
    public function it_can_display_active_job_openings()
    {
        // Arrange: Create job postings with various statuses
        $activeJobPost = JobPost::factory()->create(['is_active' => 1]);

        // Act: Perform a GET request to the careers route
        $response = $this->get(route('careers')); // Adjust route name as necessary

        // Assert: Check if the response is successful
        $response->assertStatus(200);

        // Assert: Check if the view is correct
        $response->assertViewIs('careers::frontend.career');
     
    }

    #[Test]
    public function it_can_display_job_details_with_country_phone_codes()
    {
        // Arrange: Create a job post and mock the country phone codes data
        $jobPost = JobPost::factory()->create([
            'title' => 'Sample Job Title',
            'description' => 'Sample Job Description',
            'location' => 'Sample Location',
            'dept_id' => Department::factory(), // Assuming a department with ID 1 exists
            'skills' => 'Skill 1, Skill 2',
            'posted_date' => now(),
            'expiry_date' => now()->addMonths(3),
        ]);

        // Mocking the API call to get country phone codes
        Http::fake([
            'https://restcountries.com/v3.1/all' => Http::response([
                [
                    'cca3' => 'USA',
                    'idd' => [
                        'root' => '+1',
                        'suffixes' => ['']
                    ]
                ],
                [
                    'cca3' => 'CAN',
                    'idd' => [
                        'root' => '+1',
                        'suffixes' => ['416', '905']
                    ]
                ]
            ])
        ]);

        // Act: Perform a GET request to the job details route
        $response = $this->get(route('job-details', ['job_id' => $jobPost->id]));

        // Assert: Check if the response is successful
        $response->assertStatus(200);

        // Assert: Check if the view is correct
        $response->assertViewIs('careers::frontend.job_details');
    }

    #[Test]
    public function it_can_submit_job_application()
    {
        
        Storage::fake('s3');
        // Prepare test data with a fake file
       $file = UploadedFile::fake()->create('resume.pdf', 100); // Fake file

        // Arrange: Prepare form data
        $formData = [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'countryCode' => '+1',
            'phoneNumber' => '1234567890',
            'resume' =>$file,
            'coverLetter' => 'This is a cover letter.',
            'job_id' => encrypt(1), // Ensure this matches your encrypted job_id

        ];

        // Act: Perform a POST request to submit the form
        $response = $this->withoutMiddleware()->post(route('apply'), $formData);

        // Assert: Check the success message
        $response->assertRedirect();
        $response->assertSessionHas('success', 'Your application has been submitted successfully!');
    }

    #[Test]
    public function it_can_filter_job_applications_by_search_criteria()
    {
        // Arrange: Create test data
        $department = Department::factory()->create(['name' => 'Engineering']);
        $job = JobPost::factory()->create(['title' => 'Software Engineer', 'dept_id' => $department->id]);

        JobApplication::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'country_code' => 'US',
            'phone_number' => '1234567890',
            'status' => 'new',
            'job_id' => $job->id
        ]);

        JobApplication::factory()->create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@example.com',
            'country_code' => 'GB',
            'phone_number' => '0987654321',
            'status' => 'reviewed',
            'job_id' => $job->id
        ]);

        // Act: Perform a GET request with a search query
        $response = $this->get('/job-applications?search=John');

        // Assert: Check if the response is successful
        $response->assertStatus(200);

        // Assert: Check if the correct view is returned
        $response->assertViewIs('careers::backend.job_applications.index');
      
    }
    #[Test]
    public function it_can_paginate_job_applications()
    {
        // Arrange: Create more than 3 job applications to test pagination
        Department::factory()->create(); // Create a department
        $job = JobPost::factory()->create(); // Create a job post

        JobApplication::factory()->count(5)->create([
            'job_id' => $job->id
        ]);

        // Act: Perform a GET request to the job applications route
        $response = $this->get('/job-applications');

        // Assert: Check if the response is successful
        $response->assertStatus(200);

        // Assert: Check if the correct view is returned
        $response->assertViewIs('careers::backend.job_applications.index');

        // Assert: Check if pagination is working
        $response->assertViewHas('data', function ($data) {
            return $data->count() === 3; // Check if only 3 items per page
        });
    }
    #[Test]
    public function it_can_search_by_job_title_and_department_name()
    {
        // Arrange: Create test data
        $department = Department::factory()->create(['name' => 'Marketing']);
        $job = JobPost::factory()->create(['title' => 'Marketing Specialist', 'dept_id' => $department->id]);

        JobApplication::factory()->create([
            'first_name' => 'Alice',
            'last_name' => 'Johnson',
            'email' => 'alice.johnson@example.com',
            'country_code' => 'US',
            'phone_number' => '1122334455',
            'status' => 'new',
            'job_id' => $job->id
        ]);

        // Act: Perform a GET request with a search query for job title
        $response = $this->get('/job-applications?search=Marketing Specialist');

        // Assert: Check if the response is successful
        $response->assertStatus(200);

        // Assert: Check if the correct view is returned
        $response->assertViewIs('careers::backend.job_applications.index');

        // Assert: Check if the search result is correct
        $response->assertViewHas('data', function ($data) {
            return $data->contains(function ($application) {
                return $application->job->title === 'Marketing Specialist';
            });
        });

        // Act: Perform a GET request with a search query for department name
        $response = $this->get('/job-applications?search=Marketing');

        // Assert: Check if the response is successful
        $response->assertStatus(200);

        // Assert: Check if the correct view is returned
        $response->assertViewIs('careers::backend.job_applications.index');

        // Assert: Check if the search result is correct
        $response->assertViewHas('data', function ($data) {
            return $data->contains(function ($application) {
                return $application->job->department->name === 'Marketing';
            });
        });
    }
    #[Test]
    public function it_successfully_updates_the_status_of_a_job_application()
    {
        // Arrange
        $application = JobApplication::factory()->create(); // Ensure you have a factory set up for JobApplication
        $newStatus = 'inprogress';

        // Act
        $response = $this->withoutMiddleware()->postJson(route('application.toggleStatus', $application->id), [
            'status' => $newStatus
        ]);

        // Assert
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(['status' => $newStatus]);

        $application->refresh();
        $this->assertEquals($newStatus, $application->status);
    }

    #[Test]
    public function it_fails_to_update_status_when_status_is_invalid()
    {
        // Arrange
        $application = JobApplication::factory()->create();

        // Act
        $response = $this->withoutMiddleware()->postJson(route('application.toggleStatus', $application->id), [
            'status' => 'invalid-status'
        ]);

        // Assert
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('status');
    }

    #[Test]
    public function it_returns_not_found_when_job_application_does_not_exist()
    {
        // Act
        $response = $this->withoutMiddleware()->postJson(route('application.toggleStatus', 9999), [
            'status' => 'new'
        ]);

        // Assert
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    #[Test]
    public function it_successfully_retrieves_job_application_details()
    {
        // Arrange
        $department = Department::factory()->create();
        $job = JobPost::factory()->create(['dept_id' => $department->id]);
        $application = JobApplication::factory()->create(['job_id' => $job->id]);

        // Act
        $response = $this->withoutMiddleware()->postJson(route('application.getdetails', $application->id));

        // Assert
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'id' => $application->id,
                'job' => [
                    'id' => $job->id,
                    'department' => [
                        'id' => $department->id,
                    ]
                ]
            ]);
    }

    #[Test]
    public function it_returns_not_found_when_job_application_details_does_not_exist()
    {
        // Act
        $response = $this->withoutMiddleware()->postJson(route('application.getdetails', 9999));

        // Assert
        $response->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJson(['message' => 'Job application not found']);
    }

    #[Test]
    public function it_successfully_deletes_an_application()
    {
        // Arrange
        Storage::fake('s3'); // Fake S3 storage for testing
        $application = JobApplication::factory()->create([
            'resume_url' => 'https://demo-website-uploads.s3.us-east-2.amazonaws.com/resumes/v6o5u8gWGwS8b9OSZzhZbsycItqUKEKq8Gg94nMf.pdf'
        ]);

        // Encrypt the ID
        $encryptedId = encrypt($application->id);

      
        // Act
        $response = $this->withoutMiddleware()->delete(route('application.destroy', $encryptedId));

        // Assert
        $response->assertRedirect()
                 ->assertSessionHas('success', 'Application deleted successfully!');

        // Verify the application was deleted from the database
        $this->assertDatabaseMissing('application', ['id' => $application->id]);

        // Verify the file was deleted from S3
        Storage::disk('s3')->assertMissing('https://demo-website-uploads.s3.us-east-2.amazonaws.com/resumes/v6o5u8gWGwS8b9OSZzhZbsycItqUKEKq8Gg94nMf.pdf');
    }
    
  
}
