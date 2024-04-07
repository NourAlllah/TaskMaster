<?php

namespace Tests\Unit;

use App\Http\Controllers\StatisticsController;
use App\Models\Statistics;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\View\View;
use Tests\TestCase;

class StatisticsControllerTest extends TestCase
{
    use RefreshDatabase; // Include this trait to refresh the database

    /**
     * Test index method to ensure it retrieves statistics records and passes them to the view.
     *
     * @return void
     */
    public function test_index_method()
    {
        // Create mock statistics records
        $statisticsRecords = \App\Models\Statistics::factory()->count(5)->create(); 
        
        // Create an instance of StatisticsController
        $controller = new StatisticsController(new Statistics());

        // Execute the index method
        $response = $controller->index();

        // Assert that the response is a view
        $this->assertInstanceOf(View::class, $response);

        // Assert that the view name is 'statistics_page'
        $this->assertEquals('statistics_page', $response->getName());

        // Assert that the view data contains the expected 'ranks' variable
        $viewData = $response->getData();
        $this->assertArrayHasKey('ranks', $viewData);
        $this->assertCount(5, $viewData['ranks']); // Ensure correct number of statistics records
    }
}