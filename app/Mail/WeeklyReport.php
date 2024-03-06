<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Task;

class WeeklyReport extends Mailable
{
    use Queueable, SerializesModels;

    public $completedTasksLastWeek;
    // Add other properties here as needed for your report

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($completedTasksLastWeek)
    {
        $this->completedTasksLastWeek = $completedTasksLastWeek;
        // Initialize other properties here
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Weekly Task Report')
                    ->view('emails.weeklyReport')
                    ->with([
                        'completedTasksLastWeek' => $this->completedTasksLastWeek,
                        // Pass other data to the view as needed
                    ]);
    }
}
