@extends('orchestra/foundation::emails.layouts.action')

{{--@set_meta('title', 'New Account')--}}

@section('content')

    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody>
        <tr>
            <td style="padding:8px 10px; width: 90%;">
                <p>
                    {{ $company }} has {{ $message }} your request to instruct with their company. If you have any questions please contact the company you requested to instruct for.
                </p>
            </td>
        </tr>
        </tbody>
    </table>
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