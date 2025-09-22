<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Application Received</title>
</head>

<body
    style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', sans-serif; background-color: #f5f7fa; padding: 20px; margin: 0;">
    <table width="100%" cellpadding="0" cellspacing="0"
        style="max-width: 640px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); overflow: hidden;">
        <tr>
            <td style="background-color: #243b53; color: #ffffff; text-align: center; padding: 22px 30px;">
                <h1 style="margin: 0; font-size: 22px;">{{ config('app.name') }}</h1>
            </td>
        </tr>

        <tr>
            <td style="padding: 24px 30px 10px; text-align: center;">
                @if(!empty($cityLogoCid))
                <img src="{{ $cityLogoCid }}" alt="University Logo" style="height: 64px; margin-right: 10px;">
                @endif
                @if(!empty($admissionsLogoCid))
                <img src="{{ $admissionsLogoCid }}" alt="Admissions Logo" style="height: 64px;">
                @endif
            </td>
        </tr>

        <tr>
            <td style="padding: 0 30px 6px;">
                <p style="font-size: 16px; color: #2f3e4d; margin: 0 0 16px;">
                    Dear {{ $applicant->first_name }} {{ $applicant->last_name }},
                </p>

                <p style="font-size: 15px; color: #394b59; margin: 0 0 14px; line-height: 1.55;">
                    We are pleased to confirm that your <strong>college application form</strong> has been successfully
                    submitted to the
                    <strong>{{ config('app.name') }} Admissions Office</strong>.
                </p>

                <p style="font-size: 15px; color: #394b59; margin: 0 0 14px;">
                    <span style="font-size: 15px;">📅</span>
                    <strong>Date of Submission:</strong>
                    {{ \Carbon\Carbon::parse($applicant->created_at)->format('F j, Y') }}
                </p>

                <p style="font-size: 15px; color: #394b59; margin: 0 0 18px; line-height: 1.55;">
                    Our admissions team will now review your documents and credentials. Once the evaluation is complete,
                    you will receive a <strong>notification via email</strong>. You may also view updates at any time
                    through our admissions portal.
                </p>

                <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center"
                    style="margin: 22px auto;">
                    <tr>
                        <td align="center" bgcolor="#1f5eff" style="border-radius: 6px;">
                            <a href="{{ $applicationUrl }}" target="_blank"
                                style="display: inline-block; padding: 12px 22px; color: #ffffff; text-decoration: none; font-size: 15px; font-weight: 600;">
                                View My Application
                            </a>
                        </td>
                    </tr>
                </table>

                <p style="font-size: 14px; color: #56697a; margin: 0 0 10px; line-height: 1.55;">
                    If additional requirements are needed, our staff will contact you promptly.
                    We encourage you to check your email and the application portal regularly for important updates.
                </p>

                <p style="font-size: 14px; color: #56697a; margin: 14px 0 0; line-height: 1.55;">
                    Thank you for choosing {{ config('app.name') }} as your pathway to higher education.
                    We look forward to the possibility of welcoming you to our academic community.
                </p>

                <p style="font-size: 14px; color: #2f3e4d; margin: 18px 0 0;">
                    Warm regards,<br>
                    <strong>Admissions Office</strong><br>
                    {{ config('app.name') }}
                </p>
            </td>
        </tr>

        <tr>
            <td style="background-color: #f0f2f5; text-align: center; padding: 14px; font-size: 12px; color: #8a98a6;">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </td>
        </tr>
    </table>
</body>

</html>