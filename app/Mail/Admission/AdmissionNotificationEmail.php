<?php

namespace App\Mail\Admission;

use App\Models\Admission\Applicant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdmissionNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public Applicant $applicant;

    protected ?string $cityLogoCid = null;
    protected ?string $admissionsLogoCid = null;

    public function __construct(Applicant $applicant)
    {
        $this->applicant = $applicant;
        $this->onQueue('emails');
    }

    public function build()
    {
        return $this->subject('We received your admission application')
            ->withSwiftMessage(function ($message) {
                $this->cityLogoCid = $message->embed(public_path('images/city_logo.webp'));
                $this->yakapLogoCid = $message->embed(public_path('images/yakap_logo.webp'));
            })
            ->markdown('email.admission.applicant_submitted', [
                'applicant' => $this->applicant,
                'cityLogoCid' => $this->cityLogoCid,
                'yakapLogoCid' => $this->yakapLogoCid,
            ]);
    }
}