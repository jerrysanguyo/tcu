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
        $cityLogoPath       = public_path('images/tcu_logo.png');        
        $admissionsLogoPath = public_path('images/tcu_logo.png'); 

        $this->withSymfonyMessage(function ($message) use ($cityLogoPath, $admissionsLogoPath) {
            if (is_file($cityLogoPath)) {
                $this->cityLogoCid = $message->embedFromPath($cityLogoPath, 'city-logo', 'image/png');
            }
            if (is_file($admissionsLogoPath)) {
                $this->admissionsLogoCid = $message->embedFromPath($admissionsLogoPath, 'admissions-logo', 'image/png');
            }
        });
        
        return $this->subject('We received your admission application')
            ->view('email.admission.applicant_submitted_html')
            ->with([
                'applicant'          => $this->applicant,
                'cityLogoCid'        => $this->cityLogoCid,
                'admissionsLogoCid'  => $this->admissionsLogoCid,
                'applicationUrl'     => route('admission.show', $this->applicant->uuid),
            ]);
    }
}