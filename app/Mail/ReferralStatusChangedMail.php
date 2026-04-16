<?php

namespace App\Mail;

use App\Models\Referral;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferralStatusChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $referral;

    public function __construct(Referral $referral)
    {
        $this->referral = $referral;
    }

    public function build()
    {
        return $this->subject('Referral Status Updated')
                    ->view('emails.referrals.status-update');
    }
}
