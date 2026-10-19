<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harbourview Care Services</title>
</head>
<body style="margin:0;padding:0;background-color:#FAF6F0;font-family:'Segoe UI',Arial,sans-serif;color:#1E3A34;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background-color:#FAF6F0;">
        <tr>
            <td align="center" style="padding:32px 16px;">
                <table role="presentation" cellpadding="0" cellspacing="0" width="600" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:16px;overflow:hidden;">
                    <tr>
                        <td style="padding:24px 32px;border-bottom:1px solid #EDE3D7;">
                            <img src="{{ rtrim((string) config('app.url'), '/') }}/images/logo.png" alt="Harbourview Care Services" style="height:44px;width:auto;display:block;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;font-size:15px;line-height:1.6;">
                            @yield('body')
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 32px;background-color:#1E3A34;color:#FAF6F0;font-size:12px;line-height:1.7;">
                            Harbourview Care Services &middot; ABN 12 345 678 901 &middot; NDIS Provider 0000000000<br>
                            (08) 9000 0000 &middot; info@example.com &middot; Melbourne, WA
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
