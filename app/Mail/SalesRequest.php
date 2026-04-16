<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SalesRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $postLink;
    public $price;
    public $name;
    public $address;
    public $email;
    public $phoneNumber;
    public $profileLink;
    public $referenceNumber;
    public $pickupTime;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postLink, $price, $name, $address, $email, $phoneNumber, $profileLink, $referenceNumber, $pickupTime)
    {
        $this->postLink = $postLink;
        $this->price = $price;
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->profileLink = $profileLink;
        $this->referenceNumber = $referenceNumber;
        $this->pickupTime = $pickupTime;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.salesRequest')
            ->subject('Sales Request')
            ->with([
                'postLink' => $this->postLink,
                'price' => $this->price,
                'name' => $this->name,
                'address' => $this->address,
                'email' => 'info@cashingcarz.com',
                'phoneNumber' => $this->phoneNumber,
                'profileLink' => $this->profileLink,
                'referenceNumber' => $this->referenceNumber,
                'pickupTime' => $this->pickupTime,
            ]);
    }
}
