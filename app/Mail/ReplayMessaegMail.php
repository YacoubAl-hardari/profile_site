<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplayMessaegMail extends Mailable
{
    use Queueable, SerializesModels;

    private $title;
    private $body;
    private $image;

    /**
     * Create a new message instance.
     */
    public function __construct($title,$body,$image)
    {
        $this->title = $title;
        $this->body = $body;
        $this->image = $image;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        storage_path('app/public/' . $this->image);
        return $this->subject($this->title)
            ->view('emails.ReplayMessaegMail')->with(["body"=>$this->body,"image"=>$this->image]);
    }
}
