@extends('orchestra/foundation::emails.layouts.action')

{{--@set_meta('title', 'New Account')--}}

@section('content')

    <table cellpadding="0" cellspacing="0" border="0" width="80%">
        <tbody>
        <tr>
            <td style="padding:8px 10px">
                If you have any questions about this flight please contact {{ $company_name }} at {{ $company_phone }} or {{ $company_email }}
            </td>
        </tr>
        </tbody>
    </table>
@stop


@section('footer')

    <table cellpadding="0" cellspacing="0" border="0" width="90%">
        <tbody>
        <tr valign="top">
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
            <td>
                <p style="margin:0;color:#333333;font-size:11px;line-height:18px;text-align:center">
                    Thank you for scheduling a flight using Wingz Online! Your reservation has been received. If you have any questions regarding your reservation, need to make adjustments or cancel your reservation, please contact the aircraft rental company at coreylewisdesign@gmail.com. Thank you and enjoy your time in the air!
                </p>
                <p style="text-align:center;font-size:14px;margin-bottom:0">www.WingzOnline.Net</p>
            </td>
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
        </tr>
        </tbody>
    </table>
    </td>
@overwrite