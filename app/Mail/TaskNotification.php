<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TaskNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $dueSoonTasks;
    public $recentTasks;


    /**
     * Create a new message instance.
     */
    public function __construct($dueSoonTasks, $recentTasks)
    {
        $this->dueSoonTasks = $dueSoonTasks;
        $this->recentTasks = $recentTasks;
    }

    public function build()
    {
        return $this->view('emails.tasks.notification')
                    ->with([
                        'dueSoonTasks' => $this->dueSoonTasks,
                        'recentTasks' => $this->recentTasks,
                    ]);
    }
}
