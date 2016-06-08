@extends('orchestra/foundation::emails.layouts.action')

{{--@set_meta('title', 'New Account')--}}
@section('content')
    <p style="text-align: center;">Thank for your creating new account.</p>
    <p style="text-align: center;">Username: {{ $username }}</p>
    <p style="text-align: center;">Password: ********</p>

    <p>&nbsp;</p>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody>
        <tr>
            <td style="padding:8px 10px">
                <p style="text-align:center">
                    <a style="color:#52a1b2;text-decoration:none;color:#fff;background:#52a1b2;padding:12px 7%;border-radius:25px;font-weight:bold" href="{{ handles('orchestra::login') }}" target="_blank">Login to your Account</a>
                </p>
            </td>
        </tr>
        </tbody>
    </table>
@stop

@section('footer')
    <table width="100%">
        <tr>
            <td class="aligncenter content-block"></td>
        </tr>
    </table>
@overwrite
