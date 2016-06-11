@extends('orchestra/foundation::emails.layouts.action')

@section('content')
    <p style="text-align: center;">Below is your login information:</p>
    <p>&nbsp;</p>

    <p style="text-align: center;">Username: {{ $username }}</p>
    <p style="text-align: center;">Password: ********</p>

    <p>&nbsp;</p>
    <p style="text-align: center;">You can login by going to <a href="http://wingzonline.net/login">http://wingzonline.net/login</a></p>
    <p>&nbsp;</p>
    <p style="text-align: center;">Thank you for signing up, Wingz Online is designed for you. So please if you have any questions or would like to suggest any improvements, don’t hesitate to contact us at info@wingzonline.net</p>

@stop

@section('footer')

    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody>
        <tr valign="top">
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
            <td>
                <p style="margin:0;color:#333333;font-size:11px;line-height:18px;text-align:center">
                    Thanks for joining Wingz Online!
                </p>
                <p style="text-align:center;font-size:14px;margin-bottom:0">Wingz Online Team</p>
            </td>
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
        </tr>
        </tbody>
    </table>
    </td>
@overwrite
