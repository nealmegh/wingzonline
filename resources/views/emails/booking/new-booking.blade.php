@extends('orchestra/foundation::emails.layouts.action')

@section('content')
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody>
        <tr valign="top">
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
            <td>
                <p style="font-size:14px;line-height:22px;font-weight:bold;color:#333333;margin:0 0 5px;text-align:center;color:#52a1b2">Pick Up Date/Time:</p>
                <p style="margin:0 0 35px;font-size:22px;color:#333333;text-align:center;font-weight:bold">{{ $pickup_date }}<br>{{ $pickup_time }}</p>
            </td>
            <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
            <td>
                <p style="font-size:14px;line-height:22px;font-weight:bold;color:#333333;margin:0 0 5px;text-align:center;color:#52a1b2">Return Date/Time:</p>
                <p style="margin:0 0 35px;font-size:22px;color:#333333;text-align:center;font-weight:bold">{{ $return_date }}<br>{{ $return_time }}</p>
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
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $aircraft_make }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Aircraft Model:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $aircraft_model }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Tail #:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $tail_no }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px">Price:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px">{{ '$'.$price }}</td>
                    </tr>
                    </tbody>
                </table>


                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tbody>
                    <tr valign="top">
                        <td colspan="2" style="background:#52a1b2;color:#fff;padding:10px;font-weight:bold;text-align:center">Renter Details</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Renter Name:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $renter_name }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Address:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $renter_address }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">City:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $renter_city }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">State:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $renter_state }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Zip:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2">{{ $renter_zip }}</td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px;border-bottom:1px solid #e2e2e2">Phone:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px;border-bottom:1px solid #e2e2e2"><a style="color:#52a1b2;text-decoration:none" href="tel:{{ $renter_phone }}" target="_blank">{{ $renter_phone }}</a></td>
                    </tr>
                    <tr>
                        <td style="padding:8px 10px">Email:</td>
                        <td style="font-weight:bold;text-align:right;padding:8px 10px"><a style="color:#52a1b2;text-decoration:none" href="mailto:{{ $renter_email }}" target="_blank">{{ $renter_email }}</a></td>
                    </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tbody>
                    <tr>
                        <td style="padding:8px 10px">
                            <p><a style="color:#52a1b2;text-decoration:none;color:#fff;background:#52a1b2;padding:12px 7%;border-radius:25px;font-weight:bold" href="{{ handles('orchestra::login) }}" target="_blank" >Login to view flight</a></p>
                            <p style="text-align:center">
                                @if( isset($type) && $type == 'instructor' )
                                    <a style="color:#52a1b2;text-decoration:none;color:#fff;background:#52a1b2;padding:12px 7%;border-radius:25px;font-weight:bold" href="{{ handles('orchestra::instructors/request/'.$booking.'/approve/'.$code) }}" target="_blank" >Accept</a>
                                    <a style="color:#52a1b2;text-decoration:none;color:#fff;background:#52a1b2;padding:12px 7%;border-radius:25px;font-weight:bold" href="{{ handles('orchestra::instructors/request/'.$booking.'/deny/'.$code) }}" target="_blank" >Deny</a>
                                @endif

                                @if( isset($type) && $type == 'company' )
                                    <a style="color:#52a1b2;text-decoration:none;color:#fff;background:#52a1b2;padding:12px 7%;border-radius:25px;font-weight:bold" href="{{ handles('orchestra::companies/request/'.$booking.'/approve/'.$code) }}" target="_blank" >Accept</a>
                                    <a style="color:#52a1b2;text-decoration:none;color:#fff;background:#52a1b2;padding:12px 7%;border-radius:25px;font-weight:bold" href="{{ handles('orchestra::companies/request/'.$booking.'/deny/'.$code) }}" target="_blank" >Deny</a>
                                @endif
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