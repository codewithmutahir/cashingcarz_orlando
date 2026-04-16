<?php

namespace App\Mail;

use App\Models\Referral;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferralSubmittedUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $referral;

    public function __construct(Referral $referral)
    {
        $this->referral = $referral;
    }

    public function build()
    {
        return $this->subject('Thank You for Your Referral')
                    ->view('emails.referrals.user-confirm');
    }
}
