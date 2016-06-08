@extends('orchestra/foundation::emails.layouts.action')

{{--@set_meta('title', 'New Account')--}}

@section('content')

    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody>
        <tr>
            <td style="padding:8px 10px">
                <h1 style="text-align: center;">You are approved Successfully.</h1>
                <p style="text-align:center">
                    <a style="color:#52a1b2;text-decoration:none;color:#fff;background:#52a1b2;padding:12px 7%;border-radius:25px;font-weight:bold" href="{{ handles('orchestra::login') }}" target="_blank">Login to your Account</a>
                </p>
            </td>
        </tr>
        </tbody>
    </table>
@stop
