@component('mail::message')
<table width="100%" style="text-align: center; margin-bottom: 20px;">
    <tr>
        <td>
            <img src="{{ $cityLogoCid }}" alt="City Logo" style="height: 80px; margin-right: 10px;">
            <img src="{{ $yakapLogoCid }}" alt="Yakap Logo" style="height: 80px;">
        </td>
    </tr>
</table>

Dear {{ $applicant->first_name }} {{ $applicant->last_name }},

We are pleased to inform you that your **college application form** has been successfully submitted to the
**{{ config('app.name') }} Admissions Office**. 🎓

📅 **Date of Submission:**
**{{ \Carbon\Carbon::parse($applicant->created_at)->format('F j, Y') }}**

Our admissions team will now review your documents and credentials. Once the evaluation is complete, you will receive a
**notification via email** and may also view the results directly through our admissions portal.

@component('mail::button', ['url' => route('admission.show', $applicant->uuid)])
View My Application
@endcomponent

If additional requirements are needed, our staff will reach out to you promptly.
We encourage you to regularly check your application status and email for important updates.

Thank you for choosing {{ config('app.name') }} as your pathway to higher education.
We look forward to welcoming you to our academic community.

Warm regards,
**Admissions Office**
{{ config('app.name') }}
@endcomponent