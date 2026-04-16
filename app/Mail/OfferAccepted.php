<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OfferAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $offerAmount;
    public $referenceNumber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerName, $offerAmount, $referenceNumber)
    {
        $this->customerName = $customerName;
        $this->offerAmount = $offerAmount;
        $this->referenceNumber = $referenceNumber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.offerAccepted')
            ->subject('Offer Accepted - Next Steps for Your Vehicle')
            ->with([
                'customerName' => $this->customerName,
                'offerAmount' => $this->offerAmount,
                'referenceNumber' => $this->referenceNumber,
            ]);
    }
}
