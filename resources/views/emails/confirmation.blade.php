@extends('emails.layout')

@section('body')
    <h1 style="margin:0 0 16px;font-family:Georgia,'Times New Roman',serif;font-size:24px;font-weight:600;color:#1E3A34;">
        Thanks {{ $name }}, we've received your {{ $typeLabel }}.
    </h1>
    <p style="margin:0 0 16px;">
        A member of our team will review it and get back to you — usually within one business day.
    </p>

    @if (! empty($rows))
        <p style="margin:0 0 10px;font-size:13px;font-weight:600;color:#1E3A34AA;text-transform:uppercase;letter-spacing:0.05em;">
            A copy of what you sent us
        </p>
        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;font-size:14px;margin-bottom:20px;">
            @foreach ($rows as $label => $value)
                <tr>
                    <td style="padding:8px 12px 8px 0;vertical-align:top;font-weight:600;white-space:nowrap;border-bottom:1px solid #EDE3D7;">
                        {{ $label }}
                    </td>
                    <td style="padding:8px 0;vertical-align:top;border-bottom:1px solid #EDE3D7;">
                        {!! nl2br(e($value)) !!}
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <p style="margin:0 0 16px;">
        If your enquiry is urgent, call us on
        <a href="tel:0890000000" style="color:#E2725B;font-weight:600;">(08) 9000 0000</a>
        (Mon–Fri, 9am–5pm).
    </p>
    <p style="margin:24px 0 0;">
        Warm regards,<br>
        <strong>Harbourview Care Services</strong><br>
        <span style="color:#1E3A34AA;font-size:13px;">Faith. Compassion. Dignity.</span>
    </p>
@endsection
