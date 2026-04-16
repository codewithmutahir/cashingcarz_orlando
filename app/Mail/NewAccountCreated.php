<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $password;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $password, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newAccountCreated')
            ->subject('Your New Account Details')
            ->with([
                'username' => $this->username,
                'password' => $this->password,
                'email' => $this->email,
            ]);
    }
}
