@extends('emails.layout')

@section('body')
    <h1 style="margin:0 0 4px;font-family:Georgia,'Times New Roman',serif;font-size:22px;font-weight:600;color:#1E3A34;">
        New {{ $typeLabel }}
    </h1>
    <p style="margin:0 0 20px;font-size:13px;color:#1E3A34AA;">
        Submitted via the website · replying to this email goes to the submitter.
    </p>

    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;font-size:14px;">
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

    @if ($adminUrl)
        <p style="margin:24px 0 0;">
            <a href="{{ $adminUrl }}"
               style="display:inline-block;background-color:#E2725B;color:#ffffff;text-decoration:none;font-weight:600;padding:12px 24px;border-radius:999px;">
                View in admin
            </a>
        </p>
    @endif
@endsection
