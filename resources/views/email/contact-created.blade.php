<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title></title>
</head>
<body style="margin: 0;">
    <table style="width:100%; border-collapse: collapse;">
        <tr style="background-color: #31cdcc;">
            <td style="padding: 10px 30%;">
                <table style="width:100%; border-collapse: collapse;">
                    <tr>
                        <td style="font-family: Arial, sans-serif; font-size: 16px; color: #424242;"><a href="http://www.senthaneng.com" style="color: #424242; text-decoration: none;">View senthaneng.com</a> </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <img src="{!! $message->embed(public_path('/app/storage/140x140.png')) !!}"  width="400" style="width: 400px; margin: 40px auto 30px;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 25px 30%;">
                <table>
                    <tr>
                        <td>
                            <p style="font-weight: bold; font-size: 18px;">Dear Senthan</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 16px; margin-top: 10px; padding-right: 20px;">Viewer Name:- {{ $contact->name  or ''  }}</p>
                        </td>
                    </tr>
                  <tr>
                        <td>
                            <p style="font-size: 16px; margin-top: 10px; padding-right: 20px;">Viewer Email:- {{ $contact->email  or ''  }}</p>
                        </td>
                    </tr>
		  <tr>
                        <td>
                            <p style="font-size: 16px; margin-top: 10px; padding-right: 20px;">Viewer Subject:- {{ $contact->subject  or '' }}</p>
                        </td>
                    </tr>
<tr>
                        <td>
                            <p style="font-size: 16px; margin-top: 10px; padding-right: 20px;">Viewer Message:- {{ $contact->message or '' }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
