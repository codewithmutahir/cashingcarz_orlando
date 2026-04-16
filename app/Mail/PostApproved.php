<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $postId;
    public $deleteLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $postId, $deleteLink)
    {
        $this->name = $name;
        $this->postId = $postId;
        $this->deleteLink = $deleteLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.postApproved')
            ->subject('Order Processing')
            ->with([
                'name' => $this->name,
                'postId' => $this->postId,
                'deleteLink' => $this->deleteLink,
            ]);
    }
}
