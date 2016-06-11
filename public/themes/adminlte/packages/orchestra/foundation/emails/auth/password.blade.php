
@extends('orchestra/foundation::emails.layouts.action')

@section('content')
    <p style="width: 90%;">
        To reset your password, complete this form: {{ handles("orchestra::forgot/reset/{$token}?email={$email}") }}.<br/>
        This link will expire in {{ config('auth.passwords.'.config('auth.defaults.passwords', 'users').'.expire', 60) }} minutes.
    </p>
@stop

@section('footer')

    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody>
        <tr valign="top">
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
            <td>
                <p style="margin:0;color:#333333;font-size:11px;line-height:18px;text-align:center">
                    Spend More Time in the Air!
                </p>
                <p style="text-align:center;font-size:14px;margin-bottom:0">www.WingzOnline.Net</p>
            </td>
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
        </tr>
        </tbody>
    </table>
    </td>
@overwrite