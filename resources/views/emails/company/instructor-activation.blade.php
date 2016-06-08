@extends('orchestra/foundation::emails.layouts.action')

{{--@set_meta('title', 'New Account')--}}

@section('content')

    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody>
        <tr>
            <td style="padding:8px 10px">
                <p style="text-align:center">
                    New Instructor
                    <br>
                    For Approved <a href="{{ url('admin/companies/instructors/'.$id.'/activation/'.$code) }}">Click Here ...</a>
                    <br>
                    For Deny <a href="{{ url('admin/companies/instructors/'.$id.'/reject/'.$code) }}">Click Here ...</a>
{{--                    <a style="color:#52a1b2;text-decoration:none;color:#fff;background:#52a1b2;padding:12px 7%;border-radius:25px;font-weight:bold" href="{{ handles('orchestra::login') }}" target="_blank">Login to your Account</a>--}}
                </p>
            </td>
        </tr>
        </tbody>
    </table>
@stop


