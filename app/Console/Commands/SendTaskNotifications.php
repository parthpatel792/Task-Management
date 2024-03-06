<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Models\User;
use App\Mail\TaskNotification;

class SendTaskNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:send-notifications';
    
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications for tasks due soon or added recently';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dueSoonTasks = Task::where('due_date', '<=', now()->addDays(3))->get();
        $recentTasks = Task::where('created_at', '>=', now()->subDay())->get();
    
        $users = User::all(); 

        foreach ($users as $user) {
            \Mail::to($user->email)->send(new TaskNotification($dueSoonTasks, $recentTasks));
        }
    
        $this->info('Task notifications sent successfully!');
    }
    
}
