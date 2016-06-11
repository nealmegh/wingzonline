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
                                    <td style="background: url('/images/email/header-bg.jpg'); padding: 75px 0; color: #ffffff;">
                                        @if(get_meta('title')) <h1 style="text-align: center; margin: 5px;">{{ get_meta('title') }}</h1> @endif
                                        @if(get_meta('subTitle')) <h3 style="text-align: center; margin: 0;">{{ get_meta('subTitle') }}</h3> @endif
                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="3" rowspan="3" bgcolor="#edf1f2" style="padding:0 0 30px">

                                        @yield('content')

                                        <p style="margin:0;border-bottom:1px solid #e5e5e5;font-size:5px;line-height:5px;margin:30px 29px">&nbsp;</p>

                                       @yield('footer')
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