<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Mail\WeeklyReport;
use Illuminate\Support\Facades\Mail;

class GenerateWeeklyReport extends Command
{
    protected $signature = 'report:weekly';
    protected $description = 'Generate a weekly report of task completions.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $completedTasksLastWeek = Task::where('completed', true)
                                       ->whereBetween('completed_at', [now()->startOfWeek()->subWeek(), now()->startOfWeek()])
                                       ->get();

        $taskCategories = Task::where('completed', true)
                               ->whereBetween('completed_at', [now()->startOfWeek()->subWeek(), now()->startOfWeek()])
                               ->groupBy('category_id')
                               ->selectRaw('count(*) as total, category_id')
                               ->get();
        
    
        Mail::to('admin@example.com')->send(new WeeklyReport($completedTasksLastWeek, $taskCategories));

        $this->info('Weekly report generated and emailed successfully.');
    }
}

