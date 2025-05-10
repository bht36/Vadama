<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; margin: 0;">
    <div style="max-width: 600px; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin: auto; border-top: 5px solid #79090f;">
        <h2 style="color: #79090f; margin-bottom: 20px;">New Contact Message Received</h2>

        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px; font-weight: bold; color: #79090f;">Name:</td>
                <td style="padding: 10px; color: #333;">{{ $name }}</td>
            </tr>
            <tr style="background-color: #f9f9f9;">
                <td style="padding: 10px; font-weight: bold; color: #79090f;">Email:</td>
                <td style="padding: 10px; color: #333;">{{ $email }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; font-weight: bold; color: #79090f;">Phone:</td>
                <td style="padding: 10px; color: #333;">{{ $phone }}</td>
            </tr>
            <tr style="background-color: #f9f9f9;">
                <td style="padding: 10px; font-weight: bold; color: #79090f; vertical-align: top;">Message:</td>
                <td style="padding: 10px; color: #333; white-space: pre-wrap;">{{ $messageContent }}</td>
            </tr>
        </table>

        <p style="margin-top: 30px; font-size: 12px; color: #999999; text-align: center;">
            This message was sent from the contact form on your <strong style="color: #79090f;">Vadama</strong> website.
        </p>
    </div>
</body>
</html>
