<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase; // Ensure database is refreshed before each test

    public function testCreateTaskValidationFails()
    {
        $controller = new TaskController();

        // Simulate a request with missing or invalid data
        $request = new Request([
            'admin' => null, // Missing required field
            'task_title' => 'Test Task',
            'task_description' => 'This is a test task',
            'not_admin' => 123,
        ]);

        $response = $controller->create_task($request);

        // Assert that the response redirects back with validation errors
        $response->assertRedirect();
        /* $this->assertSessionHasErrors(['admin']); */
    }

    public function testCreateTaskSuccess()
    {
        $controller = new TaskController();

        // Simulate a valid request
        $request = new Request([
            'admin' => 1, // Assuming valid admin ID
            'task_title' => 'Test Task',
            'task_description' => 'This is a test task',
            'not_admin' => 2, // Assuming valid non-admin user ID
        ]);

        $response = $controller->create_task($request);

        // Assert that the response redirects to the tasks page
        $response->assertRedirect(route('tasks_page') . '?page=1');

        // You can also assert database changes or dispatched jobs here
        // Example: Assert that a task was created in the database
        $this->assertDatabaseHas('tasks', [
            'admin_id' => 1,
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'assigned_to_id' => 2,
        ]);
    }
}