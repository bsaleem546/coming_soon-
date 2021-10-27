<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $req;
    public $val;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($req, $val)
    {
        $this->req = $req;
        $this->val = $val;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->val == 0){
            return $this->view('mail.toUser')->with(['message' => $this])->subject('Email from Katin.Life');
        }
        elseif ($this->val == 1){
            return $this->view('mail.toAdmin')->with(['message' => $this])->subject('New email from user '.$this->req->name);
        }
    }
}
