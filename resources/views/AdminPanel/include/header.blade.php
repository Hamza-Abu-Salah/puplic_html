<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>لوحة التحكم | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('assets/css/app-rtl.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="//db.onlinewebfonts.com/c/7712e50ecac759e968ac145c0c4a6d33?family=Droid+Arabic+Kufi" rel="stylesheet"
          type="text/css"/>
    <style type="text/css">
        * {
            font-family: 'Droid Arabic Kufi', serif;
            font-size: 13px !important;
            direction: rtl;
            text-align: justify;
            word-spacing: 1px;
        }

        .page-title {
            font-family: 'Droid Arabic Kufi', serif;
            font-size: 16px !important;
            direction: rtl;
            text-align: justify;
            word-spacing: 1px;
        }

        i, label {
            font-family: 'Droid Arabic Kufi', serif;
            font-size: 14px !important;
            direction: rtl;
            text-align: justify;
            word-spacing: 1px;
        }

        [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
            cursor: pointer;
            padding: 5px;
        }

        .noti-icon i {
            font-size: 28px;
            color: #707070;
            font-size: 25px !important;
        }
    </style>
    @stack('css')
    @toastr_css
</head>
