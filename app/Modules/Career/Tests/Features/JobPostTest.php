<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Modules\Career\Models\JobPost;
use App\Modules\Department\Models\Department;

use PHPUnit\Framework\Attributes\Test;
use App\Modules\Career\Database\Factories\JobPostFactory;

class JobPostTest extends TestCase
{
    use WithFaker,RefreshDatabase;
    /**
     * A basic feature test example.
     */
    #[Test]
    public function it_can_return_paginated_job_posts()
    {
        // Arrange: Create some job posts
        JobPost::factory()->count(5)->create();

        // Act: Perform a GET request to the index route
        $response = $this->get(route('jobposts.index'));

        // Assert: Check if the response is successful and contains the paginated data
        $response->assertStatus(200);
        $response->assertViewIs('careers::backend.job_posts.index');
        $response->assertViewHas('data');
        $this->assertCount(3, $response->viewData('data')->items()); // Assuming pagination is set to 3
    }

    #[Test]
    public function it_can_filter_job_posts_by_search_term()
    {
        // Arrange: Create job posts
        JobPost::factory()->create(['title' => 'Software Engineer']);
        JobPost::factory()->create(['title' => 'Data Scientist']);

        // Act: Perform a GET request with a search term
        $response = $this->get(route('jobposts.index', ['search' => 'Software']));

        // Assert: Check if the response is successful and contains the filtered job post
        $response->assertStatus(200);
        $response->assertViewIs('careers::backend.job_posts.index');
        $response->assertViewHas('data');

        $jobPosts = $response->viewData('data');
        $this->assertCount(1, $jobPosts); // There should be 1 job post matching the search term
        $this->assertEquals('Software Engineer', $jobPosts->first()->title);
    }

    #[Test]
    public function it_can_show_the_create_form_with_departments()
    {
        // Arrange: Create some departments
        Department::factory()->count(3)->create();

        // Act: Perform a GET request to the create route
        $response = $this->get(route('jobposts.create')); // Adjust route name as necessary

        // Assert: Check if the response is successful
        $response->assertStatus(200);

        // Assert: Check if the view is correct
        $response->assertViewIs('careers::backend.job_posts.create');

        // Assert: Check if the view has the departments data
        $response->assertViewHas('departments');
        
        // Optionally, you can also verify the content in the view
        $departments = Department::all();
        $response->assertSee($departments->first()->name); // Adjust according to your Department model
    }

    #[Test]
    public function it_can_store_a_job_post()
    {
        // Arrange: Create a department to use in the job post
        $department = Department::factory()->create();

        // Define the data to be sent in the request
        $data = [
            'title' => 'New Job Post Title',
            'description' => 'Job description here',
            'location' => 'New York',
            'department' => $department->id, // Use the department ID
            'skills' => 'Skill 1, Skill 2',
            'expiry_date' => '2024-12-31',
        ];

        // Act: Perform a POST request to store the job post
        $response = $this->withoutMiddleware()->post(route('jobposts.store'), $data);

        // Assert: Check that the response redirects to the jobposts.index route
        $response->assertRedirect(route('jobposts.index'));

        // Assert: Check for a success message in the session
        $response->assertSessionHas('success', 'Job post created successfully.');

        // Assert: Verify that the job post was actually created in the database
        $this->assertDatabaseHas('job_posting', [
            'title' => 'New Job Post Title',
            'description' => 'Job description here',
            'location' => 'New York',
            'dept_id' => $department->id,
            'skills' => 'Skill 1, Skill 2',
            'posted_date' => now()->format('Y-m-d'), // Match date format
            'expiry_date' => '2024-12-31',
        ]);
    }

    #[Test]
    public function it_validates_the_request()
    {
         // Act: Perform a POST request with invalid data (leaving required fields empty)
    $response = $this->withoutMiddleware()->post(route('jobposts.store'), [
        'title' => '',
        'description' => '',
        'location' => '',
        'department' => '',
        'skills' => '',
        'expiry_date' => ''
    ]);

    // Assert: Check that the response redirects
    $response->assertRedirect();

    // Assert: Check that the session contains validation errors for the specified fields
    $response->assertSessionHasErrors([
        'title',
        'description',
        'location',
        'department',
        'skills',
        'expiry_date',
    ]);
    }

