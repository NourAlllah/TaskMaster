<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Validation\ValidationException;

class TaskCreateTest extends TestCase
{

    use RefreshDatabase;

    public function test_create_task_with_valid_input()
    {
        $request = new Request([
            'admin' => 1,
            'task_title' => 'Test Task',
            'task_description' => 'This is a test task description',
            'not_admin' => 2
        ]);

        $controller = new TaskController(new Task());

        $response = $controller->create_task($request);

        $this->assertNotNull($response); 
        $this->assertTrue($response->isRedirect(route('tasks_page').'?page=1')); 
    }

    /**
     * Test create_task method with invalid input.
     *
     * @return void
     */
    public function test_create_task_with_invalid_input()
    {
        $request = new Request([
            'admin' => 'not_an_integer', // Invalid admin ID
            'task_title' => '', // Empty task title
            'task_description' => '', // Empty task description
            'not_admin' => 'not_an_integer' // Invalid not_admin ID
        ]);

        $controller = new TaskController(new Task());

        try {
            $controller->create_task($request);
            
            $this->fail('ValidationException was not thrown.');
        } catch (ValidationException $e) {
            $this->assertInstanceOf(ValidationException::class, $e);
        }
    }
}
