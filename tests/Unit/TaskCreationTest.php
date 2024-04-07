<?php

namespace Tests\Unit;

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Tests\TestCase;

class TaskCreationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
   /*  public function test_example(): void
    {
        $this->assertTrue(true);
    }
 */
    public function test_create_task_with_valid_input()
    {
        // Prepare valid input data
        $request = new Request([
            'admin' => 1,
            'task_title' => 'Sample Task',
            'task_description' => 'This is a test task',
            'not_admin' => 2
        ]);

        // Create an instance of TaskController
        $controller = new TaskController(new Task());

        // Execute create_task method
        $response = $controller->create_task($request);

        // Assert that the response is a redirect response
        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);

        // Assert that the response redirects to the tasks_page route
        $this->assertEquals(route('tasks_page') . '?page=1', $response->headers->get('Location'));
    }

    /**
     * Test create_task method with invalid input.
     *
     * @return void
     */
    public function test_create_task_with_invalid_input()
    {
        // Prepare invalid input data (missing required fields)
        $invalidRequestData = new Request([
            // 'admin' => 1,  // Missing 'admin' field
            'task_title' => '',  // Invalid empty 'task_title'
            'task_description' => 'This is a test task description',
            'not_admin' => 'invalid'  // Invalid 'not_admin' value
        ]);

        // Create an instance of TaskController
        $controller = new TaskController(new Task());

        // Execute create_task method with invalid input
        $response = $controller->create_task($invalidRequestData);

        // Assert that the response is a redirect response
        $this->assertInstanceOf(Redirect::class, $response);

        // Assert that the response redirects back with validation errors
        $this->assertEquals(route('tasks_page'), $response->headers->get('Location'));

   
    }
}