    #[Test]
    public function it_can_show_the_edit_form_with_job_post_and_departments()
    {
        // Arrange: Create a department and a job post to use in the test
        $department = Department::factory()->create();
        $jobPost = JobPost::factory()->create([
            'dept_id' => $department->id,
        ]);

        // Act: Perform a GET request to the edit route with the job post ID
        $response = $this->get(route('jobposts.edit', $jobPost->id)); // Adjust route name as necessary

        // Assert: Check if the response is successful
        $response->assertStatus(200);

        // Assert: Check if the view is correct
        $response->assertViewIs('careers::backend.job_posts.edit');

        // Assert: Check if the view has the job post data
        $response->assertViewHas('jobPost', function ($viewJobPost) use ($jobPost) {
            return $viewJobPost->id === $jobPost->id;
        });

        // Assert: Check if the view has the departments data
        $response->assertViewHas('departments', function ($viewDepartments) use ($department) {
            return $viewDepartments->contains($department);
        });
    }
    #[Test]
    public function it_can_update_a_job_post()
    {
        // Arrange: Create a department and a job post to use in the test
        $department = Department::factory()->create();
        $jobPost = JobPost::factory()->create([
            'dept_id' => $department->id,
            'title' => 'Old Title',
            'description' => 'Old description',
            'location' => 'Old location',
            'skills' => 'Old skills',
            'expiry_date' => '2024-12-31',
            'is_active' => 1,
        ]);

        // Define the updated data to be sent in the request
        $data = [
            'title' => 'Updated Title',
            'description' => 'Updated description',
            'location' => 'Updated location',
            'department' => $department->id, // Use the department ID
            'skills' => 'Updated skills',
            'expiry_date' => '2025-01-01',
            'status' => 0,
        ];

        // Act: Perform a PUT request to update the job post
        $response = $this->withoutMiddleware()->putJson(route('jobposts.update', $jobPost->id), $data);

        // Assert: Check that the response redirects to the jobposts.index route
        $response->assertRedirect(route('jobposts.index'));

        // Assert: Check for a success message in the session
        $response->assertSessionHas('success', 'Job post updated successfully.');

        // Assert: Verify that the job post was actually updated in the database
        $this->assertDatabaseHas('job_posting', [
            'id' => $jobPost->id,
            'title' => 'Updated Title',
            'description' => 'Updated description',
            'location' => 'Updated location',
            'dept_id' => $department->id,
            'skills' => 'Updated skills',
            'expiry_date' => '2025-01-01',
            'is_active' => 0,
        ]);
    }
    #[Test]
    public function it_validates_the_update_request()
    {
        // Arrange: Create a department and a job post to use in the test
        $department = Department::factory()->create();
        $jobPost = JobPost::factory()->create(['dept_id' => $department->id]);

        // Act: Perform a PUT request with invalid data
        $response = $this->withoutMiddleware()->put(route('jobposts.update', $jobPost->id), [
            'title' => '',
            'description' => '',
            'location' => '',
            'department' => '',
            'skills' => '',
            'expiry_date' => ''
        ]);

        // Assert: Check that the response is a redirect
    $response->assertRedirect();

    // Assert: Check that the session contains validation errors
    $response->assertSessionHasErrors([
        'title',
        'description',
        'location',
        'department',
        'skills',
        'expiry_date',
    ]);
    }
    #[Test]
    public function it_can_delete_a_job_post()
    {
        // Arrange: Create a job post to use in the test
        $jobPost = JobPost::factory()->create();

        // Act: Perform a DELETE request to the destroy route with the job post ID
        $response = $this->withoutMiddleware()->delete(route('jobposts.destroy', $jobPost->id)); // Adjust route name as necessary

        // Assert: Check that the response redirects to the jobposts.index route
        $response->assertRedirect(route('jobposts.index'));

        // Assert: Check for a success message in the session
        $response->assertSessionHas('success', 'Job post deleted successfully.');

        // Assert: Verify that the job post was actually deleted from the database
        $this->assertDatabaseMissing('job_posting', [
            'id' => $jobPost->id,
        ]);
    }
}
