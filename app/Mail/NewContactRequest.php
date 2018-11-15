<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewContactRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;
    public $name;
    public $content;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender,$name,$content,$subject)
    {
        $this->sender = $sender;
        $this->name = $name;
        $this->content = $content;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->sender)->subject($this->subject)->view('emails.contact');

    }
}
