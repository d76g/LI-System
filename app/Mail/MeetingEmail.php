<?php

namespace App\Mail;

use App\Models\Meeting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $newMeeting;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Meeting $newMeeting)
    {
        $this->newMeeting = $newMeeting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('UTHM - Meeting Schedual for a UTHM Student')
            ->markdown('emails.Meeting');
    }
}
