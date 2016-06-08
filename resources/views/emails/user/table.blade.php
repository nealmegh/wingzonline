@extends('orchestra/foundation::emails.layouts.action')

@set_meta('title', 'New Account')

@section('content')
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody>
        <tr valign="top">
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
            <td>
                <p style="font-size:14px;line-height:22px;font-weight:bold;color:#333333;margin:0 0 5px;text-align:center;color:#52a1b2">Pick Up Date/Time:</p>
                <p style="margin:0 0 35px;font-size:22px;color:#333333;text-align:center;font-weight:bold">March 13, 2015<br>10:30AM</p>
            </td>
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
            <td>
                <p style="font-size:14px;line-height:22px;font-weight:bold;color:#333333;margin:0 0 5px;text-align:center;color:#52a1b2">Return Date/Time:</p>
                <p style="margin:0 0 35px;font-size:22px;color:#333333;text-align:center;font-weight:bold">March 13, 2015<br>10:00PM</p>
            </td>
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
        </tr>
        <tr valign="top">
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
            <td colspan="3">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tbody>
                    <tr valign="top">
                        <td colspan="2" style="background:#52a1b2;color:#fff;padding:10px;font-weight:bold;text-align:center">Aircraft Details</td>
                    </tr>
                    <tr>
                        <td style="padding:5px 10px;border-bottom:1px solid #e2e2e2">Aircraft Make:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">Cessna</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Aircraft Model:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">C-182 Turbo</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Tail #:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">R1234</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px">Price:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px">150.00</td>
                    </tr>
                    </tbody>
                </table>


                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tbody>
                    <tr valign="top">
                        <td colspan="2" style="background:#52a1b2;color:#fff;padding:10px;font-weight:bold;text-align:center">Company Details</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Company Name:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">xaxdrax</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Address:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">1414</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">City:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">Sacramento</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">State:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">CA</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Zip:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">95814</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Phone:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2"><a style="color:#52a1b2;text-decoration:none" href="tel:5555555555" target="_blank">5555555555</a></td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px">Email:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px"><a style="color:#52a1b2;text-decoration:none" href="mailto:xaxdrax@gmail.com" target="_blank">xaxdrax@gmail.com</a></td>
                    </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tbody>
                    <tr>
                        <td style="padding:8px 10px">
                            <p style="text-align:center">
                                <a style="color:#52a1b2;text-decoration:none;color:#fff;background:#52a1b2;padding:12px 7%;border-radius:25px;font-weight:bold" href="{{ handles('orchestra::login') }}" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://www.wingzonline.net/%23modalLogin&amp;source=gmail&amp;ust=1464801058447000&amp;usg=AFQjCNHJ03RM3FqCC2xZ54uojdViUk4_Ow">Login to View Booking</a>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="30">
                <p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p>
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
