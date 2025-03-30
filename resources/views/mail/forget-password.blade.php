<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Your Password</title>
</head>
<body style="background-color: #f4f4f4; margin: 0; padding: 20px; font-family: Arial, sans-serif;">

    <table align="center" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600px" bgcolor="#ffffff" cellpadding="20" cellspacing="0" style="border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                    <tr>
                        <td align="center" style="border-bottom: 2px solid #007bff;">
                            <h2 style="color: #007bff; margin: 0;">Reset Your Password</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <p style="font-size: 16px; color: #333;">Hello,</p>
                            <p style="font-size: 14px; color: #555;">
                                We received a request to reset your password. Click the button below to proceed.
                            </p>
                            <a href="{{ route('reset.password', $token) }}" 
                               style="display: inline-block; background-color: #007bff; color: #ffffff; padding: 12px 24px; text-decoration: none; font-size: 16px; border-radius: 5px; margin-top: 10px;">
                                Reset Password
                            </a>
                            <p style="font-size: 14px; color: #555; margin-top: 20px;">
                                If you didn't request this, you can ignore this email.
                            </p>
                            <p style="font-size: 14px; color: #999;">This link will expire in 60 minutes.</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 10px; font-size: 12px; color: #666;">
                            © {{ date('Y') }} Vadama. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>
