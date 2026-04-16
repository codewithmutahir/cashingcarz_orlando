<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PromoteCashingCarz extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.promoteCashingCarz')
            ->subject('Get Cash for Your Car Easily and Free with Cashing Carz')
            ->with([
                'customerName' => $this->customerName,
            ]);
    }
}
