@extends('orchestra/foundation::emails.layouts.action')

{{--@set_meta('title', 'New Account')--}}

@section('content')

    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody>
        <tr>
            <td>
                <p style="text-align: center;">
                    The following instructor has requested to be added to {{ $company }}.<br/>
                    Please log into your account and approve the instructor so they can<br/>
                    start working for {{ $company }} or deny the instructor if you don’t<br/>
                    want the instructor associated with your company
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tbody>
                    <tr valign="top">
                        <td colspan="2" style="background:#52a1b2;color:#fff;padding:10px;font-weight:bold;text-align:center">{{ $instructor_first_name.' '.$instructor_last_name }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Address:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $instructor_address }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">City:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $instructor_city }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">State:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $instructor_state }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Zip:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $instructor_zip }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Phone:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2"><a style="color:#52a1b2;text-decoration:none" href="tel:{{ $instructor_phone }}" target="_blank">{{ $instructor_phone }}</a></td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px">Email:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px"><a style="color:#52a1b2;text-decoration:none" href="mailto:{{ $instructor_email }}" target="_blank">{{ $instructor_email }}</a></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding:8px 10px">
                <p style="text-align:center">
                    For Approved <a href="{{ url('admin/companies/instructors/'.$id.'/activation/'.$code) }}">Click Here ...</a>
                    <br>
                    For Deny <a href="{{ url('admin/companies/instructors/'.$id.'/reject/'.$code) }}">Click Here ...</a>
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


