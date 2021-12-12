<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=“robots” content=“noindex”>
    <meta name=“googlebot” content=“noindex” />

    <link rel="icon" type="image/png" href="{{asset('photos/icon.png')}}"/>
    <link href="{{asset('photos/icon.png')}}" rel="apple-touch-icon">

    <title> {{ config('app.name')}} | لوحة التحكم </title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="{{asset('inspina/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspina/css/lity.min.css')}}" rel="stylesheet">
   <link href="{{asset('inspina/css/bootstrap-rtl.min.css')}}" rel="stylesheet">

    <link href="{{asset('inspina/font-awesome/css/font-awesome.css')}}" rel="stylesheet">


    <link href="{{asset('inspina/css/animate.css')}}" rel="stylesheet">

    <link href="{{asset('inspina/css/toastr.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('inspina/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('inspina/js/plugins/selectize/selectize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('inspina/js/plugins/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('inspina/js/plugins/bootstrap-fileinput/css/fileinput.min.css')}}">
    <link rel="stylesheet" href="{{asset('inspina/js/plugins/lightbox2/css/lightbox.min.css')}}">

    <link href="{{asset('inspina/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('inspina/css/custom.css')}}" rel="stylesheet">
       <link href="{{asset('inspina/css/inspina-rtl.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{--hijri date picker--}}
    <link href="{{asset('inspina/js/plugins/datapicker-hijri/jquery.calendars.picker.css')}}" rel="stylesheet">
    {{--full celender--}}
    <link rel="stylesheet" href="{{asset('/css/summernote.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.7.0/switchery.min.css" rel="stylesheet"/>

    <style>
        #toast-container > .toast {
            background-image: none !important;
            padding-top: 30px;
            padding-bottom: 30px;
        }

        #toast-container > .toast-success {
            background-color: #3c8dbc;
        }

        #toast-container > .toast:before {
            position: relative;
            font-family: FontAwesome;
            font-size: 24px;
            line-height: 18px;
            float: left;
            margin-left: -1em;
            color: #FFF;
            padding-right: 0.5em;
            margin-right: 0.5em;
        }

        #toast-container > .toast-success:before {
            content: "\f003";
        }
    </style>
    @if($errors->any())
        <style>
                #myForm {
                    border: 2px solid #e9a1a8;
                }
        </style>
    @endif

    @stack('styles')
</head>

<body>

{{--<audio id="myAudio" style="display: none">--}}
{{--    <source src="{{asset('notification/notification_rang.mp3')}}" type="audio/ogg">--}}
{{--</audio>--}}
