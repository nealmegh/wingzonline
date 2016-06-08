@extends('orchestra/foundation::emails.layouts.action')

{{--@set_meta('title', 'New Account')--}}

@section('content')

    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody>
        <tr>
            <td style="padding:8px 10px">
                <h2 style="text-align: center;">{!! $message !!}</h2>
            </td>
        </tr>
        </tbody>
    </table>
@stop


