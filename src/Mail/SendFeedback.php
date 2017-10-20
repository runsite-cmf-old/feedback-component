<?php

namespace Runsite\Component\Feedback\Mail;

use Illuminate\Mail\Mailable;

class SendFeedback extends Mailable
{

    protected $name;
    protected $email;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $mail, $message)
    {
        $this->name = $name;
        $this->email = $mail;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('feedback.mail')->with([
          'name' => $this->name,
          'email' => $this->email,
          'message' => $this->message,
        ]);
    }
}
