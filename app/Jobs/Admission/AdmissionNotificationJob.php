<?php

namespace App\Jobs\Admission;

use App\Mail\Admission\AdmissionNotificationEmail;
use App\Models\Admission\Applicant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AdmissionNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $applicantId;
    
    public function __construct(int $applicantId)
    {
        $this->applicantId = $applicantId;
        $this->onQueue('emails');
    }

    public function handle(): void
    {
        $applicant = Applicant::with([
            'academic',
            'guardian',
            'choice.program',
        ])->find($this->applicantId);

        if (! $applicant) {
            return;
        }
        
        if (!empty($applicant->email)) {
            Mail::to($applicant->email)->send(new AdmissionNotificationEmail($applicant));
        }
    }
}
