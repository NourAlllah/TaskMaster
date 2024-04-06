<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


use Illuminate\Support\Facades\Log;

use App\Models\Statistics;

class UpdateStatistics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user_id;

    /**
     * Create a new job instance.
     */
    public function __construct($user_id)
    {

        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $check_statistics_exist = Statistics::where('user_id', $this->user_id)->get();

        Log::info('Statistics job processed: ' . $check_statistics_exist);
        

        if (count($check_statistics_exist) > 0) {

            $check_statistics_exist[0]['number_of_tasks'] += 1;
            $check_statistics_exist[0]->save(); 

        } else {

            $newUserStatistics = new Statistics();
            $newUserStatistics->user_id = $this->user_id;
            $newUserStatistics->number_of_tasks = 1 ;
            $newUserStatistics->save();

        }
        
        
    }
}
