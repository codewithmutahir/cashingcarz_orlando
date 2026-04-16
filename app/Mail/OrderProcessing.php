<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderProcessing extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $orderId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $orderId)
    {
        $this->name = $name;
        $this->orderId = $orderId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderProcessing')
            ->subject('Order Processing')
            ->with([
                'name' => $this->name,
                'orderId' => $this->orderId,
            ]);
    }
}
