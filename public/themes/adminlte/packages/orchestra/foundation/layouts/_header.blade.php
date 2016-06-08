<meta charset="UTF-8">
@title()
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="/backend/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="/backend/plugins/daterangepicker/daterangepicker-bs3.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="/backend/plugins/datepicker/datepicker3.css">
{{--<link rel="stylesheet" href="/backend/plugins/jQueryUI/jquery-ui.min.css">--}}

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="/backend/plugins/iCheck/all.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="/backend/plugins/colorpicker/bootstrap-colorpicker.min.css">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="/backend/plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="/backend/plugins/select2/select2.min.css">
<!-- Switchery -->
<link href="/backend/plugins/switchery/switchery.min.css" rel="stylesheet">

<!-- fullCalendar 2.7.0-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.0/fullcalendar.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.0/fullcalendar.print.css" media="print">
{{--<link href='/backend/plugins/fullcalendar/scheduler.min.css' rel='stylesheet' />--}}
<link href='/backend/plugins/fullcalendar/scheduler.min.css' rel='stylesheet' />

<!-- Theme style -->
<link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">

<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="/backend/dist/css/skins/_all-skins.min.css">






{{--<script>--}}
{{--Javie.ENV = "{!! app('env') !!}";--}}
{{--</script>--}}

@placeholder("orchestra.layout: header")
@stack('orchestra.header')


<link rel="stylesheet" href="/backend/css/custom.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
