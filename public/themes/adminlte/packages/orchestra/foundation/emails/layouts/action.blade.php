<table width="100%" bgcolor="#fff" cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <tr>
        <td style="padding:40px 0">

            <table cellpadding="0" cellspacing="0" width="608" border="0" align="center">
                <tbody>
                    <tr>
                        <td>
                            <a href="http://wingzonline.net/" style="display:block;width:394px;min-height:84px;margin:0 auto 30px" target="_blank">
                                <img src="{{ asset('images/email/logo.jpg') }}" width="394" height="84" alt="Wingz Online Logo" style="display:block;border:0;margin:0">
                            </a>

                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody>
                                <tr>
                                    <td colspan="3" rowspan="3" bgcolor="#edf1f2" style="padding:0 0 30px">
                                        <img src="{{ asset('images/email/header.jpg') }}" alt="Booking Reservation" style="display:block;border:0;margin:0 0 44px;background:#eeeeee;width: 100%;" class="CToWUd a6T" tabindex="0">
                                        {{--@if( isset( get_meta('title') ) )--}}
                                        {{--<h1 style="text-align: center;">{{ get_meta('title') }}</h1>--}}
                                        {{--@endif--}}
                                        @yield('content')

                                        <p style="margin:0;border-bottom:1px solid #e5e5e5;font-size:5px;line-height:5px;margin:30px 29px">&nbsp;</p>

                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <tbody>
                                                <tr valign="top">
                                                    <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
                                                    <td>
                                                        <p style="margin:0;color:#333333;font-size:11px;line-height:18px;text-align:center">
                                                            Thank you for booking with Wingz Online! Your reservation has been received. If you have any questions regarding your reservation, need to make adjustments or cancel your reservation, please contact the aircraft rental company at <a style="color:#52a1b2;text-decoration:none" href="mailto:help@laxairport.com" target="_blank">help@laxairport.com</a>. Thank you and enjoy your time in the air!
                                                        </p>
                                                        <p style="text-align:center;font-size:14px;margin-bottom:0"><a href="http://wingzonline.net/" style="color:#52a1b2;text-decoration:none;font-weight:bold" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://wingzonline.net/&amp;source=gmail&amp;ust=1464801058447000&amp;usg=AFQjCNFjM0IavZvGwvN_AQNpnd6-aqHIuw">www.WingzOnline.net</a></p>
                                                    </td>
                                                    <td width="30"><p style="margin:0;font-size:1px;line-height:1px">&nbsp;</p></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>

        </td>
    </tr>
    </tbody>
</table>